# A Cultural Journey Through Syria and Việt Nam

CSC 4370/6370 · Project 1 Summer 2026 · PHP + HTML + CSS

## Team
- Nour Khoulani
- Hayley

## Topic, Audience, and Goal
**Topic:** A six-day cultural journey across three Syrian cities (Damascus, Aleppo, Palmyra) and three Vietnamese cities (Đà Nẵng, Hội An, Huế).

**Audience:** Students and travelers who want a clear, scannable introduction to heritage, food, and landmarks from both cultures.

**Goal:** Ship a polished, responsive, PHP-powered multi-page site with one strong core experience, two secondary features, and no JavaScript. Visitors move from a winning-ticket entrance into rooms, collect passport stamps, compare cultures, and send a postcard home.

## Scope Alignment (Project Requirements)

### Core Build: PHP-Powered Responsive Site
- **5 linked pages** with consistent navigation:
  - `index.php` — ticket entrance + itinerary + comparison guide
  - `syria-room.php` — interactive Syria cultural room
  - `vietnam-room.php` — interactive Việt Nam cultural room
  - `postcard.php` — validated postcard & journal form
  - `passport.php` — stamp collection + saved journal memory
- Shared **`include()`** components: `includes/header.php`, `includes/nav.php`, `includes/footer.php`
- Destination content stored in a **PHP array** (`data/destinations.php`) and rendered with **`foreach`**
- Artifact archives also driven by PHP arrays (`data/syria_artifacts.php`, `data/cultural_artifacts.php`)
- One **`$_POST`** form with server-side validation and **`htmlspecialchars()`** sanitization (`postcard.php`)
- Intentional layouts for **mobile, tablet, and desktop**

### Secondary Feature A: Information Design
A scannable cultural comparison system that helps visitors understand the journey quickly:
- Six-day **itinerary timeline** on the home page
- Color-coded **Syria vs. Việt Nam comparison table** (languages, foods, heritage, journey focus)
- **My Passport** stamp overview that mirrors progress through the rooms

### Secondary Feature B: CSS-Only Interaction
All interaction is HTML + CSS (+ PHP server-side). No JavaScript files or `<script>` tags.
- Winning-ticket gate using a checkbox/`label` pattern
- CSS confetti celebration after the ticket is claimed
- Room hotspot exploration with CSS `:target` city reveals
- Artifact cards using native `<details>` / `<summary>` accordions
- Postcard stop picker with live city-photo preview via CSS `:has()`

### Advanced Technique: Responsive Design
- CSS **Grid** and **Flexbox** used deliberately for timeline, rooms, grids, postcard layout, and passport stamps
- Multiple breakpoints with real layout changes (approx. **900px**, **800px**, **700px**, **600px**)
- Design tokens via **CSS custom properties** (`:root`) for color, spacing, and theming
- Fluid spacing and relative units where appropriate
- Responsive QA evidence: `QA_Checklist.md` and screenshots in `images/testedviewports/`

## How the Site Works
1. Visitor opens the site and claims the winning ticket (CSS-only).
2. Home itinerary introduces Days 1–6 and links into each cultural room.
3. Syria and Việt Nam rooms use numbered hotspots to reveal city artifact archives.
4. Exploring a city marks a passport stamp (`$_SESSION`).
5. Postcard & Journal validates input, sanitizes output, attaches that city’s photo, and saves the note to passport memory.
6. My Passport shows collected stamps and all saved journal notes.

## File Structure
```text
project1-cultural-journey/
├── index.php
├── syria-room.php
├── vietnam-room.php
├── postcard.php
├── passport.php
├── css/
│   └── style.css
├── data/
│   ├── destinations.php
│   ├── syria_artifacts.php
│   └── cultural_artifacts.php
├── includes/
│   ├── header.php
│   ├── nav.php
│   ├── footer.php
│   ├── session.php
│   └── artifact-tile.php
├── images/
│   ├── testedviewports/      # mobile + tablet/desktop QA screenshots
│   └── IMAGE_MAP.md          # image filename reference
├── QA_Checklist.md
└── README.md
```

## Setup
1. Place the full project folder on a PHP-enabled server (for example, Codd).
2. Open `index.php` in a browser.
3. Confirm PHP sessions are enabled (required for passport stamps and journal memory).

Local option (if PHP is installed):
```bash
php -S localhost:8000
```
Then visit `http://localhost:8000/index.php`.

## Responsive Strategy
| Width | Layout intent |
|------|----------------|
| Desktop (wide) | Horizontal nav; two-column postcard; multi-column artifact grids; alternating timeline |
| Tablet (~900px and below) | Header stacks as needed; artifact grid moves toward 2 columns |
| Mobile (~800–600px and below) | Stacked nav; single-column timeline; 1-column artifact cards; stacked postcard |

Key selectors to review in `css/style.css`:
- `.journey-timeline` and related `@media (max-width: 800px)`
- `.artifact-tile-grid` at `900px` / `600px`
- `.aesthetic-postcard` at `800px`
- Design tokens in `:root`

## Accessibility Notes
- Skip link to main content
- Semantic landmarks (`header`, `nav`, `main`, `footer`, `section`, `article`)
- Visible labels / legends on the postcard form
- `:focus-visible` styles on interactive controls
- Meaningful `alt` text on content images; decorative hotspot insets use empty `alt` with parent `aria-label`
- `prefers-reduced-motion` support for ticket celebration

## QA Evidence
- Checklist: `QA_Checklist.md`
- Viewport screenshots: `images/testedviewports/`
  - Mobile: `mobiletest1.JPG`–`mobiletest5.JPG`
  - Tablet/desktop: `tablettest1.png`–`tablettest5.png`

## Team Contribution
The team defined the concept, researched destinations, wrote and revised content, designed the page flow, implemented and edited PHP/HTML/CSS, tested layouts on real devices and Codd, and is responsible for presenting and defending the final project.

## AI Usage Disclosure
We collaborated with **Claude** during development.

- The team provided the project ideas, cultural content decisions, feature priorities, coding direction, testing, and final review.
- Claude was used to help draft, organize, and refine code and documentation so we could move faster and polish UX details.
- For **required assignment criteria**, we still built and verified the core PHP/HTML/CSS ourselves (pages, includes, arrays/`foreach`, validated form, secondary features, and responsive layout).
- For **enhancements beyond the minimum requirements** (for example, stronger postcard aesthetics, city-specific postcard previews, session-based passport memory, and polish passes), we collaborated with Claude to explore and implement stronger feature options, then reviewed, edited, and tested the results as a team.

The team understands the final codebase and is accountable for all submitted work.
