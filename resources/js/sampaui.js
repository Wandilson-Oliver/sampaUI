import EasyMDE from 'easymde';

const truthy = (value) => ! ['false', '0', 'off', 'none', 'textarea'].includes(String(value ?? '').toLowerCase());

const syncTextarea = (textarea) => {
  textarea.dispatchEvent(new Event('input', { bubbles: true }));
  textarea.dispatchEvent(new Event('change', { bubbles: true }));
};

const toolbar = [
  { name: 'bold', action: EasyMDE.toggleBold, text: 'B', title: 'Negrito' },
  { name: 'italic', action: EasyMDE.toggleItalic, text: 'I', title: 'Italico' },
  { name: 'heading', action: EasyMDE.toggleHeadingSmaller, text: 'H', title: 'Titulo' },
  '|',
  { name: 'quote', action: EasyMDE.toggleBlockquote, text: 'Q', title: 'Citacao' },
  { name: 'unordered-list', action: EasyMDE.toggleUnorderedList, text: 'UL', title: 'Lista simples' },
  { name: 'ordered-list', action: EasyMDE.toggleOrderedList, text: 'OL', title: 'Lista numerada' },
  '|',
  { name: 'link', action: EasyMDE.drawLink, text: 'Link', title: 'Link' },
  { name: 'preview', action: EasyMDE.togglePreview, text: 'View', title: 'Preview' },
];

const initEasyMde = (textarea) => {
  if (textarea.dataset.sampauiEditorReady === 'true' || ! truthy(textarea.dataset.sampauiEditor)) {
    return;
  }

  textarea.dataset.sampauiEditorReady = 'true';

  const editor = new EasyMDE({
    element: textarea,
    autoDownloadFontAwesome: false,
    forceSync: true,
    lineWrapping: true,
    spellChecker: false,
    status: false,
    minHeight: textarea.dataset.sampauiEditorMinHeight || '180px',
    placeholder: textarea.getAttribute('placeholder') || undefined,
    toolbar,
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
