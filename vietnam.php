<?php
$pageTitle = "Vietnam | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";

$vietnamDestinations = array_filter($destinations, function($destination) {
    return $destination["country"] === "Vietnam";
});
?>
<main id="main-content" class="section">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Days 4–6</p>
            <h1>Explore Vietnam</h1>
            <p>Continue the journey through three Vietnamese destinations and their cultural stories.</p>
        </div>

        <div class="destination-list">
            <?php foreach ($vietnamDestinations as $destination): ?>
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
