import EasyMDE from 'easymde';

const truthy = (value) => ! ['false', '0', 'off', 'none', 'textarea'].includes(String(value ?? '').toLowerCase());

const syncTextarea = (textarea) => {
  textarea.dispatchEvent(new Event('input', { bubbles: true }));
  textarea.dispatchEvent(new Event('change', { bubbles: true }));
};

const initEasyMde = (textarea) => {
  if (textarea.dataset.sampauiEditorReady === 'true' || ! truthy(textarea.dataset.sampauiEditor)) {
    return;
  }

  textarea.dataset.sampauiEditorReady = 'true';

  const editor = new EasyMDE({
    element: textarea,
    autoDownloadFontAwesome: false,
    forceSync: true,
    spellChecker: false,
    status: false,
    minHeight: textarea.dataset.sampauiEditorMinHeight || '180px',
    placeholder: textarea.getAttribute('placeholder') || undefined,
    toolbar: [
      'bold',
      'italic',
      'heading',
      '|',
      'quote',
      'unordered-list',
      'ordered-list',
      '|',
      'link',
      'preview',
    ],
  });

  editor.codemirror.on('change', () => {
    editor.codemirror.save();
    syncTextarea(textarea);
  });

  if (textarea.disabled) {
    editor.codemirror.setOption('readOnly', 'nocursor');
  }

  textarea.sampauiEditor = editor;
};

const initEditors = (root = document) => {
  root.querySelectorAll('textarea[data-sampaui-editor="easymde"]').forEach(initEasyMde);
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => initEditors());
} else {
  initEditors();
}

document.addEventListener('livewire:navigated', () => initEditors());
document.addEventListener('livewire:load', () => initEditors());

window.SampaUI = {
  ...(window.SampaUI || {}),
  initEditors,
};
