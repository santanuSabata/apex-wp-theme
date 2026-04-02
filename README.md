# Apex WP Theme

A lightweight custom WordPress theme built for the Apex Financial Consulting
landing page. Handles global layout, enqueues all CSS and JavaScript, and
registers the navigation menu locations used across the site.

---

## Requirements

- WordPress 6.0 or higher
- PHP 8.0 or higher
- [Apex Elementor Widgets](https://github.com/yourname/apex-elementor-widgets)
  plugin (recommended)
- Elementor Free 3.0 or higher (recommended)

---

## What's Included

| File | Purpose |
|---|---|
| `style.css` | Theme declaration |
| `functions.php` | Asset enqueue, menu registration, Customizer settings |
| `header.php` | Global `<head>`, opening `<body>`, navbar markup |
| `footer.php` | Footer markup, `wp_footer()` hook |
| `front-page.php` | Landing page template |
| `index.php` | Fallback template |
| `assets/css/style.css` | All site styles (ported from original `Style.css`) |
| `assets/js/script.js` | All site scripts (ported from original `Script.js`) |

---

## Installation

1. Download or clone this repository into your WordPress themes directory:
```bash
   cd wp-content/themes/
   git clone https://github.com/yourname/apex-wp-theme.git
```

2. Log in to your WordPress admin panel.
3. Go to **Appearance → Themes** and activate **Apex WP Theme**.

---

## Customizer Settings

All editable options are found under **Appearance → Customize**:

| Section | Options |
|---|---|
| **Navbar Settings** | Logo text, accent character, CTA button text and URL |
| **Footer Settings** | Tagline, copyright text, email, phone, address, social URLs |

---

## Menu Locations

Register and assign menus under **Appearance → Menus**:

| Location | Used In |
|---|---|
| `Primary Navigation` | Navbar links |
| `Footer - Services` | Footer services column |
| `Footer - Company` | Footer company column |

---

## Working with the Plugin

This theme is designed to pair with the
[Apex Elementor Widgets](https://github.com/yourname/apex-elementor-widgets)
plugin. The theme provides global styles and layout; the plugin provides
Elementor widgets for each page section.

---

## Folder Structure
```
apex-wp-theme/
├── style.css
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── index.php
└── assets/
    ├── css/
    │   └── style.css
    └── js/
        └── script.js
```

---
---

## Author

**Santanu Sabata**
- Website: [https://santanusabata.netlify.app](https://santanusabata.netlify.app)
- Email: [santanuwp@gmail.com](mailto:santanuwp@gmail.com)

Feel free to reach out for questions, custom WordPress development,
or Elementor widget work.

---

## License

[GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html) — in line with
WordPress licensing requirements.
