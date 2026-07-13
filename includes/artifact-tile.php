<?php
/**
 * Click-to-open artifact tile (CSS-only <details>).
 * Expects $artifact array with title, city, description, did_you_know, why_it_matters, image.
 * Optional: $startOpen (bool)
 */
if (!isset($artifact) || !is_array($artifact)) {
    return;
}

$tileId = "artifact-" . ($artifact["id"] ?? uniqid("item"));
$tileTitle = $artifact["title"] ?? "Artifact";
$tileCity = $artifact["city"] ?? "";
$tileImage = $artifact["image"] ?? "";
$tileOpen = !empty($startOpen);
?>
<details id="<?= htmlspecialchars($tileId) ?>" class="artifact-tile"<?= $tileOpen ? " open" : "" ?>>
    <summary class="artifact-tile-summary">
        <?php if ($tileImage !== ""): ?>
            <img
                class="artifact-tile-image"
                src="<?= htmlspecialchars($tileImage) ?>"
                alt="<?= htmlspecialchars($tileTitle) ?>"
                width="480"
                height="360"
            >
        <?php else: ?>
            <div class="artifact-tile-image artifact-image-placeholder" role="img" aria-label="Image coming soon for <?= htmlspecialchars($tileTitle) ?>">
                <span>Photo coming soon</span>
            </div>
        <?php endif; ?>
        <span class="artifact-tile-meta">
            <?php if ($tileCity !== ""): ?>
                <span class="country-label"><?= htmlspecialchars($tileCity) ?></span>
            <?php endif; ?>
            <span class="artifact-tile-title"><?= htmlspecialchars($tileTitle) ?></span>
            <span class="artifact-tile-hint">Click to open</span>
        </span>
    </summary>

    <div class="artifact-tile-body">
        <section class="artifact-section">
            <h3>About this place</h3>
            <p><?= htmlspecialchars($artifact["description"] ?? "") ?></p>
        </section>

        <?php if (!empty($artifact["did_you_know"])): ?>
            <section class="artifact-section">
                <h3>Did you know?</h3>
                <?php if (is_array($artifact["did_you_know"])): ?>
                    <ul class="artifact-bullet-list">
                        <?php foreach ($artifact["did_you_know"] as $fact): ?>
                            <li><?= htmlspecialchars($fact) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p><?= htmlspecialchars($artifact["did_you_know"]) ?></p>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <?php if (!empty($artifact["why_it_matters"])): ?>
            <section class="artifact-section">
                <h3>Why it matters</h3>
                <p><?= htmlspecialchars($artifact["why_it_matters"]) ?></p>
            </section>
        <?php endif; ?>
    </div>
</details>
