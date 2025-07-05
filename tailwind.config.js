module.exports = {
  content: [
    "./src/**/*.{html,js}", // pastikan ini sesuai dengan struktur folder kamu
    "./node_modules/daisyui/dist/**/*.js", // penting untuk DaisyUI
  ],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui')],
}
