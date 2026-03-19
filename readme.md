# Roślinopedia Theme

A custom WordPress theme for Roślinopedia — a garden plant knowledge base designed for amateur gardeners and people planning plantings.

## About the Project

Roślinopedia is a web platform for browsing, filtering, and searching information about garden plants. The project uses WordPress as the content management layer, with application logic and user interface implemented in this custom theme.

## Key Features

- **Custom Post Type "roslina"** — dedicated content type for storing plant information
- **Taxonomies & filtering** — plant type, exposure, soil type, plus ACF fields (blooming period, height, watering, frost resistance)
- **Custom REST API + search** — REST endpoints and JavaScript search without page reload
- **Private user notes** — logged-in users can add private notes to plants
- **Responsive design** — layout adapted for mobile, tablet, and desktop

## Requirements

- WordPress 5.0+
- PHP 7.4+
- [Advanced Custom Fields (ACF)](https://www.advancedcustomfields.com/) plugin — for custom plant fields
- [Dark Mode](https://github.com/Ilona8895/dark-mode-plugin) plugin (optional) — dark mode tailored to the theme

## Installation

1. Clone the repository to `wp-content/themes/roslinopedia-theme`:
   git clone https://github.com/Ilona8895/projekt-roslinopedia.git wp-content/themes/roslinopedia-theme

2. Install

   cd wp-content/themes/roslinopedia-theme
   npm install
   npm run build

3. npm install
   npm run start # development mode with hot reload
   npm run build # production build

## Tech stack

- PHP — theme logic, REST API, queries
- JavaScript — search, notes, interactions
- SCSS — styling
- WordPress — CMS
- REST API — custom search endpoints
- ACF — custom fields

## Related Repositories

[Dark Mode Plugin](https://github.com/Ilona8895/dark-mode-plugin) — dark mode plugin with customizable colors and position

## Author

Ilona Melcher — [Github](https://github.com/Ilona8895/)
