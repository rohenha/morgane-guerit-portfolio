# Activate and configure extensions
# https://middlemanapp.com/advanced/configuration/#configuring-extensions

########################
#
# Setting of Autoprefixer
#
########################
activate :autoprefixer do |config|
    config.browsers = ['last 3 versions']
    config.flexbox = true
    config.grid = true
    config.inline = true
end

# Layouts
# https://middlemanapp.com/basics/layouts/

# Per-page layout changes
page '/*.xml', layout: false
page '/*.json', layout: false
page '/*.txt', layout: false

activate :directory_indexes
# activate :sprockets
activate :relative_assets
activate :i18n, langs: [:fr]
# activate :gdpr
# sprockets.append_path File.join(root, 'bower_components')
# sprockets.append_path File.join(root, 'node_modules')
#
set :relative_links, true
set :strip_index_file, true
set :trailing_slash,   true
set :css_dir, 'assets/stylesheets'
set :js_dir, 'assets/javascripts'
set :images_dir, 'assets/images'
set :fonts_dir, 'assets/fonts'

########################
#
# Development Configuration
#
########################
configure :development do
    config[:root_uri] = '/'
    activate :livereload
    set :debug_assets, true
end

########################
#
# Build Configuration
#
########################
configure :build do
    config[:root_uri] = '/'
    activate :gzip
    activate :minify_html
    # activate :asset_hash
    activate :minify_css
    activate :minify_javascript

end
