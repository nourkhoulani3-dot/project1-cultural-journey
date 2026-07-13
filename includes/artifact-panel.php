<?php
/**
 * CSS-only accordion for one cultural artifact / destination panel.
 * Expects $panelContent with title, city, description, did_you_know, why_it_matters.
 * Optional: $panelImage, $panelImageAlt, $closeHref, $panelId, $startOpen
 */
if (!isset($panelContent) || !is_array($panelContent)) {
    return;
}

$panelTitle = $panelContent["title"] ?? "Artifact";
$panelCity = $panelContent["city"] ?? "";
$panelDescription = $panelContent["description"] ?? "";
$panelDidYouKnow = $panelContent["did_you_know"] ?? "";
$panelWhy = $panelContent["why_it_matters"] ?? "";
$closeHref = $closeHref ?? "";
$panelId = $panelId ?? "";
$startOpen = !empty($startOpen);
?>
<article <?= $panelId !== "" ? 'id="' . htmlspecialchars($panelId) . '"' : "" ?> class="artifact-popup<?= $startOpen ? " is-featured" : "" ?>">
    <?php if (!empty($panelImage)): ?>
        <img
            class="detail-image destination-photo"
            src="<?= htmlspecialchars($panelImage) ?>"
            alt="<?= htmlspecialchars($panelImageAlt ?? $panelTitle) ?>"
            width="640"
            height="420"
        >
    <?php endif; ?>

    <div class="artifact-popup-content">
        <?php if ($panelCity !== ""): ?>
            <p class="country-label"><?= htmlspecialchars($panelCity) ?></p>
        <?php endif; ?>
        <h2><?= htmlspecialchars($panelTitle) ?></h2>

        <div class="info-accordion" aria-label="Artifact information">
            <details class="info-panel"<?= $startOpen ? " open" : "" ?>>
                <summary>About this place</summary>
                <div class="info-panel-body">
                    <p><?= htmlspecialchars($panelDescription) ?></p>
                </div>
            </details>

            <?php if ($panelDidYouKnow !== ""): ?>
                <details class="info-panel">
                    <summary>Did you know?</summary>
                    <div class="info-panel-body">
                        <p><?= htmlspecialchars($panelDidYouKnow) ?></p>
                    </div>
                </details>
            <?php endif; ?>

            <?php if ($panelWhy !== ""): ?>
                <details class="info-panel">
                    <summary>Why it matters</summary>
                    <div class="info-panel-body">
                        <p><?= htmlspecialchars($panelWhy) ?></p>
                    </div>
                </details>
            <?php endif; ?>
        </div>

        <?php if ($closeHref !== ""): ?>
            <a class="text-link" href="<?= htmlspecialchars($closeHref) ?>">Close and keep exploring</a>
        <?php endif; ?>
    </div>
</article>
