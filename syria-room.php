<?php
$pageTitle = "Syria Room | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";
require_once __DIR__ . "/data/syria_artifacts.php";

$roomDestinations = array_values(array_filter($destinations, fn($d) => $d["country"] === "Syria"));

$activeId = $_GET["artifact"] ?? null;
$openArtifactId = $_GET["open"] ?? null;

foreach ($roomDestinations as $d) {
    if ($d["id"] === $activeId) {
        markVisited($d["id"]);
        break;
    }
}

$roomIds = array_column($roomDestinations, "id");
$foundInRoom = count(array_intersect($roomIds, $_SESSION["visited_artifacts"]));

$citySections = [
    [
        "city" => "Damascus",
        "anchor" => "city-damascus",
        "stop_id" => "damascus",
        "intro" => "Explore mosques, souqs, courtyard homes, food, dance, and crafts in Damascus."
    ],
    [
        "city" => "Aleppo",
        "anchor" => "city-aleppo",
        "stop_id" => "aleppo",
        "intro" => "Discover the citadel, covered souqs, olive soap, cuisine, and Silk Road heritage in Aleppo."
    ],
    [
        "city" => "Palmyra",
        "anchor" => "city-palmyra",
        "stop_id" => "palmyra",
        "intro" => "Learn about temples, colonnades, theater, Queen Zenobia, and desert trade in Palmyra."
    ]
];
?>
<main id="main-content" class="section room-page">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Days 1 to 3</p>
            <h1>The Syria Room</h1>
            <p>Tap hotspot 1 (Damascus), 2 (Aleppo), or 3 (Palmyra) to reveal that city's artifacts.</p>
            <p class="progress-pill"><?= $foundInRoom ?> of <?= count($roomDestinations) ?> city stamps found</p>
        </div>

        <div class="room-scene">
            <img src="images/syriabanner.jpg" alt="Syria citadel overlook with national flag" class="room-background">

            <?php foreach ($roomDestinations as $index => $d): ?>
                <a
                    href="syria-room.php?artifact=<?= urlencode($d["id"]) ?>#<?= htmlspecialchars($d["city_anchor"]) ?>"
                    class="hotspot hotspot-artifact <?= isVisited($d["id"]) ? "hotspot-found" : "" ?>"
                    style="left: <?= (float)$d["hotspot_x"] ?>%; top: <?= (float)$d["hotspot_y"] ?>%;"
                    aria-label="Show artifacts for <?= htmlspecialchars($d["name"]) ?>"
                >
                    <img
                        src="<?= htmlspecialchars($d["image"]) ?>"
                        alt=""
                        class="hotspot-image"
                        width="120"
                        height="120"
                    >
                    <span class="hotspot-number"><?= $index + 1 ?></span>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="archive-panel">
            <div class="section-heading archive-heading">
                <p class="eyebrow">Cultural archive</p>
                <h2>City artifacts</h2>
                <p class="archive-prompt syria-archive-prompt">City details stay hidden until you tap a hotspot above. Then click any card to open its story.</p>
            </div>

            <?php foreach ($citySections as $section): ?>
                <?php $cityArtifacts = syriaArtifactsByCity($section["city"]); ?>
                <section id="<?= htmlspecialchars($section["anchor"]) ?>" class="city-archive">
                    <div class="city-archive-header">
                        <h3><?= htmlspecialchars($section["city"]) ?></h3>
                        <p><?= htmlspecialchars($section["intro"]) ?></p>
                        <p class="archive-count"><?= count($cityArtifacts) ?> artifacts</p>
                    </div>

                    <div class="artifact-tile-grid">
                        <?php foreach ($cityArtifacts as $artifact): ?>
                            <?php
                            $startOpen = ($openArtifactId === ($artifact["id"] ?? null));
                            include "includes/artifact-tile.php";
                            ?>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php include "includes/footer.php"; ?>
