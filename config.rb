require 'builder'
require 'jasmine'
# Activate and configure extensions
# https://middlemanapp.com/advanced/configuration/#configuring-extensions

########################
#
# Site setting
#
########################
config[:site_url] = "http://www.morganeguerit.com"
config[:site_name] = "Morgane Guerit"
config[:site_name_short] = "MG"
config[:site_description] = "Morgane Guerit Description."
config[:site_keywords] = "site keywords, hogehoge, fugafuga"
config[:site_author] = "Romain Breton"
config[:site_local] = "fr_FR"
config[:site_page_type] = "page"
config[:site_color] = "#4285f4"
config[:site_image] = "assets/images/image.jpg"
config[:twitter_card] = "summary_large_image"
config[:favicon_extension] = "png"
config[:favicon_path] = "favicon/"
config[:favicon_original_file] = "_favicon-original.jpg"

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

# Set disable to false when publish
activate :google_analytics do |ga|
    # Property ID (default = nil)
    ga.tracking_id = 'UA-56126732-4'
    # Removing the last octet of the IP address (default = false)
    ga.anonymize_ip = false
    # Tracking across a domain and its subdomains (default = nil)
    ga.domain_name = config[:site_url]
    # Tracking across multiple domains and subdomains (default = false)
    ga.allow_linker = false
    # Enhanced Link Attribution (default = false)
    ga.enhanced_link_attribution = false
    # Log detail messages to the console (default = false)
    ga.debug = false
    # Trace debugging will output more verbose information to the console (default = false)
    ga.debug_trace = false
    # Disable extension (default = false)
    ga.disable = true
    # Testing your implementation without sending hits (default = true) in development
    ga.test = true
    # Compress the JavaScript code (default = false)
    ga.minify = false
    # Output style - :html includes <script> tag (default = :html)
    ga.output = :js
end

activate :directory_indexes
activate :sprockets
activate :relative_assets
activate :i18n, langs: [:fr]
activate :gdpr

# Per-page layout changes
page '/*.xml', layout: false
page '/*.json', layout: false
page '/*.txt', layout: false
page '/templates/*.erb', layout: false
page '/components/*.erb', layout: false
page "/sitemap.xml", :layout => false
page "/sitemap.html", :layout => false
sprockets.append_path File.join(root, 'bower_components')
sprockets.append_path File.join(root, 'node_modules')

set :relative_links, true
set :strip_index_file, true
set :trailing_slash,   true
set :css_dir, 'assets/stylesheets'
set :js_dir, 'assets/javascripts'
set :images_dir, 'assets/images'
set :fonts_dir, 'assets/fonts'

########################
#
# Generate images sizes
#
########################
# activate :middleman_simple_thumbnailer, use_specs: true


