# A Cultural Journey Through Syria and Vietnam

## Team
- Nour Khoulani
- Hayley

## Project Description
This project is a PHP-powered cultural heritage experience presented as a six-day journey.
Visitors open a winning ticket splash (CSS-only), then explore destinations in Syria and Vietnam
through interactive rooms, a collectible passport, and a postcard journal form.

## Required Features
- Four+ linked PHP pages
- Shared header, navigation, and footer using `include()`
- Destination data stored in a PHP array
- Dynamic content rendered with `foreach`
- Validated `$_POST` form with `htmlspecialchars()` sanitization
- Cultural comparison guide (Feature A : information design)
- CSS-only ticket reveal + room hotspots / accordion-style popup flow (Feature B)
- Responsive mobile, tablet, and desktop layouts
- **No JavaScript** : all interaction is HTML/CSS (+ PHP server-side)

## File Structure
- `index.php` : winning ticket splash + homepage itinerary
- `syria-room.php` / `vietnam-room.php` : interactive cultural rooms
- `passport.php` : stamp collection + comparison guide
- `postcard.php` : validated postcard form
- `includes/` : header, footer, nav, session helpers
- `data/destinations.php` : destination array
- `css/style.css`
- `images/` : see `images/PLACEHOLDERS.md` for required image filenames

## Setup
Upload the complete project folder to a PHP-enabled server and open `index.php`.

## AI Usage Disclosure
AI tools were used to support planning, organization, drafting, and code development.
The team reviewed, edited, tested, and is responsible for understanding and presenting the final work.
