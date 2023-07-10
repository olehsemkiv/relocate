module.exports = {
  printWidth: 100,
  singleQuote: true,
  endOfLine: 'auto',
  trailingComma: 'none',
  overrides: [
    {
      files: ['*.css', '*.scss'],
      options: {
        singleQuote: false
      }
    }
  ]
};
