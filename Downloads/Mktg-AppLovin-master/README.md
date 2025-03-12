# AppLovin WordPress Theme Documentation

## Table of Contents

1. [WordPress Theme Functions](#wordpress-theme-functions)
   - [Core Structure](#core-structure)
   - [Module Organization](#module-organization)
   - [Key Features](#key-features)
   - [Best Practices](#best-practices)
   - [Template System and Workflow](#template-system-and-workflow)
   - [Theme Files Structure](#theme-files-structure)

2. [WordPress Asset Management](#wordpress-asset-management)
   - [Enqueue Functions Overview](#enqueue-functions-overview)
   - [Core Asset Loading](#core-asset-loading)
   - [Environment-Based Asset Loading](#environment-based-asset-loading)
   - [Third-Party Dependencies](#third-party-dependencies)
   - [Template-Specific Assets](#template-specific-assets)
   - [Image Management](#image-management)
   - [Language-Specific Styles](#language-specific-styles)
   - [Polylang Integration](#polylang-integration)

3. [Available Scripts](#available-scripts)
   - [Initial Setup](#initial-setup)
   - [Tailwind CSS](#tailwind-css)
   - [SCSS Compilation & Watching](#scss-compilation--watching)
   - [CSS Prefixing and Minification](#css-prefixing-and-minification)
   - [JavaScript Tools](#javascript-tools)
   - [Production Build](#production-build)
   - [Quality Assurance](#quality-assurance)

4. [Build and Deployment](#build-and-deployment)
   - [Gulp Configuration](#gulp-configuration)
   - [CSS Build](#css-build)
   - [JavaScript Tools](#javascript-tools-1)
   - [Production Build](#production-build-1)
   - [Quality Assurance](#quality-assurance-1)

5. [Deployment Workflows](#deployment-workflows)
   - [Development Deployment](#development-deployment-developmentyaml)
   - [Staging Deployment](#staging-deployment-stagingyaml)
   - [Production Deployment](#production-deployment-productionyaml)
   - [Testing Deployments Locally](#testing-deployments-locally)

6. [Environment and Cache Management](#environment-and-cache-management)
   - [Environment-Based Asset Management](#environment-based-asset-management-1)
   - [Versioning and Cache Management](#versioning-and-cache-management)

7. [API Integrations](#api-integrations)
   - [Overview](#overview)
   - [API Components](#api-components)
   - [Integrated Services](#integrated-services)
   - [Architecture](#architecture)
   - [Implementation Best Practices](#implementation-best-practices)
   - [Usage Guidelines](#usage-guidelines)

8. [Google Cloud & Analytics Integration](#google-cloud--analytics-integration)
   - [Google Tag Manager (GTM)](#google-tag-manager-gtm)
   - [Google Cloud Platform (GCP) Infrastructure](#google-cloud-platform-gcp-infrastructure)
   - [Implementation Best Practices](#implementation-best-practices-1)

9. [Frontend Technologies](#frontend-technologies)
   - [Tailwind CSS Implementation](#tailwind-css-implementation)
   - [JavaScript Organization](#javascript-organization)
   - [Font Assets](#font-assets)

10. [SASS Architecture](#sass-architecture)
    - [Directory Structure](#directory-structure)
    - [Main Imports](#main-imports)
    - [Legacy Code Review](#legacy-code-review)

11. [Version Control](#version-control)
    - [Git Ignore Configuration](#git-ignore-configuration)
    - [Commit Best Practices](#commit-best-practices)

---

This documentation covers the complete technical implementation of the AppLovin WordPress theme, including build processes, WordPress functionality, API integrations, and frontend technologies. The theme features a modern development workflow with Tailwind CSS, SCSS processing, automated deployments, and integration with multiple external services.

## WordPress Theme Functions

### Core Structure

The theme's functionality is organized through modular includes in `functions.php`, following a separation of concerns pattern:

```php
// Core Libraries
include( get_template_directory() . '/wpframe-master/autoload.php' );
include( get_template_directory() . '/vendor/autoload.php' );  // Composer autoload

// Theme Configuration
include( get_template_directory() . '/inc/strings.php' );      // Language strings
include( get_template_directory() . '/inc/acf-functions.php' );// Advanced Custom Fields
include( get_template_directory() . '/inc/widgets.php' );      // Custom widgets
include( get_template_directory() . '/inc/sidebars.php' );     // Theme sidebars
include( get_template_directory() . '/inc/thumbnails.php' );   // Image sizes
include( get_template_directory() . '/inc/menus.php' );        // Navigation menus

// Asset Management
include( get_template_directory() . '/inc/enqueue-functions.php' ); // CSS/JS loading

// Features and Functionality
include( get_template_directory() . '/inc/theme-functions.php' );   // Core theme functions
include( get_template_directory() . '/inc/nav-functions.php' );     // Navigation logic
include( get_template_directory() . '/inc/api-functions.php' );     // REST API endpoints
include( get_template_directory() . '/inc/post-functions.php' );    // Custom post types
include( get_template_directory() . '/inc/social-share.php' );      // Social sharing

// Security
include( get_template_directory() . '/security/csp.php' );          // Content Security Policy
```

### Module Organization

1. **Core Libraries**
   - WPFrame custom framework
   - Composer dependencies
   - Essential WordPress functions

2. **Theme Configuration**
   - Language and localization
   - Advanced Custom Fields setup
   - Widget and sidebar registration
   - Thumbnail size definitions
   - Navigation menu registration

3. **Asset Management**
   - CSS and JavaScript enqueuing
   - Environment-based asset loading
   - Version control integration
   - Third-party dependency management

4. **Features and Functionality**
   - Core theme functions
   - Navigation handling
   - REST API endpoints
   - Custom post types
   - Social sharing features

5. **Security Implementation**
   - CSP implementation through WP Engine's security settings
   - Custom security headers management
   - Environment-specific security configurations

### Key Features

1. **Modular Architecture**
   - Each functionality group in separate files
   - Clear separation of concerns
   - Easy maintenance and updates

2. **Security Focus**
   - CSP implementation through WP Engine's security settings
   - Environment-specific security configurations
   - Secure header management through WP Engine

3. **Asset Optimization**
   - Environment-aware loading
   - Version-controlled assets
   - Optimized third-party loading

4. **Development Tools**
   - Composer dependency management
   - Custom framework integration
   - Advanced Custom Fields support

### Best Practices

1. **File Organization**
   - All includes in `/inc` directory
   - Security files in `/security`
   - Vendor files in `/vendor`

2. **Loading Order**
   - Libraries loaded first
   - Configuration files next
   - Features and functionality last
   - Security implementations after all modules

3. **Dependency Management**
   - Composer for PHP dependencies
   - NPM for frontend assets
   - Custom framework for WordPress extensions

4. **Security Considerations**
   - WP Engine security settings management
   - Environment-specific security configurations
   - Security headers handled through WP Engine

### Template System and Workflow

The theme implements a modular template system that separates page-specific content from reusable components:

1. **Directory Structure**
   ```
   themes/applovin/
   ├── template-pages/                # Page-specific templates
   │   ├── about/                     # About page sections
   │   ├── careers/                   # Career page sections
   │   ├── leadership/                # Leadership page sections
   │   ├── press/                     # Press page sections
   │   └── ...                        # Additional page sections and templates
   ```

2. **Template Hierarchy**
   - Page templates (e.g., `about.php`) serve as controllers
   - Section templates contain modular page content
   - Reusable modules provide shared functionality
   - Fallback system checks multiple locations for templates

3. **Page Workflow Example: About Page**
   ```php
   // 1. Meta Tag Definition
   $page_title = "About AppLovin | Company info, mission, vision, and values";
   $page_description = "Address mission-critical business challenges with AppLovin's full-stack solutions...";
   $page_url = "https://applovin.com/about/";
   $page_image = get_template_directory_uri() . "/images/open-graph-about.jpg";
   
   // 2. Additional Meta Tags
   $extra_meta = [
       '<meta property="og:site_name" content="AppLovin">',
       '<meta name="twitter:site" content="@AppLovin">'
   ];
   
   // 3. Meta Tag Generation
   applovin_meta_tags($page_title, $page_description, $page_url, $page_image, $page_image_alt, $extra_meta);
   
   // 4. Section Loading
   $sections = [
       'hero-section',
       'office-section',
       'values-section',
       'leadership-section',
       'cta-section',
   ];
   
   foreach ($sections as $section) {
       include_template_part($section);
   }
   
   // 5. Conditional Asset Loading
   if (locate_template("template-pages/about/office-section.php")) {
       wp_enqueue_script('growth-script');
   }
   ```

4. **Meta Tag Management System**
   ```php
   function applovin_meta_tags($title, $description, $url, $image, $image_alt, $extra_meta = []) {
       // Basic Meta Tags
       echo "<title>" . esc_html($title) . "</title>";
       echo "<meta name=\"description\" content=\"" . esc_attr($description) . "\">";
       
       // Open Graph Tags
       echo "<meta property=\"og:url\" content=\"" . esc_url($url) . "\">";
       echo "<meta property=\"og:type\" content=\"website\">";
       echo "<meta property=\"og:title\" content=\"" . esc_html($title) . "\">";
       echo "<meta property=\"og:description\" content=\"" . esc_attr($description) . "\">";
       echo "<meta property=\"og:image\" content=\"" . esc_url($image) . "\">";
       
       // Twitter Card Tags
       echo "<meta name=\"twitter:card\" content=\"summary_large_image\">";
       echo "<meta name=\"twitter:title\" content=\"" . esc_html($title) . "\">";
       echo "<meta name=\"twitter:description\" content=\"" . esc_attr($description) . "\">";
       echo "<meta name=\"twitter:image\" content=\"" . esc_url($image) . "\">";
       
       // Additional Meta Tags
       foreach ($extra_meta as $meta_tag) {
           echo $meta_tag;
       }
   }
   ```

5. **Workflow Benefits**
   - **Organized Meta Management**:
     - Centralized meta tag generation
     - Consistent social media optimization
     - Easy maintenance of SEO elements
   
   - **Modular Section Loading**:
     - Independent section development
     - Easy section reordering
     - Conditional content loading
   
   - **Asset Optimization**:
     - Section-specific script loading
     - Conditional asset inclusion
     - Performance-focused loading
   
   - **Template Flexibility**:
     - Section-first architecture
     - Reusable components
     - Clear separation of concerns

This modular approach provides:
- Clear separation of concerns
- Easy template maintenance
- Reusable components
- Consistent page structure
- Optimized asset loading

### Theme Files Structure

The theme's functionality is distributed across several key files in the `inc/` directory:

1. **API Functions (`api-functions.php`)**
   - Manages API integrations with external services
   - Loads API-specific autoloaders for:
     - Greenhouse (job board)
     - HubSpot (marketing)
     - Press Feed
     - News Feed
     - Wistia (video)

2. **Navigation Functions (`nav-functions.php`)**
   - Handles custom menu functionality
   - Manages language-based navigation
   - Controls responsive menu behavior
   - Implements custom link injection
   - Handles NEW item tags in menus

3. **Post Functions (`post-functions.php`)**
   - Sets up custom post types
   - Manages custom taxonomies
   - Handles single and archive templates
   - Controls post routing and templates

   **Post Directory Structure (`/post/`)**
   ```
   post/
   ├── ads/                    # Advertisement post type
   │   ├── register-ads.php    # Post type registration
   │   ├── register-ads-taxonomies.php  # Custom taxonomies
   │   ├── single-ads.php      # Single post template
   │   └── archive-ads.php     # Archive template
   └── ...                     # Additional post types and templates
   ```

   Key Features:
   - Modular post type organization
   - Separate template routing
   - Custom taxonomy management
   - Template overrides for single and archive views
   - Automatic template loading based on post type

   **Template Modules Structure (`/template-modules/`)**
   ```
   template-modules/
   ├── components/                # UI components
   │   ├── cta-centered.php      # Centered call-to-action component
   │   ├── hero-centered.php     # Centered hero section
   │   ├── lightbox.php          # Lightbox overlay component
   │   ├── one-column-centered.php # Single column layout
   │   ├── three-column-icons.php # Three column with icons
   │   ├── two-column-img.php    # Two column with image
   │   ├── two-column-list.php   # Two column with list
   │   └── video-centered.php    # Centered video component
   ├── applovin-lightbox.php     # Custom lightbox implementation
   ├── awards.php                # Awards section template
   ├── cares-form.php            # Cares initiative form
   ├── early-career-slider.php   # Career opportunities slider
   ├── email-signup.php          # Newsletter signup form
   ├── news-feed.php             # Dynamic news feed
   └── press-feed.php            # Press releases feed
   ```

   Key Features:
   - Tailwind-first component architecture in `/components`
   - Reusable template modules for common features
   - Standardized naming conventions
   - Modular component organization
   - Separation of components and feature modules

4. **Theme Functions (`theme-functions.php`)**
   - Core WordPress customizations
   - Security header management
   - Custom query modifications
   - AJAX handlers for filtering
   - Gutenberg block registrations
   - Partner post types and taxonomies
   - Multilingual support functions

5. **String Management (`strings.php`)**
   - Registers translatable strings
   - Manages text for:
     - General UI elements
     - Navigation items
     - Blog components
     - Product descriptions
     - Form labels
     - Error messages

6. **ACF Functions (`acf-functions.php`)**
   - Advanced Custom Fields configuration
   - Custom field management
   - Editor customizations
   - Page-specific field controls

Each file follows these principles:
- Single responsibility focus
- Clear function naming
- Proper WordPress coding standards
- Efficient loading practices
- Modular organization

## WordPress Asset Management

### Enqueue Functions Overview

The theme uses WordPress's enqueue system to load CSS and JavaScript files. This is handled primarily through two main functions in `inc/enqueue-functions.php`:

1. **`applovin_theme_scripts()`**: Handles core theme assets
   - Loads based on environment type (local vs. production)
   - Manages version control through Git commit hashes
   - Handles jQuery and its dependencies

2. **`applovin_scripts_styles()`**: Handles template-specific assets
   - Loads CSS/JS files based on current template
   - Manages language-specific styles
   - Handles third-party libraries

### Core Asset Loading

```php
// Version management using Git commit hash
if ( WP_ENV !== 'local' && ! defined( 'APP_VERSION' ) ) {
    $version_file = get_stylesheet_directory() . '/version.txt';
    if ( file_exists( $version_file ) ) {
        $git_version = trim( file_get_contents( $version_file ) );
    } else {
        $git_version = '1.0.0';
    }
    define( 'APP_VERSION', $git_version );
}
```

### Environment-Based Asset Loading

The theme loads different versions of assets based on the environment:

```php
if (defined('WP_ENVIRONMENT_TYPE') && WP_ENVIRONMENT_TYPE === 'local') {
    // Development (unminified) assets
    wp_enqueue_style('applovin-legacy-style', '/dist/css/legacy-style.css');
    wp_enqueue_style('applovin-tailwind-style', '/tailwind_output.css');
    wp_enqueue_style('applovin-theme-style', '/style.css');
} else {
    // Production (minified) assets
    wp_enqueue_style('applovin-legacy-style', '/legacy-style.min.css');
    wp_enqueue_style('applovin-tailwind-style', '/dist/css/tailwind_output.min.css');
    wp_enqueue_style('applovin-theme-style', '/style.min.css');
}
```

### Third-Party Dependencies

The theme manages third-party scripts efficiently:

```php
// jQuery (loaded in header)
wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', [], '3.7.1', false);

// Other third-party libraries (loaded in footer)
wp_enqueue_script('lazysizes', 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js', [], '3.10.4', true);
wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js', [], '3.10.4', true);
wp_enqueue_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js', ['gsap'], '3.10.4', true);
```

### Template-Specific Assets

The theme loads additional assets based on the current template:

- Each template has its own CSS file (e.g., `style-blog.css` for blog pages)
- Template-specific JavaScript is loaded only when needed
- Assets are versioned using file modification time for development
- Production uses the Git commit hash for versioning

### Image Management

The theme's images are stored in the `images/` directory. Special consideration must be taken when managing these assets:

1. **GitHub File Size Limitations**
   - GitHub has a file size limit of 100MB
   - Files larger than 50MB will trigger a warning
   - Large image commits may be rejected by GitHub
   - For static, non-editable images, use Google Cloud Platform buckets:
     ```
     gs://applovin_assets_us/    # Primary bucket for static assets
     gs://applovin_assets_apac/  # APAC replica for regional delivery
     ```
   - Consider using Git LFS for large files that must remain in the repository

2. **Best Practices**
   - Optimize images before committing
   - Use appropriate image formats:
     - JPG for photographs
     - PNG for graphics with transparency
     - SVG for vectors and icons
   - Consider using WebP format with fallbacks
   - Implement lazy loading for better performance
   - Store static assets in GCP buckets for better delivery and version control

3. **Image Directory Structure**
   Current main categories in the images directory:
   ```
   images/
   ├── games/          # Game-related assets and screenshots
   ├── jobs/           # Career and job listing images
   ├── landing/        # Landing page assets and hero images
   ├── logos/          # Brand and partner logos
   ├── max/            # MAX platform related assets
   ├── press/          # Press and media assets
   ├── team/           # Team member photos and profiles
   ├── *.svg           # Various vector graphics
   ├── *.png           # Various bitmap images
   ├── *.jpg           # Various photographs
   └── ...             # Additional assets and media files
   ```

   **Note**: For large static assets or images that don't require frequent updates, consider using the GCP buckets:
   ```
   gs://applovin_assets_us/    # Primary bucket for static assets
   gs://applovin_assets_apac/  # APAC replica for regional delivery
   ```

4. **Version Control Guidelines**
   - Use image optimization in build process
   - Store large static assets in GCP buckets
   - Document image requirements in PR templates
   - Regular cleanup of unused images
   - Keep repository size manageable by using external storage

### Language-Specific Styles

The theme includes language-specific CSS variables:

```php
$langDetect = get_language_attributes();
if (str_contains($langDetect, "zh-CN")) {
    wp_enqueue_style('applovin-style-cn', '/css/var-cn.css');
} else if (str_contains($langDetect, "ko-KR")) {
    wp_enqueue_style('applovin-style-ko', '/css/var-ko.css');
} else if (str_contains($langDetect, "ja")) {
    wp_enqueue_style('applovin-style-ja', '/css/var-ja.css');
}
```

### Polylang Integration

The theme uses Polylang for multilingual content management. This integration is handled through several key components:

1. **String Translation Management**
   ```php
   // Located in inc/strings.php
   if (function_exists('pll_register_string')) {
       // Navigation Labels
       pll_register_string('Products', 'Products', 'Navigation');
       pll_register_string('Solutions', 'Solutions', 'Navigation');
       pll_register_string('Resources', 'Resources', 'Navigation');
   }
   ```

2. **Language Detection and Control**
   ```php
   // Get current language code (e.g., 'en', 'cn', 'ja', 'ko')
   $current_language = pll_current_language();

   // Example of language-specific content control
   if ($current_language == 'en') {
       // English-specific content
       $heading = "Welcome to AppLovin";
       $description = "Discover our solutions";
   } elseif ($current_language == 'cn') {
       // Chinese-specific content
       $heading = "欢迎来到AppLovin";
       $description = "探索我们的解决方案";
   } elseif ($current_language == 'ja') {
       // Japanese-specific content
       $heading = "AppLovinへようこそ";
       $description = "ソリューションを見る";
   }
   ```

3. **Implementation Examples**
   ```php
   // In template files or custom PHP pages
   $current_language = pll_current_language();
   
   // Control template parts based on language
   if ($current_language == 'en') {
       get_template_part('template-parts/content', 'english');
   } else {
       get_template_part('template-parts/content', 'international');
   }

   // Control form displays
   if ($current_language == 'cn') {
       // Show China-specific form fields
       include_template_part('forms/china-specific-fields');
   }

   // Adjust layouts
   $layout_class = $current_language == 'ja' ? 'japanese-layout' : 'default-layout';
   ```

4. **Translation Management**
   - Strings registered in `inc/strings.php` are available in WordPress admin
   - Accessible via Polylang's string translation interface
   - Organized by context groups (Navigation, Forms, Content, etc.)
   - Easy management for non-technical editors

5. **Usage in Templates**
   ```php
   // Example usage in templates
   <?php pll_e('Products'); ?> // Echoes translated string
   <?php pll__('Submit'); ?>   // Returns translated string
   ```

6. **Language Switcher**
   - Automatic language detection
   - URL-based language switching
   - Language-specific content loading
   - SEO-friendly URL structure

7. **Content Organization**
   - Language-specific pages and posts
   - Translated meta information
   - Language-specific media
   - Synchronized content structure

Key Benefits:
- Granular control over language-specific content
- Programmatic content switching based on language
- Flexible template organization
- Consistent multilingual experience
- Centralized string management
- Easy content maintenance
- SEO-friendly language handling
- Flexible content translation

## Available Scripts

### Initial Setup

1. **Navigate to Theme Directory**
   ```bash
   cd themes/applovin
   ```

2. **Install Dependencies**
   ```bash
   npm install
   ```

3. **Check for Vulnerabilities**
   ```bash
   npm audit
   ```
   - Review any security vulnerabilities
   - Run `npm audit fix` to automatically fix issues
   - For major version updates, run `npm audit fix --force` (use with caution)

4. **Update Dependencies**
   ```bash
   npm outdated
   ```
   - Lists outdated packages
   - Update packages:
     ```bash
     npm update        # Safe updates within version range
     npm update --latest  # Updates to latest versions (may break compatibility)
     ```

5. **Package Management Best Practices**
   - Regularly run security audits
   - Keep dependencies up to date
   - Test after major version updates
   - Document breaking changes
   - Update package-lock.json with installations

### Tailwind CSS

- **`css:watch:tailwind`**
  - Watches for changes in `tailwind.css` and compiles the output to `tailwind_output.css`.
  - Command:
    ```bash
    npx tailwindcss -i ./tailwind.css -o ./tailwind_output.css --watch
    ```

### SCSS Compilation & Watching

- **`css:watch:scss`**
  - Watches and compiles SCSS files to CSS with source maps.
  - Command:
    ```bash
    sass --watch sass:./ --source-map --style expanded
    ```

### SCSS Linting

- **`lint:scss`**
  - Lints SCSS files using Stylelint.
  - Command:
    ```bash
    stylelint 'sass/**/*.scss'
    ```

### CSS Prefixing and Minification

- **`css:prefix`**
  - Applies vendor prefixes to CSS using Gulp's Autoprefixer.
  - Command:
    ```bash
    gulp autoprefixer
    ```

- **`css:minify`**
  - Minifies the CSS file and outputs to the root directory.
  - Command:
    ```bash
    css-minify --file ./dist/css/style.pre.css -o ./dist/css/ && mv ./dist/css/style.pre.min.css ./style.min.css
    ```

- **`css:minify-legacy`**
  - Minifies the legacy CSS file.
  - Command:
    ```bash
    css-minify --file ./dist/css/legacy-style.pre.css -o ./dist/css/ && mv ./dist/css/legacy-style.pre.min.css ./legacy-style.min.css
    ```

- **`css:minify:tailwind`**
  - Minifies the Tailwind CSS output.
  - Command:
    ```bash
    css-minify --file ./dist/css/tailwind_output.pre.css -o ./dist/css/ && mv ./dist/css/tailwind_output.pre.min.css ./dist/css/tailwind_output.min.css
    ```

### CSS Build

- **`css:build`**
  - Runs the complete CSS build process:
    1. Adds vendor prefixes
    2. Minifies the main CSS
    3. Minifies the legacy CSS
    4. Minifies the Tailwind CSS
  - Command:
    ```bash
    npm run css:prefix && npm run css:minify && npm run css:minify-legacy && npm run css:minify:tailwind
    ```

### JavaScript Tools

- **`js:minify`**
  - Minifies JavaScript files using Gulp.
  - Command:
    ```bash
    node ./node_modules/gulp/bin/gulp.js minifyIndividualJs
    ```

- **`lint:js`**
  - Lints JavaScript files using ESLint.
  - Command:
    ```bash
    npx eslint js/*.js
    ```

### Production Build

- **`build:prod`**
  - Runs the full production build process.
  - Command:
    ```bash
    npm run css:build && npm run js:minify
    ```

### Quality Assurance

- **`accessibility:check`**
  - Runs accessibility checks using Pa11y.
  - Command:
    ```bash
    npx gulp accessibility
    ```

- **`lighthouse-mobile:check`**
  - Runs Lighthouse audit for mobile.
  - Command:
    ```bash
    lighthouse https://applovin.com --output html --output-path ./report-mobile.html
    ```

- **`lighthouse-desktop:check`**
  - Runs Lighthouse audit for desktop.
  - Command:
    ```bash
    lighthouse https://applovin.com --output html --output-path ./report-desktop.html --preset=desktop
    ```

## Build and Deployment

### Gulp Configuration

The theme uses Gulp for task automation and build processes. The `gulpfile.js` manages several critical build and development tasks:

1. **JavaScript Processing**
   ```javascript
   // JavaScript minification with source maps
   const minifyIndividualJs = () => {
       return src(['./js/*.js', '!./js/util/**/*.js'])
           .pipe(sourceMaps.init())
           .pipe(minifyJs())
           .pipe(sourceMaps.write())
           .pipe(dest('./dist/js/'));
   };
   ```
   - Minifies JavaScript files in the root `./js` folder
   - Excludes utility scripts in `./js/util/`
   - Generates source maps for debugging
   - Outputs to `./dist/js/` directory

2. **CSS Processing**
   ```javascript
   gulp.task('autoprefixer', () => {
       const browserslistConfig = [
           "> 0.3%",
           "last 4 versions",
           "not dead",
       ];
       return gulp.src(['./style.css', './tailwind_output.css', './dist/css/legacy-style.css'])
           .pipe(postcss([autoprefixer({ overrideBrowserslist: browserslistConfig })]))
           .pipe(rename({ suffix: '.pre' }))
           .pipe(gulp.dest('./dist/css/'));
   });
   ```
   - Adds vendor prefixes using Autoprefixer
   - Processes main, Tailwind, and legacy stylesheets
   - Configures browser support through Browserslist
   - Preserves source maps for development

3. **Quality Assurance**
   - **Accessibility Testing**:
     ```javascript
     gulp.task('accessibility', async () => {
         const results = await pa11y('https://applovin.com/');
         console.log(results.issues);
     });
     ```
   - **PHP Linting**:
     ```javascript
     gulp.task('phpcs', (done) => {
         exec(`phpcs --standard=WordPress ${phpFiles}`);
     });
     ```

4. **Development Workflow**
   - Watch tasks for automatic rebuilds
   - Source map generation for debugging
   - Separate development and production builds
   - Integrated PHP CodeSniffer support

5. **Task Organization**
   - Individual task modules
   - Configurable paths and options
   - Environment-specific settings
   - Extensible task pipeline

This configuration ensures:
- Consistent build process
- Code quality maintenance
- Development efficiency
- Performance optimization
- Cross-browser compatibility

### CSS Build

- **`css:build`**
  - Runs the complete CSS build process:
    1. Adds vendor prefixes
    2. Minifies the main CSS
    3. Minifies the legacy CSS
    4. Minifies the Tailwind CSS
  - Command:
    ```bash
    npm run css:prefix && npm run css:minify && npm run css:minify-legacy && npm run css:minify:tailwind
    ```

### JavaScript Tools

- **`js:minify`**
  - Minifies JavaScript files using Gulp.
  - Command:
    ```bash
    node ./node_modules/gulp/bin/gulp.js minifyIndividualJs
    ```

### Production Build

- **`build:prod`**
  - Runs the full production build process.
  - Command:
    ```bash
    npm run css:build && npm run js:minify
    ```

### Quality Assurance

- **`accessibility:check`**
  - Runs accessibility checks using Pa11y.
  - Command:
    ```bash
    npx gulp accessibility
    ```

- **`lighthouse-mobile:check`**
  - Runs Lighthouse audit for mobile.
  - Command:
    ```bash
    lighthouse https://applovin.com --output html --output-path ./report-mobile.html
    ```

- **`lighthouse-desktop:check`**
  - Runs Lighthouse audit for desktop.
  - Command:
    ```bash
    lighthouse https://applovin.com --output html --output-path ./report-desktop.html --preset=desktop
    ```

## Deployment Workflows

The project includes three GitHub Actions workflows for different deployment environments:

### Development Deployment (development.yaml)
- Triggered on push to `development` branch
- Build steps:
  1. Sets up Node.js v16
  2. Installs dependencies
  3. Builds CSS files
  4. Cleans up source maps
  5. Verifies `style.min.css`
  6. GZips CSS files
  7. Generates version file
  8. Deploys to WP Engine development environment

### Staging Deployment (staging.yaml)
- Triggered on push to `staging` branch
- Similar build steps to development
- Deploys to WP Engine staging environment

### Production Deployment (production.yaml)
- Triggered on push to `master` branch
- Additional checks:
  - Ensures branch is up-to-date with remote
  - Verifies build artifacts
- Deploys to WP Engine production environment

### Testing Deployments Locally

You can test the deployment workflows locally using `act`, a tool that allows you to run GitHub Actions locally. This helps verify your workflow configurations before pushing to the repository.

For detailed instructions and documentation:
- GitHub Repository: [github.com/nektos/act](https://github.com/nektos/act?tab=readme-ov-file)
- Official Documentation: [nektosact.com](https://nektosact.com/)

#### Prerequisites

1. **Install Docker**
   - Required for running actions in containers
   - Download and install Docker Desktop from [docker.com](https://www.docker.com/products/docker-desktop/)
   - Ensure Docker is running before using act

2. **Install Act**
   ```bash
   # Using Homebrew (Linux/macOS)
   brew install act
   ```

#### Workflow Organization

1. **Shared Test Workflow**
   - `test.yaml` is shared across the team for collaboration
   - Located in `.github/workflows/test.yaml`
   - Used for standardized testing procedures
   - Should be committed to the repository
   - All developers can review and contribute improvements

2. **Personal Test Workflows**
   - Create your own test workflows in `.github/workflows/`
   - Name them descriptively (e.g., `my-test-staging.yaml`, `my-test-prod.yaml`)
   - Add these files to `.gitignore` to keep them local:
     ```
     # Personal test workflows
     .github/workflows/my-*.yaml
     ```
   - Use for personal testing and workflow development
   - Won't be shared with other developers

#### Running Tests

1. **Using Shared Test Workflow**
   ```bash
   # List all available workflows and jobs
   act -l

   # Test using the shared test workflow (without actual deployment)
   act -j test
   ```

2. **Using Personal Test Workflows**
   ```bash
   # Test your personal workflow (without actual deployment)
   act -W .github/workflows/my-test-staging.yaml
   ```

#### Important Notes

- The shared `test.yaml` mirrors the production workflow but excludes the actual deployment step
- Tests run in a containerized environment, ensuring consistency
- For M-series Mac chips, use the `--container-architecture linux/amd64` flag
- Secrets and environment variables can be passed using the `--secret` flag
- The test environment is isolated and won't affect your production environment
- No actual deployments will occur when testing locally with `act`

All deployments use the WP Engine GitHub Action (`wpengine/github-action-wpe-site-deploy@v3`) and include:
- Node modules caching for faster builds
- Source map cleanup
- GZip compression of CSS files
- Version file generation
- Cache clearing on deployment

## Environment and Cache Management

### Environment-Based Asset Management

In development (`local`), non-minified versions of CSS files are used, while in production, minified versions are loaded. This is controlled through WordPress environment settings in `wp-config.php`:

```php
define( 'WP_ENVIRONMENT_TYPE', 'local' );
```

The theme will automatically load the appropriate CSS files based on the environment type.

### Versioning and Cache Management

### Overview

The project uses Git commit hashes for versioning, which is automatically handled during the deployment process. This approach ensures reliable cache busting and version tracking across all environments.

### Version File Generation

During deployment, a `version.txt` file is automatically generated containing the short Git commit hash. This is handled by the following step in the deployment workflows:

```bash
GIT_COMMIT=$(git rev-parse --short HEAD)
echo $GIT_COMMIT > version.txt
```

### Purpose

- **Deployment Tracking**: Each deployment is uniquely identified by its Git commit hash, making it easy to track which code version is deployed to each environment.
- **Cache Busting**: The Git commit hash is used to ensure browsers fetch the latest version of assets, preventing the use of outdated cached files.
- **Build Verification**: The version file helps verify that the correct build was deployed to each environment.

### Implementation

The version tracking is implemented in all three deployment workflows (development, staging, and production):

1. **Version Generation**: During deployment, the short Git commit hash is generated
2. **File Creation**: The hash is saved to `version.txt` in the theme directory
3. **Deployment**: The version file is deployed along with other assets
4. **Cache Management**: WP Engine's cache is cleared after deployment via `CACHE_CLEAR: TRUE`

This system provides several advantages:
- Reliable tracking of deployed code versions
- Automatic cache busting through Git commit hashes
- Consistency across all environments
- Easy rollback reference
- Integration with WP Engine's deployment system

## API Integrations

### Overview

The theme integrates with multiple external APIs through modular components located in `inc/api-functions.php`. Each API integration has its own dedicated directory with an autoloader for clean dependency management.

### API Components

```php
// API Autoloaders
require_once get_template_directory() . '/greenhouse-api/autoload.php'; 
require_once get_template_directory() . '/hubspot-api/autoload.php'; 
require_once get_template_directory() . '/pressfeed-api/autoload.php';
require_once get_template_directory() . '/newsfeed-api/autoload.php';
require_once get_template_directory() . '/wistia-api/autoload.php';
```

### Integrated Services

1. **Greenhouse Integration**
   - Job board and career page integration
   - Automated job posting synchronization
   - Application form handling
   - Position filtering and search functionality

2. **HubSpot Integration**
   - Contact form submissions
   - Lead tracking and management
   - Marketing automation workflows
   - Analytics and tracking integration

3. **Press Feed Integration**
   - Dynamic press release aggregation
   - Media coverage tracking
   - Press kit distribution
   - News filtering and categorization

4. **News Feed Integration**
   - Company news and updates
   - Blog post syndication
   - Content categorization
   - RSS feed management

5. **Wistia Integration**
   - Video content management
   - Player customization
   - Analytics tracking
   - Responsive video embedding

### Architecture

1. **Modular Design**
   - Each API has its own isolated directory
   - Independent autoloaders for each service
   - Separate configuration files
   - Service-specific error handling

2. **Security Measures**
   - API keys stored in environment variables
   - Request validation and sanitization
   - Rate limiting implementation
   - Error logging and monitoring

3. **Performance Optimization**
   - Response caching
   - Asynchronous requests where applicable
   - Batch processing for bulk operations
   - Optimized data storage

4. **Error Handling**
   - Graceful fallbacks
   - Detailed error logging
   - User-friendly error messages
   - Automatic retry mechanisms

### Implementation Best Practices

1. **Configuration Management**
   ```php
   // Example of secure API key handling
   define('API_KEY', getenv('SERVICE_API_KEY'));
   ```

2. **Response Caching**
   ```php
   // Example of caching implementation
   $cache_key = 'api_response_' . md5($request_url);
   $cached_data = wp_cache_get($cache_key);
   
   if (false === $cached_data) {
       $response = api_request();
       wp_cache_set($cache_key, $response, '', 3600);
   }
   ```

3. **Error Handling**
   ```php
   // Example of error handling pattern
   try {
       $api_response = make_api_request();
   } catch (ApiException $e) {
       error_log('API Error: ' . $e->getMessage());
       return fallback_response();
   }
   ```

4. **Rate Limiting**
   ```php
   // Example of rate limiting
   if (exceeded_rate_limit()) {
       header('Retry-After: 60');
       wp_die('Rate limit exceeded', 429);
   }
   ```

### Usage Guidelines

1. **API Initialization**
   - Load required dependencies
   - Configure API credentials
   - Initialize service clients
   - Set up error handlers

2. **Request Handling**
   - Validate input parameters
   - Check rate limits
   - Make API requests
   - Cache responses

3. **Response Processing**
   - Validate response data
   - Transform data format
   - Cache processed results
   - Handle error cases

4. **Maintenance**
   - Monitor API usage
   - Update API versions
   - Refresh cached data
   - Log error patterns

## Google Cloud & Analytics Integration

### Google Tag Manager (GTM)

1. **Implementation**
   - Located in `themes/applovin/header.php`
   ```html
   <!-- Google Tag Manager -->
   <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
   new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
   j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
   'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
   })(window,document,'script','dataLayer','GTM-XXXXX');</script>
   <!-- End Google Tag Manager -->
   ```

   **Note**: The GTM implementation is placed in the `<head>` section of `header.php` to ensure proper tracking and analytics functionality across all pages.

2. **Server-Side Tagging**
   - Custom server-side GTM container hosted on GCP
   - Enhanced data privacy and security
   - Improved site performance through reduced client-side code
   - Better control over data collection and processing

3. **Data Layer Implementation**
   ```javascript
   // Example of custom event tracking
   window.dataLayer = window.dataLayer || [];
   window.dataLayer.push({
       'event': 'customEvent',
       'eventCategory': 'User Interaction',
       'eventAction': 'Button Click',
       'eventLabel': 'CTA Button'
   });
   ```

### Google Cloud Platform (GCP) Infrastructure

1. **Content Buckets**
   - Primary bucket: `applovin_assets_us`
   - APAC replica bucket: `applovin_assets_apac`
   
   **Content Structure**:
   ```
   gs://applovin_assets_us/
   ├── endcards-html/     # HTML end cards for ads
   ├── gif/               # Animated GIF assets
   ├── images/           # Static image assets
   ├── svg/              # Vector graphics
   ├── videos/           # Video content
   ├── *.mp4            # Individual video files
   ├── *.jpg            # Individual image files
   ├── *.png            # Individual graphics
   ├── *.svg            # Individual vector files
   └── ...              # Additional assets and media files
   ```

   **Replication Setup**:
   - Primary bucket (`applovin_assets_us`) serves as the source
   - APAC bucket (`applovin_assets_apac`) automatically replicates content
   - Replication ensures optimal content delivery for APAC regions
   - Geographic routing based on user location

   **CDN Configuration**:
   - US bucket serves content to non-APAC regions
   - APAC bucket serves content to Asia-Pacific regions
   - Automatic failover and load balancing
   - Optimized latency for regional users

2. **Server-Side Infrastructure**
   - GTM server container hosted on Cloud Run
   - Server instances (Example from Wurl website implementation):
     ```
     Cloud Run Services:
     ├── server-side-tagging        # Production SST server
     └── server-side-tagging-preview # Preview/testing SST server
     ```
   - Note: The above Cloud Run services are specific to the Wurl website implementation
   - Integration through GTM Server container for:
     - Event processing and validation
     - Custom client configuration
     - Data transformation and enrichment
     - Cross-domain tracking
     - IP anonymization
     - Cookie management
   - Secure data processing with regional compliance
   - Preview environment for testing tag configurations
   - Automatic scaling based on traffic demands
   - Real-time event processing and validation

3. **Security & Access Control**

### Implementation Best Practices

1. **GTM Container Organization**
   - Structured tag naming conventions
   - Clear trigger definitions
   - Documented variables
   - Version control and change management

2. **Data Collection**
   - GDPR/CCPA compliance integration
   - Consent management
   - Data retention policies
   - PII handling guidelines

3. **Performance Optimization**
   - Lazy loading of tracking scripts
   - Efficient tag firing rules
   - Resource prioritization
   - Cache optimization

4. **Monitoring & Maintenance**
   - Regular tag audits
   - Performance monitoring
   - Error tracking
   - Debug logging

## Frontend Technologies

### Tailwind CSS Implementation

### Configuration

The project uses Tailwind CSS for utility-first styling. All Tailwind configurations including content paths, theme customizations, screen breakpoints, custom utilities, and plugins are defined in `tailwind.config.js`.

Key configuration areas include:
- Content scanning paths
- Custom breakpoints
- Theme extensions
- Custom utilities and plugins
- Color palette and gradients

### Base Structure

The base Tailwind CSS file (`tailwind.css`) includes the core directives:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

### Build Process

1. **Development**
   - Uses `css:watch:tailwind` script for real-time compilation
   - Outputs unminified CSS to `tailwind_output.css`
   - Command: `npx tailwindcss -i ./tailwind.css -o ./tailwind_output.css --watch`

2. **Production**
   - Processes through `css:build` workflow
   - Minifies output using `css:minify:tailwind`
   - Final file: `dist/css/tailwind_output.min.css`

### Custom Features

1. **Custom Breakpoints**
   - Mobile: Default
   - Tablet: `md` (834px)
   - Desktop: `lg` (1024px)
   - Wide: `xl` (1280px)
   - Ultra-wide: `2xl` (1536px)

2. **File Processing**
   - Scans all PHP, HTML, and JS files for utility classes
   - Excludes `node_modules` directory
   - Preserves source files for development debugging

### JavaScript Organization

The theme's JavaScript is organized into focused, feature-specific files:

1. **Core Functionality**
   ```
   js/
   ├── sitemain.js              # Core site functionality
   ├── gsap-animations.js       # GSAP animation configurations
   ├── custom-filter.js         # Generic filtering system
   └── block-script.js         # Gutenberg block enhancements
   ```

2. **Feature-Specific Scripts**
   - **Content Management**:
     - `blog.js` - Blog functionality and interactions
     - `load-more.js` - AJAX-based content loading
     - `search-filters.js` - Search functionality
     - `custom-ajax-filter.js` - AJAX filtering system

   - **Interactive Components**:
     - `lightbox.js` - Custom lightbox implementation
     - `leadership-modal.js` - Team member modals
     - `testimonials.js` - Testimonial functionality
     - `testimonials-slider.js` - Testimonial carousels

   - **Page-Specific Scripts**:
     - `mission.js` - Mission page interactions
     - `jobspage.js` - Careers page functionality
     - `brand-hub.js` - Brand hub features
     - `internship-slider.js` - Internship page slider

3. **Third-Party Libraries**
   - **Animation**:
     - `FWDR3DCov.js` - 3D cover flow

   - **Utilities**:
     - `clipboard.min.js` - Copy to clipboard
     - `list.min.js` - List manipulation
     - `logorand.min.js` - Logo randomization

4. **Integration Scripts**
   - `lever-jobs-embed.js` - Lever job board integration
   - `growth.js` - Growth metrics tracking
   - `my-live-filter.js` - Real-time content filtering

Key Features:
- Modular script organization
- Feature-specific separation
- Optimized third-party integrations
- Clear naming conventions
- Minified production files
- Conditional loading based on page templates

### Font Assets

The theme implements a sophisticated font loading strategy with language-specific optimizations and performance considerations:

1. **Font Families**
   ```
   fonts/
   ├── Avenir/              # Primary Latin font family
   │   ├── Light
   │   ├── LightOblique
   │   ├── Medium
   │   ├── MediumOblique
   │   ├── Heavy
   │   ├── HeavyOblique
   │   ├── Black
   │   └── BlackOblique
   ├── ClarendonBT/         # Secondary display font
   ├── TTBackwards/         # Special display font
   └── fontello/           # Icon font files
   ```

2. **Monotype CDN Integration**
   ```html
   <!-- Primary Monotype CDN -->
   <link rel="preload" 
         href="https://cdn.fonts.net/t/1.css?apiType=css&projectid=8d68d7d1-1cef-4e68-a87a-f377afc8b375" 
         as="style" 
         onload="this.onload=null;this.rel='stylesheet'">
   
   <!-- Fallback for No-JavaScript -->
   <noscript>
     <link rel="stylesheet" 
           href="https://cdn.fonts.net/t/1.css?apiType=css&projectid=8d68d7d1-1cef-4e68-a87a-f377afc8b375" 
           defer>
   </noscript>
   ```

3. **Language-Specific Font Loading**
   ```php
   // Chinese (Simplified)
   if (str_contains($langDetect, "zh-CN")) {
       echo '<script type="text/javascript" src="https://fast.fonts.net/jsapi/7835d1f6-fe5e-4c28-ad37-c0a696770e84.js"></script>';
   }
   // Korean
   else if (str_contains($langDetect, "ko-KR")) {
       echo '<script type="text/javascript" src="https://fast.fonts.net/jsapi/38a315bb-940f-458e-9ab9-b8df46243811.js"></script>';
   }
   // Japanese
   else if (str_contains($langDetect, "ja")) {
       echo '<script type="text/javascript" src="https://fast.fonts.net/jsapi/60853530-ad3d-41ff-bd9f-a52610a933b3.js"></script>';
   }
   ```

4. **Performance Optimizations**
   - Font preloading for critical assets
   - WOFF2 format prioritization
   - Fallback font definitions
   - Lazy loading for non-critical fonts
   - Font display swap implementation
   - Asynchronous Monotype CDN loading

5. **Font Face Definitions**
   ```css
   @font-face {
       font-family: "Avenir Light";
       font-style: normal;
       font-stretch: normal;
       font-display: swap;
       src: url('/fonts/Avenir/Avenir35Light_normal_normal.woff2') format('woff2'),
            url('/fonts/Avenir/Avenir35Light_normal_normal.woff') format('woff');
   }
   ```

6. **Font Loading Strategy**
   - Critical fonts loaded in header via Monotype CDN
   - Non-critical fonts deferred
   - Language-specific bundles through dedicated APIs
   - Fallback system fonts
   - Progressive font loading
   - Optimized CDN delivery

Key Features:
- Multilingual font support through Monotype CDN
- Performance-optimized loading
- Comprehensive font families
- Modern format prioritization
- Efficient font subsetting
- Strategic loading patterns
- CDN-based delivery for global performance

## SASS Architecture

The theme uses a well-organized SASS structure following the 7-1 pattern (7 folders, 1 main file). The architecture is designed for scalability and maintainability.

### Directory Structure

```
sass/
├── abstracts/       # Variables, mixins, functions
├── base/           # Base styles, typography, utilities
├── components/     # Reusable components
├── generic/        # Reset and normalize styles
├── layouts/        # Layout-specific styles
├── pages/         # Page-specific styles
├── plugins/       # Third-party plugin styles
└── style.scss     # Main SASS file
```

### Main Imports

The `style.scss` file organizes imports in a logical order:

1. **Abstracts**: Variables and mixins
2. **Generic**: Normalize and box-sizing
3. **Base**: Typography and base elements
4. **Layouts**: Content and sidebar arrangements
5. **Pages**: Page-specific styles
6. **Components**: Reusable UI components
7. **Plugins**: Third-party integrations
8. **Utilities**: Accessibility and alignments

This structure ensures:
- Clear separation of concerns
- Easy maintenance and updates
- Scalable architecture
- Optimized compilation
- Consistent coding patterns

### Legacy Code Review

The theme contains several legacy code structures that need to be reviewed and integrated into the modern workflow:

1. **Legacy CSS Structure**
   ```
   themes/applovin/
   ├── dist/css/
   │   ├── legacy-style.css     # Legacy stylesheet (needs refactoring)
   │   └── legacy-style.min.css # Minified legacy styles (needs refactoring)
   ├── css/                     # Language Support (Required for Polylang)
   │   ├── var-cn.css          # Chinese-specific variables (keep)
   │   ├── var-ko.css          # Korean-specific variables (keep)
   │   └── var-ja.css          # Japanese-specific variables (keep)
   ```
   **Migration Notes**:
   - **Keep for Polylang Support**:
     - Language-specific variable files (`var-*.css`)
     - These files are required for multilingual functionality
     - Consider moving to a dedicated `/languages/styles/` directory

   - **Refactoring Required**:
     - Legacy styles in `dist/css/legacy-style.css` need migration to Tailwind
     - All other CSS files in the root `/css/` directory need review
     - Move component styles to appropriate SASS modules
     - Implement modern CSS architecture
     - Remove deprecated or unused styles

   - **Modernization Goals**:
     - Keep language-specific customizations separate
     - Integrate remaining styles with Tailwind utilities
     - Improve maintainability through SASS architecture
     - Ensure clean separation between language and component styles

2. **Template Parts (Root Level)**
   ```
   themes/applovin/
   ├── content.php         # Default content template
   ├── content-none.php    # No results template
   ├── content-page.php    # Page template
   ├── content-search.php  # Search results template
   └── content-single.php  # Single post template
   ```
   **Migration Notes**:
   - Move to organized template hierarchy in `/template-parts/`
   - Implement modern component structure
   - Review for outdated markup patterns
   - Integrate with Tailwind classes
   - Consider breaking into smaller, reusable components

3. **Required Actions**
   - [ ] Audit legacy CSS for unused styles
   - [ ] Map legacy variables to Tailwind theme
   - [ ] Refactor template parts into components
   - [ ] Update template loading logic
   - [ ] Document deprecated patterns
   - [ ] Create migration timeline
   - [ ] Test impact on existing pages

4. **Migration Strategy**
   - Phase 1: Audit and Documentation
   - Phase 2: Component Modernization
   - Phase 3: Style Integration
   - Phase 4: Testing and Validation
   - Phase 5: Legacy Code Removal

This legacy code should be systematically reviewed and updated to:
- Follow modern WordPress best practices
- Utilize Tailwind CSS framework
- Implement component-based architecture
- Improve performance and maintainability
- Ensure consistent coding patterns
- Reduce technical debt

## Version Control

### Git Ignore Configuration

The project uses a comprehensive `.gitignore` configuration to manage which files are tracked in version control. The configuration is organized into several key sections:

1. **Development Environment**
   - VSCode settings and workspaces
   - Local history
   - Mac/OSX system files
   - Node modules and vendor dependencies

2. **Sensitive Information**
   - Credential files
   - API secrets
   - Password files
   - WordPress configuration (`wp-config.php`)

3. **WordPress Core**
   - Core WordPress files
   - Default themes and plugins
   - System files and logs
   - Upload directory

4. **Build and Distribution**
   - Minified CSS files (`style.min.css`, `legacy-style.min.css`)
   - Distribution directory with exceptions:
     ```
     themes/applovin/dist/*
     !themes/applovin/dist/css/style.css
     !themes/applovin/dist/css/legacy-style.css
     !themes/applovin/dist/css/slick.min.css
     !themes/applovin/dist/js/*.js
     ```

5. **Cache and Temporary Files**
   - Cache directories
   - Backup files
   - Log files
   - Lighthouse reports
   - Object cache files

6. **Theme Assets**
   - `/themes/applovin/assets`
   - Image utilities
   - Generated reports

This configuration ensures:
- Sensitive data remains local
- Build artifacts are properly managed
- Core WordPress files are excluded
- Development tools remain untracked
- Necessary distribution files are included

### Commit Best Practices

The project follows a structured commit message convention to maintain clarity and traceability in version control:

1. **Commit Types**

   - **`feat`**: New Features
     ```
     feat: add user profile update functionality
     feat: enable search filtering by tags
     ```
     *Purpose*: Introduces new functionality for users

   - **`fix`**: Bug Fixes
     ```
     fix: resolve login issue on mobile devices
     fix: correct broken navigation links
     ```
     *Purpose*: Addresses bugs in the codebase

   - **`add`**: New Components
     ```
     add: new modal component for settings
     add: include analytics tracking setup
     ```
     *Purpose*: Adds new files or components

   - **`update`**: Enhancements
     ```
     update: improve validation for login form
     update: refresh homepage content and styling
     ```
     *Purpose*: Enhances existing features

   - **`docs`**: Documentation
     ```
     docs: update README with setup instructions
     docs: add API usage examples
     ```
     *Purpose*: Documentation changes

   - **`style`**: Code Style
     ```
     style: fix spacing in component styles
     style: standardize formatting in utils.js
     ```
     *Purpose*: Code formatting changes

   - **`refactor`**: Code Refactoring
     ```
     refactor: rename variables for better readability
     refactor: simplify data mapping logic
     ```