<?php
/**
 * Click-to-open Syria day profile (CSS-only <details>).
 * Expects $artifact from data/syria_artifacts.php
 * Optional: $startOpen (bool)
 */
if (!isset($artifact) || !is_array($artifact)) {
    return;
}

$tileId = "artifact-" . ($artifact["id"] ?? uniqid("syria"));
$tileTitle = $artifact["title"] ?? "Artifact";
$tileCity = $artifact["city"] ?? "Syria";
$tileImage = trim($artifact["image"] ?? "");
$tileOpen = !empty($startOpen);
$didYouKnow = $artifact["did_you_know"] ?? [];
$highlights = $artifact["cultural_highlights"] ?? [];
?>
<details id="<?= htmlspecialchars($tileId) ?>" class="artifact-tile syria-profile-tile"<?= $tileOpen ? " open" : "" ?>>
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
            <span class="country-label">Day <?= (int)($artifact["day"] ?? 0) ?> · Syria</span>
            <span class="artifact-tile-title"><?= htmlspecialchars($tileTitle) ?></span>
            <span class="artifact-tile-hint">Click to open</span>
        </span>
    </summary>

    <div class="artifact-tile-body">
        <section class="artifact-section">
            <h3>About this place</h3>
            <p><?= htmlspecialchars($artifact["description"] ?? "") ?></p>
        </section>

        <?php if (!empty($didYouKnow)): ?>
            <section class="artifact-section">
                <h3>Did you know?</h3>
                <ul class="artifact-bullet-list">
                    <?php foreach ($didYouKnow as $fact): ?>
                        <li><?= htmlspecialchars($fact) ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <?php if (!empty($artifact["why_it_matters"])): ?>
            <section class="artifact-section">
                <h3>Why it matters</h3>
                <p><?= htmlspecialchars($artifact["why_it_matters"]) ?></p>
            </section>
        <?php endif; ?>

        <?php if (!empty($highlights)): ?>
            <section class="artifact-section">
                <h3>Cultural highlights</h3>
                <div class="highlight-grid">
                    <?php foreach ($highlights as $label => $items): ?>
                        <div class="highlight-block">
                            <h4><?= htmlspecialchars($label) ?></h4>
                            <ul class="artifact-bullet-list">
                                <?php foreach ($items as $item): ?>
                                    <li><?= htmlspecialchars($item) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (!empty($artifact["historical_significance"])): ?>
            <section class="artifact-section">
                <h3>Historical significance</h3>
                <p><?= htmlspecialchars($artifact["historical_significance"]) ?></p>
            </section>
        <?php endif; ?>

        <?php if (!empty($artifact["travel_tip"])): ?>
            <section class="artifact-section">
                <h3>Travel tip</h3>
                <p><?= htmlspecialchars($artifact["travel_tip"]) ?></p>
            </section>
        <?php endif; ?>
    </div>
</details>
