module.exports = {
  configureWebpack: {
    devServer: {
      watchOptions: {
        ignored: [/node_modules/, /public/],
      }
    }
  },
  pwa: {
    name: 'Inge & FJ - Wedding Website',
    themeColor: 'CBB28A',
    msTileColor: 'CBB28A'
  }
}