########################
#
# Generate Favicon
#
########################
activate :favicon_maker do |f|
    favicon_directory = "assets/images/#{config[:favicon_path]}"
    f.template_dir  = "source/#{favicon_directory}"
    f.icons = {
        "#{config[:favicon_original_file]}" => [
          { icon: "#{favicon_directory}apple-touch-icon-180x180-precomposed.#{config[:favicon_extension]}", size: "180x180" },             # Same as apple-touch-icon-57x57.png, for iPhone 6 Plus with @3× display
          { icon: "#{favicon_directory}apple-touch-icon-152x152-precomposed.#{config[:favicon_extension]}", size: "152x152" },             # Same as apple-touch-icon-57x57.png, for retina iPad with iOS7.
          { icon: "#{favicon_directory}apple-touch-icon-144x144-precomposed.#{config[:favicon_extension]}", size: "144x144" },             # Same as apple-touch-icon-57x57.png, for retina iPad with iOS6 or prior.
          { icon: "#{favicon_directory}apple-touch-icon-120x120-precomposed.#{config[:favicon_extension]}", size: "120x120" },             # Same as apple-touch-icon-57x57.png, for retina iPhone with iOS7.
          { icon: "#{favicon_directory}apple-touch-icon-114x114-precomposed.#{config[:favicon_extension]}", size: "114x114" },             # Same as apple-touch-icon-57x57.png, for retina iPhone with iOS6 or prior.
          { icon: "#{favicon_directory}apple-touch-icon-76x76-precomposed.#{config[:favicon_extension]}", size: "76x76" },               # Same as apple-touch-icon-57x57.png, for non-retina iPad with iOS7.
          { icon: "#{favicon_directory}apple-touch-icon-72x72-precomposed.#{config[:favicon_extension]}", size: "72x72" },               # Same as apple-touch-icon-57x57.png, for non-retina iPad with iOS6 or prior.
          { icon: "#{favicon_directory}apple-touch-icon-60x60-precomposed.#{config[:favicon_extension]}", size: "60x60" },               # Same as apple-touch-icon-57x57.png, for non-retina iPhone with iOS7.
          { icon: "#{favicon_directory}apple-touch-icon-57x57-precomposed.#{config[:favicon_extension]}", size: "57x57" },               # iPhone and iPad users can turn web pages into icons on their home screen. Such link appears as a regular iOS native application. When this happens, the device looks for a specific picture. The 57x57 resolution is convenient for non-retina iPhone with iOS6 or prior. Learn more in Apple docs.
          { icon: "#{favicon_directory}apple-touch-icon-precomposed.#{config[:favicon_extension]}", size: "57x57" },      # Same as apple-touch-icon.png, expect that is already have rounded corners (but neither drop shadow nor gloss effect).
          { icon: "#{favicon_directory}apple-touch-icon.#{config[:favicon_extension]}", size: "57x57" },                  # Same as apple-touch-icon-57x57.png, for "default" requests, as some devices may look for this specific file. This picture may save some 404 errors in your HTTP logs. See Apple docs
          { icon: "#{favicon_directory}favicon-512x512.#{config[:favicon_extension]}", size: "512x512" },                                  # For Android Chrome M31+.
          { icon: "#{favicon_directory}favicon-192x192.#{config[:favicon_extension]}", size: "192x192" },                                  # For Android Chrome M31+.
          { icon: "#{favicon_directory}favicon-196x196.#{config[:favicon_extension]}", size: "196x196" },                                  # For Android Chrome M31+.
          { icon: "#{favicon_directory}favicon-160x160.#{config[:favicon_extension]}", size: "160x160" },                                  # For Opera Speed Dial (up to Opera 12; this icon is deprecated starting from Opera 15), although the optimal icon is not square but rather 256x160. If Opera is a major platform for you, you should create this icon yourself.
          { icon: "#{favicon_directory}favicon-96x96.#{config[:favicon_extension]}", size: "96x96" },                                    # For Google TV.
          { icon: "#{favicon_directory}favicon-32x32.#{config[:favicon_extension]}", size: "32x32" },                                    # For Safari on Mac OS.
          { icon: "#{favicon_directory}favicon-16x16.#{config[:favicon_extension]}", size: "16x16" },                                    # The classic favicon, displayed in the tabs.
          { icon: "#{favicon_directory}favicon.#{config[:favicon_extension]}", size: "16x16" },                           # The classic favicon, displayed in the tabs.
          { icon: "#{favicon_directory}favicon.ico", size: "64x64,32x32,24x24,16x16" },         # Used by IE, and also by some other browsers if we are not careful.
          { icon: "#{favicon_directory}mstile-70x70.#{config[:favicon_extension]}", size: "70x70" },                      # For Windows 8 / IE11.
          { icon: "#{favicon_directory}mstile-144x144.#{config[:favicon_extension]}", size: "144x144" },
          { icon: "#{favicon_directory}mstile-150x150.#{config[:favicon_extension]}", size: "150x150" },
          { icon: "#{favicon_directory}mstile-310x310.#{config[:favicon_extension]}", size: "310x310" },
          { icon: "#{favicon_directory}mstile-310x150.#{config[:favicon_extension]}", size: "310x150" }
        ]
    }
end

########################
#
# Contentful
#
########################
activate :contentful do |f|
  f.space         = { morganeguerit: 't8tjfrku80c5' }
  f.access_token  = 'sveCfRiwFFJKuefiQem91upKb8Md10Mpyli180W7Uv0'
  f.cda_query     = { limit: 1000 }
  f.content_types = {
    'author': 'author',
    'image': 'image',
    'photoGallery': 'photoGallery'
  }
end

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
