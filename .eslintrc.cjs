module.exports = {
  root: true,
  extends: ['airbnb', 'prettier', 'plugin:prettier/recommended'],
  rules: {
    'import/extensions': 'off',
  },
  env: {
    browser: true,
  },
  plugins: ['prettier'],
  parserOptions: {
    ecmaVersion: 2020,
  },
};
