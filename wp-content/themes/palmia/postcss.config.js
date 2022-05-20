const purgecss = require('@fullhuman/postcss-purgecss')
const cssnano = require('cssnano')
const postcss = require('postcss');

module.exports = {
    plugins: [
        require('postcss-nested-ancestors'),
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-apply'),
        require("postcss-import"),
        require('postcss-nested'),
        cssnano({
            preset: 'default'
        }),
        purgecss({
            content: ['./**/*.php'],
            defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
        })
    ]
}