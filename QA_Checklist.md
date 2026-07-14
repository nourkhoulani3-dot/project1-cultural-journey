# Responsive QA Checklist

Evidence folder: `images/testedviewports/`  
Host tested: `codd.cs.gsu.edu/~tvu53/wp/pw/`  
Reviewed against current PHP/CSS source on July 13, 2026.

## Navigation and Structure
- [x] Every navigation link works.
  - Confirmed in screenshots: Home, Syria Room, Việt Nam Room, Postcard & Journal, My Passport (`tablettest1–5.png`, `mobiletest1–5.JPG`).
- [x] The header, navigation, and footer load on all main pages.
  - Shared via `includes/header.php`, `includes/nav.php`, `includes/footer.php`.
  - Visible across Home, rooms, postcard, and passport screenshots.
- [x] No page contains unfinished placeholder page copy.
  - Content is filled on itinerary, rooms, comparison table, postcard, and passport.
  - Intentional empty states remain only where expected (empty stamp `?`, postcard “pick a stop” preview).

## PHP
- [x] The destination PHP array loads correctly (`data/destinations.php`).
- [x] All six itinerary stops render using `foreach` (`index.php` timeline).
  - Mobile itinerary Day 1 shown in `mobiletest2.JPG`; passport shows 6 of 6 stamps in `tablettest5.png`.
- [x] The postcard form blocks empty submissions.
  - Server-side checks in `postcard.php` for name, stop, and message; HTML `required` on fields.
- [x] Successful submissions display sanitized output.
  - `htmlspecialchars()` / `nl2br(htmlspecialchars())` on postcard result and Passport Notes.
- [x] No JavaScript-dependent behavior; PHP session powers stamps and journal memory.
  - `includes/session.php` for stamps + journal entries.

## Responsive Design
- [x] Mobile layout stacks the journey timeline in a single column.
  - `mobiletest2.JPG`; CSS `@media (max-width: 800px)` for `.journey-timeline`.
- [x] Artifact grids shift from 3 → 2 → 1 columns across breakpoints.
  - CSS: `.artifact-tile-grid` at 900px (2 cols) and 600px (1 col); city archive open on mobile in `mobiletest5.JPG`.
- [x] Navigation remains usable at every width.
  - Mobile stacked nav (`mobiletest1.JPG`); desktop horizontal nav (`tablettest1.png`).
- [x] The comparison table remains readable.
  - Present on mobile in `mobiletest3.JPG` inside `.table-wrapper` (`overflow-x: auto`).
  - Note: narrow phones may need sideways scroll to see the Việt Nam column fully.
- [x] Images maintain proportions (`object-fit` / responsive widths).
  - Room backgrounds, hotspots, timeline cards, postcard faces, stamps verified in screenshots.
- [x] Room hotspots remain usable on mobile and larger screens.
  - Việt Nam: `mobiletest4.JPG`, `tablettest4.png`
  - Syria: `tablettest3.png`

## CSS-Only Interaction
- [x] Home winning ticket opens with checkbox/label (no JavaScript).
  - `#claim-ticket` + `.ticket-overlay` in `index.php` / `includes/header.php`.
- [x] Confetti animation plays with CSS only after claiming the ticket.
- [x] Room hotspots open city archives via hash `:target` / query links (no JavaScript).
  - City archive shown after hotspot use in `mobiletest5.JPG`.
- [x] Artifact accordion (`<details>` / `<summary>`) is available for card details.
- [x] Postcard city preview updates when a stop is selected (CSS `:has()`).
  - Đà Nẵng selected with matching photo in `tablettest2.png`.
- [x] No JavaScript files or `<script>` tags are present in the project pages.

## Accessibility
- [x] Keyboard focus is visible on key controls.
  - `:focus-visible` styles for hotspots, ticket, summary, radios; skip link present.
- [x] Heading order is logical (`h1` → `h2` → `h3` pattern on pages).
- [x] Primary images have meaningful alternative text.
  - Timeline, room backgrounds, postcard result, journal photos.
  - Decorative hotspot inset images intentionally use empty `alt` with parent `aria-label`.
- [x] Form fields have visible labels / legends.
  - Name, favorite stop fieldset, journal message in `postcard.php`.
- [x] Text contrast is readable on the designed light theme.
  - Desktop light UI confirmed in `tablettest1–5.png`.
  - Mobile screenshots appear dark (device/browser dark preference); design tokens target cream/maroon light theme.

## Tested Viewports
- [x] Mobile — `images/testedviewports/mobiletest1.JPG` through `mobiletest5.JPG`
  - Cover: home hero, itinerary, comparison table, Việt Nam room hotspots, city artifact section.
- [x] Tablet / Desktop width — `images/testedviewports/tablettest1.png` through `tablettest5.png`
  - Cover: home hero, postcard composer, Syria Room, Việt Nam Room, My Passport (6 stamps + Passport Notes).

## Screenshot Index
| File | What it shows |
|------|----------------|
| `mobiletest1.JPG` | Mobile home hero + stacked nav |
| `mobiletest2.JPG` | Mobile itinerary (Day 1) |
| `mobiletest3.JPG` | Mobile comparison table |
| `mobiletest4.JPG` | Mobile Việt Nam Room hotspots |
| `mobiletest5.JPG` | Mobile city artifact archive (Đà Nẵng) |
| `tablettest1.png` | Desktop/tablet home hero |
| `tablettest2.png` | Postcard & Journal (Đà Nẵng selected) |
| `tablettest3.png` | Syria Room (3 hotspots, 3/3 stamps) |
| `tablettest4.png` | Việt Nam Room (hotspots, 3/3 stamps) |
| `tablettest5.png` | My Passport (6/6 stamps + saved memory) |

## Remaining Watch Items
- On very narrow phones, swipe/scroll the comparison table horizontally to read all three columns.
- Re-check the live Codd deploy after the latest label/copy updates (“Side by side”, Foods/Heritage) so production matches local files.
