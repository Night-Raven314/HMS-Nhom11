import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
import basicSsl from '@vitejs/plugin-basic-ssl'

// https://vite.dev/config/
export default defineConfig({
  plugins: [react(), basicSsl()],
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler', // or "modern", "legacy"
        // silenceDeprecations: ["legacy-js-api"]
      },
    },
  },
  server: {
    proxy: {
      '/HMS-Nhom11/backend': {
        target: 'http://localhost:8080',
        changeOrigin: true
      },
    }
  }
})
