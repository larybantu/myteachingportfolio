# Tr. Lary Mathematics Teaching Portfolio

A modern, responsive, and interactive portfolio website for mathematics educators.

## Folder Structure

```
math-portfolio/
├── index.html          # Main HTML file
├── css/
│   └── style.css       # All styles and responsive design
├── js/
│   └── main.js         # All interactive functionality
└── images/             # Place for your images (currently empty)
```

## Features

- **Responsive Design**: Works perfectly on desktop, tablet, and mobile
- **Smooth Animations**: Scroll-triggered fade-ins, counter animations, parallax effects
- **Interactive Testimonials**: Auto-rotating slider with dot navigation
- **Mobile Navigation**: Hamburger menu for smaller screens
- **Contact Form**: Functional form with validation and notifications
- **Back to Top Button**: Appears when scrolling down
- **Dynamic Math Symbols**: Floating mathematical symbols in hero section
- **Typing Effect**: Animated subtitle in hero section
- **Timeline Animation**: Curriculum experience with slide-in effects

## How to Use

1. Open `index.html` in any modern web browser
2. Customize the content in `index.html` with your personal information
3. Add your photo to the `images/` folder and update the image path
4. Modify colors in `css/style.css` by changing the CSS variables in `:root`

## Customization

### Changing Colors
Edit the CSS variables at the top of `css/style.css`:
```css
:root {
    --primary: #1a5276;      /* Main blue color */
    --secondary: #e67e22;    /* Accent orange color */
    --accent: #27ae60;       /* Green accent */
    ...
}
```

### Adding Your Photo
Replace the emoji placeholder in the About section with:
```html
<img src="images/your-photo.jpg" alt="Your Name">
```

### Updating Content
Simply edit the text in `index.html`. All sections are clearly marked with comments.

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Credits
**Dev Genius LaryB**: 
Created with modern web standards and best practices for accessibility and performance.
