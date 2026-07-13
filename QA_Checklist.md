# Responsive QA Checklist

## Navigation and Structure
- [ ] Every navigation link works.
- [ ] The header, navigation, and footer load on all four pages.
- [ ] No page contains unfinished placeholder text.

## PHP
- [ ] The destination PHP array loads correctly.
- [ ] All six destination cards render using `foreach`.
- [ ] The form blocks empty submissions.
- [ ] Successful submissions display sanitized output.
- [ ] No PHP warnings or notices appear.

## Responsive Design
- [ ] Mobile layout displays one card per row.
- [ ] Tablet layout displays two cards per row.
- [ ] Desktop layout displays three cards per row.
- [ ] The navigation remains usable at every width.
- [ ] The comparison table remains readable.
- [ ] Images or placeholders maintain their proportions.

## CSS-Only Interaction
- [ ] Home winning ticket opens with checkbox/label (no JavaScript).
- [ ] Confetti animation plays with CSS only after claiming the ticket.
- [ ] Room hotspots open artifact details via PHP `$_GET` (no JavaScript).
- [ ] Artifact info accordion (`<details>` / `<summary>`) opens by mouse and keyboard.
- [ ] No JavaScript files or script tags are present.

## Accessibility
- [ ] Keyboard focus is visible.
- [ ] Heading order is logical.
- [ ] Images have meaningful alternative text.
- [ ] Form fields have visible labels.
- [ ] Text contrast is readable.

## Tested Viewports
- [ ] Mobile
- [ ] Tablet
- [ ] Desktop
