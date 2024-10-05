import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  build: {
    manifest: true,
    rollupOptions: {
      input: 'src/main.ts',
    },
    modulePreload: {
      polyfill: false,
    },
    outDir: '../web/js/vite-widget',
    emptyOutDir: true,
  },
  server: {
    port: 3000,
    origin: 'http://localhost:3000', // so static assets are served
    // cors: true
  }
})
