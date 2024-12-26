# NextGen Hosting - Modern Cloud Hosting Landing Page

A modern, responsive landing page for a cloud hosting company featuring a dark mode design and multilingual support.

## Features

### Design & UI
- Modern dark mode design
- 3D menu with hover effects
- Responsive layout for all devices
- Animated feature cards
- Interactive pricing tables
- Glassmorphism effects
- Parallax scrolling

### Technical Features
- Multilingual support (DE/EN)
- Cookie-based language preferences
- Automatic browser language detection
- Modular language configuration
- Performance-optimized animations
- Validated contact form

## Technologies
- PHP 7.4+
- Vanilla JavaScript (ES6+)
- CSS3 with modern features
- No external dependencies

## Project Structure
```
Landing-Page/
├── config/
│   ├── lang/
│   │   ├── de.php
│   │   └── en.php
│   ├── Language.php
│   └── init.php
├── index.php
├── styles.css
└── script.js
```

## Installation

1. Clone the repository:
```bash
git clone https://github.com/NexusCodeHub/Hosting-Landing-Page.git
```

2. Ensure PHP 7.4 or higher is installed

3. Configure your web server (Apache/Nginx) with the project directory as root

4. Open the page in your browser

## Customization

### Adding a New Language
1. Create a new language file in `config/lang/` (e.g., `fr.php`)
2. Copy the structure from `de.php` or `en.php`
3. Translate all texts
4. Add the language code to the `$availableLangs` array in `Language.php`

### Customizing Design
- Color scheme: Modify CSS variables in `styles.css`
- Layout: Modify grid structures in the respective CSS sections
- Animations: Adjust JavaScript animations in `script.js`

## Browser Support
- Chrome (latest version)
- Firefox (latest version)
- Safari (latest version)
- Edge (latest version)
- Mobile browsers (iOS/Android)

## Performance
- Lighthouse Score: 90+
- Optimized animations
- Minimal JavaScript dependencies
- Efficient CSS layout

## Security
- XSS protection through PHP escaping
- CSRF protection in contact form
- Secure cookie handling
- No sensitive data in frontend

## License
MIT License - See LICENSE.md for details

## Author
Nexus-CodeHub

## Support
For questions or issues, please create an issue in the repository or contact us at [support@nexus-codehub.dev].
