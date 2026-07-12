<?php
$pageTitle = "Syria | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";

$syriaDestinations = array_filter($destinations, function($destination) {
    return $destination["country"] === "Syria";
});
?>
<main id="main-content" class="section">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Days 1–3</p>
            <h1>Explore Syria</h1>
            <p>Discover three destinations through history, food, landmarks, traditions, and travel tips.</p>
        </div>

        <div class="destination-list">
            <?php foreach ($syriaDestinations as $destination): ?>
                <article id="<?= htmlspecialchars($destination["id"]) ?>" class="destination-detail">
                    <div class="placeholder-image detail-image" role="img"
                         aria-label="Image placeholder for <?= htmlspecialchars($destination["name"]) ?>">
                        <span>Day <?= (int)$destination["day"] ?></span>
                    </div>
                    <div class="detail-content">
                        <h2><?= htmlspecialchars($destination["name"]) ?></h2>
                        <details open>
                            <summary>History</summary>
                            <p><?= htmlspecialchars($destination["history"]) ?></p>
                        </details>
                        <details>
                            <summary>Food</summary>
                            <p><?= htmlspecialchars($destination["food"]) ?></p>
                        </details>
                        <details>
                            <summary>Landmark</summary>
                            <p><?= htmlspecialchars($destination["landmark"]) ?></p>
                        </details>
                        <details>
                            <summary>Traditions</summary>
                            <p><?= htmlspecialchars($destination["traditions"]) ?></p>
                        </details>
                        <details>
                            <summary>Travel Tip</summary>
                            <p><?= htmlspecialchars($destination["tip"]) ?></p>
                        </details>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php include "includes/footer.php"; ?>
