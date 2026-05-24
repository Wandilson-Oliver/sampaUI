import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    lib: {
      entry: 'resources/js/sampaui.js',
      formats: ['es'],
      fileName: () => 'sampaui.js',
    },
    emptyOutDir: false,
    outDir: 'dist',
    rollupOptions: {
      output: {
        assetFileNames: 'sampaui.[ext]',
      },
    },
  },
});
