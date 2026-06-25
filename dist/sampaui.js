const focusableSelector = [
  'a[href]',
  'button:not([disabled])',
  'input:not([disabled]):not([type="hidden"])',
  'select:not([disabled])',
  'textarea:not([disabled])',
  '[tabindex]:not([tabindex="-1"])',
].join(',');

const focusableElements = (element) => Array.from(element?.querySelectorAll(focusableSelector) ?? [])
  .filter((item) => !item.hasAttribute('hidden') && item.getClientRects().length > 0);

const syncControl = (control) => {
  if (!control) return;
  control.dispatchEvent(new Event('input', { bubbles: true }));
  control.dispatchEvent(new Event('change', { bubbles: true }));
};

const SampaUI = {
  version: '0.1.17',

  input({ clearable = false } = {}) {
    return {
      clearable,
      showPassword: false,
      hasValue: false,
      init() {
        this.hasValue = Boolean(this.$refs.control?.value);
        this.$refs.control?.addEventListener('input', () => this.updateValueState());
      },
      updateValueState() {
        this.hasValue = Boolean(this.$refs.control?.value);
      },
      clear() {
        if (!this.clearable || !this.$refs.control) return;
        this.$refs.control.value = '';
        if (this.$refs.control._x_model) this.$refs.control._x_model.set('');
        syncControl(this.$refs.control);
        this.updateValueState();
        this.$refs.control.focus();
      },
    };
  },

  phone() {
    return {
      format(value) {
        const digits = String(value ?? '').replace(/\D/g, '').slice(0, 11);
        if (digits.length <= 2) return digits;
        if (digits.length <= 6) return `(${digits.slice(0, 2)}) ${digits.slice(2)}`;
        if (digits.length <= 10) return `(${digits.slice(0, 2)}) ${digits.slice(2, 6)}-${digits.slice(6)}`;
        return `(${digits.slice(0, 2)}) ${digits.slice(2, 3)} ${digits.slice(3, 7)}-${digits.slice(7)}`;
      },
      onInput(event) {
        event.target.value = this.format(event.target.value);
        if (event.target._x_model) event.target._x_model.set(event.target.value);
      },
    };
  },

  avatarUpload({ existing = null } = {}) {
    return {
      preview: null,
      removed: false,
      existing,
      get currentSrc() {
        return this.removed ? null : (this.preview || this.existing);
      },
      selectFile(event) {
        const [file] = Array.from(event.target.files || []).filter((item) => item.type.startsWith('image/'));
        if (!file) return;
        if (this.preview) URL.revokeObjectURL(this.preview);
        this.removed = false;
        this.preview = URL.createObjectURL(file);
        this.syncRemoveInput();
      },
      removeImage() {
        this.removed = true;
        if (this.preview) URL.revokeObjectURL(this.preview);
        this.preview = null;
        this.$refs.input.value = '';
        syncControl(this.$refs.input);
        this.syncRemoveInput();
      },
      syncRemoveInput() {
        this.$nextTick(() => {
          if (!this.$refs.removeInput) return;
          this.$refs.removeInput.value = this.removed ? '1' : '0';
          syncControl(this.$refs.removeInput);
        });
      },
    };
  },

  select(config = {}) {
    return {
      open: false,
      value: String(config.value ?? ''),
      selectedLabel: config.selectedLabel ?? '',
      options: config.options ?? [],
      placeholder: config.placeholder ?? '',
      disabled: Boolean(config.disabled),
      readonly: Boolean(config.readonly),
      activeIndex: -1,
      init() {
        if (!this.value && this.$refs.native?.value) this.value = String(this.$refs.native.value);
        if (this.options.length === 0 && this.$refs.native) {
          this.options = Array.from(this.$refs.native.options)
            .filter((option) => option.value !== '')
            .map((option) => ({ value: String(option.value), label: option.textContent.trim(), disabled: option.disabled }));
        }
        this.syncSelectedLabel();
        this.$watch('value', () => this.syncSelectedLabel());
      },
      canInteract() {
        return !this.disabled && !this.readonly;
      },
      syncSelectedLabel() {
        this.selectedLabel = this.options.find((option) => option.value === String(this.value))?.label || '';
      },
      openMenu() {
        if (!this.canInteract()) return;
        this.open = true;
        const selectedIndex = this.options.findIndex((option) => option.value === String(this.value) && !option.disabled);
        this.activeIndex = selectedIndex >= 0 ? selectedIndex : this.options.findIndex((option) => !option.disabled);
        this.scrollActive();
      },
      close() {
        this.open = false;
        this.activeIndex = -1;
      },
      toggle() {
        this.open ? this.close() : this.openMenu();
      },
      move(step) {
        if (!this.open) this.openMenu();
        if (!this.options.length) return;
        let next = this.activeIndex;
        for (let attempts = 0; attempts < this.options.length; attempts += 1) {
          next = (next + step + this.options.length) % this.options.length;
          if (!this.options[next]?.disabled) { this.activeIndex = next; break; }
        }
        this.scrollActive();
      },
      moveTo(edge) {
        if (!this.open) this.openMenu();
        let index = -1;
        if (edge === 'end') {
          for (let cursor = this.options.length - 1; cursor >= 0; cursor -= 1) {
            if (!this.options[cursor].disabled) { index = cursor; break; }
          }
        } else index = this.options.findIndex((option) => !option.disabled);
        if (index >= 0) { this.activeIndex = index; this.scrollActive(); }
      },
      scrollActive() {
        this.$nextTick(() => document.getElementById(`${config.id}-option-${this.activeIndex}`)?.scrollIntoView({ block: 'nearest' }));
      },
      chooseActive() {
        if (this.open && this.options[this.activeIndex]) this.select(this.options[this.activeIndex]);
        else this.openMenu();
      },
      select(option) {
        if (!this.canInteract() || option.disabled) return;
        this.value = String(option.value);
        this.close();
        this.commit(option);
      },
      clear() {
        if (!this.canInteract()) return;
        this.value = '';
        this.selectedLabel = '';
        this.commit({ value: '', label: '' });
      },
      commit(option) {
        this.$nextTick(() => {
          this.$refs.native.value = this.value;
          syncControl(this.$refs.native);
          this.$dispatch('select:changed', { id: config.id, name: config.name, value: this.value, label: option.label });
        });
      },
    };
  },

  selectMultiple(config = {}) {
    return {
      open: false,
      search: '',
      values: config.values ?? [],
      options: config.options ?? [],
      disabled: Boolean(config.disabled),
      readonly: Boolean(config.readonly),
      loading: Boolean(config.loading),
      activeIndex: -1,
      init() {
        this.values = this.normalize(this.values);
      },
      normalize(value) {
        if (Array.isArray(value)) return [...new Set(value.map((item) => String(item)))];
        return value === null || value === undefined || value === '' ? [] : [String(value)];
      },
      canInteract() {
        return !this.disabled && !this.readonly && !this.loading;
      },
      selectedOptions() {
        return this.values.map((value) => this.options.find((option) => String(option.value) === String(value))).filter(Boolean);
      },
      filteredOptions() {
        const term = this.search.trim().toLocaleLowerCase();
        return this.options.filter((option) => !this.values.includes(String(option.value)))
          .filter((option) => !term || option.label.toLocaleLowerCase().includes(term));
      },
      toggle() {
        if (!this.canInteract()) return;
        this.open = !this.open;
        if (this.open) this.$nextTick(() => this.$refs.search?.focus());
      },
      close() {
        this.open = false;
        this.search = '';
        this.activeIndex = -1;
      },
      move(step) {
        const options = this.filteredOptions();
        if (!options.length) return;
        let next = this.activeIndex;
        for (let attempts = 0; attempts < options.length; attempts += 1) {
          next = (next + step + options.length) % options.length;
          if (!options[next]?.disabled) { this.activeIndex = next; break; }
        }
        this.$nextTick(() => document.getElementById(`${config.id}-option-${this.activeIndex}`)?.scrollIntoView({ block: 'nearest' }));
      },
      chooseActive() {
        const option = this.filteredOptions()[this.activeIndex];
        if (option) this.select(option);
      },
      select(option) {
        if (!this.canInteract() || option.disabled || this.values.includes(String(option.value))) return;
        this.values = this.normalize([...this.values, option.value]);
        this.search = '';
        this.activeIndex = -1;
        this.dispatchChange(option, 'selected');
      },
      remove(value) {
        if (!this.canInteract()) return;
        const option = this.options.find((item) => String(item.value) === String(value)) || { value, label: value };
        this.values = this.values.filter((item) => String(item) !== String(value));
        this.dispatchChange(option, 'removed');
      },
      clear() {
        if (!this.canInteract()) return;
        this.values = [];
        this.dispatchChange(null, 'cleared');
      },
      dispatchChange(option, action) {
        this.$nextTick(() => {
          if (this.$refs.native) {
            Array.from(this.$refs.native.options).forEach((item) => { item.selected = this.values.includes(String(item.value)); });
            syncControl(this.$refs.native);
          }
          this.$dispatch('select-multiple:changed', { id: config.id, name: config.name, values: this.values, option, action });
        });
      },
    };
  },

  fileUpload(config = {}) {
    return {
      files: [],
      error: '',
      accept: config.accept ?? '',
      maxSize: Number(config.maxSize ?? 0),
      model: config.model ?? null,
      retry: Boolean(config.retry),
      chunkSize: Number(config.chunkSize ?? 0),
      init() {
        this.$root.addEventListener('livewire-upload-start', () => this.setStatus('uploading'));
        this.$root.addEventListener('livewire-upload-progress', (event) => this.setProgress(event.detail.progress));
        this.$root.addEventListener('livewire-upload-error', () => this.setStatus('error'));
        this.$root.addEventListener('livewire-upload-finish', () => { this.setProgress(100); this.setStatus('complete'); });
      },
      accepts(file) {
        if (!this.accept) return true;
        return this.accept.split(',').map((item) => item.trim()).some((rule) => {
          if (rule.endsWith('/*')) return file.type.startsWith(rule.slice(0, -1));
          if (rule.startsWith('.')) return file.name.toLocaleLowerCase().endsWith(rule.toLocaleLowerCase());
          return file.type === rule;
        });
      },
      setFiles(input) {
        this.revokePreviewUrls();
        this.error = '';
        const incoming = Array.from(input.files || []);
        const valid = incoming.filter((file) => {
          if (!this.accepts(file)) { this.error = config.typeError; return false; }
          if (this.maxSize > 0 && file.size > this.maxSize * 1024) { this.error = config.sizeError; return false; }
          return true;
        });
        if (valid.length !== incoming.length) {
          const transfer = new DataTransfer();
          valid.forEach((file) => transfer.items.add(file));
          input.files = transfer.files;
          syncControl(input);
        }
        this.files = valid.map((file, index) => ({ file, id: `${file.name}-${file.lastModified}-${index}`, name: file.name, size: file.size, url: file.type.startsWith('image/') ? URL.createObjectURL(file) : null, progress: 0, status: 'ready' }));
        if (this.chunkSize > 0) {
          this.$dispatch('file-upload:chunks-ready', {
            model: this.model,
            chunkSize: this.chunkSize,
            files: this.files.map((item) => ({ name: item.name, chunks: Math.ceil(item.size / this.chunkSize) })),
          });
        }
      },
      removeFile(index) {
        const [removed] = this.files.splice(index, 1);
        if (removed?.url) URL.revokeObjectURL(removed.url);
        const transfer = new DataTransfer();
        this.files.forEach((item) => transfer.items.add(item.file));
        this.$refs.input.files = transfer.files;
        syncControl(this.$refs.input);
      },
      setProgress(progress) {
        this.files.forEach((file) => { if (file.status !== 'complete') file.progress = Number(progress); });
      },
      setStatus(status) {
        this.files.forEach((file) => { file.status = status; });
      },
      cancel() {
        if (this.model && this.$wire?.cancelUpload) this.$wire.cancelUpload(this.model);
        this.setStatus('cancelled');
        this.$dispatch('file-upload:cancelled', { model: this.model });
      },
      retryUpload() {
        if (!this.retry) return;
        this.setProgress(0);
        this.setStatus('ready');
        this.$dispatch('file-upload:retry', { model: this.model, files: this.files.map((item) => item.file) });
        syncControl(this.$refs.input);
      },
      revokePreviewUrls() {
        this.files.forEach((file) => { if (file.url) URL.revokeObjectURL(file.url); });
      },
    };
  },

  overlay(config = {}) {
    return {
      serverOpen: config.serverOpen,
      visible: false,
      active: false,
      closeTimer: null,
      opener: null,
      init() {
        if (this.serverOpen) this.openOverlay();
        this.$watch('serverOpen', (value) => value ? this.openOverlay() : this.close(false));
      },
      openOverlay() {
        clearTimeout(this.closeTimer);
        this.opener = document.activeElement;
        this.visible = true;
        document.documentElement.classList.add('overflow-hidden');
        document.body.classList.add('overflow-hidden');
        this.$nextTick(() => {
          if (this.$refs.dialog && !this.$refs.dialog.open) this.$refs.dialog.showModal();
          this.active = true;
          const focusables = focusableElements(this.$refs.panel);
          (focusables[0] || this.$refs.panel)?.focus();
        });
      },
      close(sync = true) {
        if (!this.visible) return;
        this.active = false;
        clearTimeout(this.closeTimer);
        this.closeTimer = setTimeout(() => {
          this.visible = false;
          document.documentElement.classList.remove('overflow-hidden');
          document.body.classList.remove('overflow-hidden');
          if (this.$refs.dialog?.open) this.$refs.dialog.close();
          if (sync) this.serverOpen = false;
          if (config.afterClose) this.$wire?.[config.afterClose]?.();
          this.opener?.focus?.();
        }, Number(config.closeDelay ?? 260));
      },
      handleEscape() {
        if (!config.closeOnEscape) return;
        this.close();
      },
      handleOutside() {
        if (!config.closeOnOutside) return;
        this.close();
      },
      trapTab(event) {
        const items = focusableElements(this.$refs.panel);
        if (!items.length) { event.preventDefault(); this.$refs.panel?.focus(); return; }
        const first = items[0];
        const last = items[items.length - 1];
        if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
        else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
      },
    };
  },

  dropdown({ closeOnOutside = true, closeOnEscape = true } = {}) {
    return {
      open: false,
      toggle() {
        this.open = !this.open;
        if (this.open) this.$nextTick(() => focusableElements(this.$refs.menu)[0]?.focus());
      },
      close({ focusTrigger = false } = {}) {
        this.open = false;
        if (focusTrigger) this.$nextTick(() => this.$refs.trigger?.focus());
      },
      onEscape() {
        if (closeOnEscape && this.open) this.close({ focusTrigger: true });
      },
      onOutside() {
        if (closeOnOutside && this.open) this.close();
      },
      move(event, step) {
        const items = focusableElements(this.$refs.menu);
        if (!items.length) return;
        const index = Math.max(items.indexOf(event.target), 0);
        items[(index + step + items.length) % items.length].focus();
      },
    };
  },

  toast({ max = 5, defaultDuration = 3500, variant = 'outline', size = 'md' } = {}) {
    return {
      toasts: [],
      queue: [],
      max: Math.max(Number(max), 1),
      add(payload) {
        const incoming = typeof payload === 'string' ? { message: payload } : (payload ?? {});
        const type = ['success', 'error', 'warning', 'info'].includes(incoming.type) ? incoming.type : 'info';
        const tones = {
          success: ['border-success', 'text-success', 'bg-success', 'check2-circle', 'Sucesso'],
          error: ['border-danger', 'text-danger', 'bg-danger', 'exclamation-octagon', 'Erro'],
          warning: ['border-warning', 'text-warning', 'bg-warning', 'exclamation-triangle', 'Atencao'],
          info: ['border-info', 'text-info', 'bg-info', 'info-circle', 'Aviso'],
        };
        const duration = Number(incoming.duration ?? defaultDuration);
        const safeDuration = Number.isFinite(duration) && duration >= 0 ? duration : defaultDuration;
        const tone = tones[type];
        const selectedVariant = ['soft', 'solid', 'outline'].includes(incoming.variant) ? incoming.variant : variant;
        const variantClasses = {
          soft: `border ${tone[0]} ${tone[2]}/10 text-secondary`,
          solid: `border ${tone[0]} ${tone[2]} text-white`,
          outline: `border ${tone[0]} bg-white text-secondary`,
        };
        const sizeClasses = { sm: 'px-3 py-3', md: 'px-4 py-4', lg: 'px-5 py-5' };
        const toast = { id: `${Date.now()}-${Math.random()}`, show: true, type, title: incoming.title ?? tone[4], message: incoming.message ?? '', duration: safeDuration, remaining: safeDuration, progress: 100, startedAt: null, timerId: null, intervalId: null, pausedBy: [], wrap: `${variantClasses[selectedVariant] ?? variantClasses.outline} ${incoming.class ?? ''}`, contentClass: sizeClasses[incoming.size] ?? sizeClasses[size] ?? sizeClasses.md, icon: selectedVariant === 'solid' ? 'text-white' : tone[1], progressClass: selectedVariant === 'solid' ? 'bg-white' : tone[2], symbol: tone[3] };
        if (this.toasts.length >= this.max) this.queue.push(toast);
        else this.mount(toast);
      },
      mount(toast) {
        this.toasts.unshift(toast);
        this.$nextTick(() => this.startTimer(this.toasts[0]));
      },
      startTimer(toast) {
        if (toast.duration === 0 || toast.remaining <= 0) return;
        toast.startedAt = Date.now();
        toast.intervalId = window.setInterval(() => { toast.progress = Math.max((toast.remaining - (Date.now() - toast.startedAt)) / toast.duration * 100, 0); }, 80);
        toast.timerId = window.setTimeout(() => this.remove(toast.id), toast.remaining);
      },
      pauseTimer(toast, reason = 'manual') {
        if (!toast.pausedBy.includes(reason)) toast.pausedBy.push(reason);
        if (toast.pausedBy.length > 1) return;
        if (toast.startedAt) toast.remaining = Math.max(toast.remaining - (Date.now() - toast.startedAt), 0);
        this.clearTimers(toast);
      },
      resumeTimer(toast, reason = 'manual') {
        toast.pausedBy = toast.pausedBy.filter((item) => item !== reason);
        if (toast.pausedBy.length === 0 && toast.show && toast.remaining > 0) this.startTimer(toast);
      },
      clearTimers(toast) {
        if (!toast) return;
        window.clearTimeout(toast.timerId);
        window.clearInterval(toast.intervalId);
        toast.timerId = null;
        toast.intervalId = null;
        toast.startedAt = null;
      },
      remove(id) {
        const toast = this.toasts.find((item) => item.id === id);
        if (!toast) return;
        this.clearTimers(toast);
        toast.show = false;
        window.setTimeout(() => {
          this.toasts = this.toasts.filter((item) => item.id !== id);
          const next = this.queue.shift();
          if (next) this.mount(next);
        }, 180);
      },
    };
  },
};

if (typeof window !== 'undefined') {
  window.SampaUI = { ...(window.SampaUI ?? {}), ...SampaUI };
}

export default SampaUI;
