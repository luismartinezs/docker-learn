import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  // below needed to serve app from docker
  server: {
    port: 5173,
    strictPort: true,
    host: true,
  },
})
