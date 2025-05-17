export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
      buildDirectory: 'build',  // これが「build/.vite」の「build」部分だけを指す
    }),
  ],
  build: {
    manifest: true,
    outDir: 'public/build',
    emptyOutDir: true,
  },
});
