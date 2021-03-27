module.exports = {
    productionSourceMap: false,
    devServer: {
        proxy: "https://localhost:60001"
    },
    chainWebpack: config => {
        config.plugin("html")
                .tap(args => {
                    args[0].title = "Summer Chat"
                    return args
                })
    }
}