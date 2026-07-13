<?php
$pageTitle = "Việt Nam Room | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";

$roomDestinations = array_values(array_filter($destinations, fn($d) => $d["country"] === "Việt Nam"));

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
        "city" => "Đà Nẵng",
        "anchor" => "city-danang",
        "stop_id" => "caurong",
        "intro" => "Explore Cham heritage, craft villages, coastal mountains, and modern festivals in Đà Nẵng."
    ],
    [
        "city" => "Hội An",
        "anchor" => "city-hoian",
        "stop_id" => "longden",
        "intro" => "Discover living heritage, lanterns, food traditions, and the historic trading port of Hội An."
    ],
    [
        "city" => "Huế",
        "anchor" => "city-hue",
        "stop_id" => "kinhthanh",
        "intro" => "Step into imperial architecture, royal music, and craft villages in Huế."
    ]
];
?>
<main id="main-content" class="section room-page">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Days 4 to 6</p>
            <h1>The Việt Nam Room</h1>
            <p>Tap hotspot 1 (Đà Nẵng), 2 (Hội An), or 3 (Huế) to reveal that city's artifacts.</p>
            <p class="progress-pill"><?= $foundInRoom ?> of <?= count($roomDestinations) ?> city stamps found</p>
        </div>

        <div class="room-scene">
            <img src="images/banahill.jpeg" alt="Bà Nà Hills landscape behind the Việt Nam room" class="room-background">

            <?php foreach ($roomDestinations as $index => $d): ?>
                <a
                    href="vietnam-room.php?artifact=<?= urlencode($d["id"]) ?>#<?= htmlspecialchars($d["city_anchor"]) ?>"
                    class="hotspot hotspot-artifact <?= isVisited($d["id"]) ? "hotspot-found" : "" ?>"
                    style="left: <?= (float)$d["hotspot_x"] ?>%; top: <?= (float)$d["hotspot_y"] ?>%;"
                    aria-label="Show artifacts for <?= htmlspecialchars($d["city"]) ?>"
                >
                    <img
                        src="<?= htmlspecialchars($d["artifact_image"] ?? $d["image"]) ?>"
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
                <p class="archive-prompt">City details stay hidden until you tap a hotspot above. Then click any card to open its story.</p>
            </div>

            <?php foreach ($citySections as $section): ?>
                <?php $cityArtifacts = artifactsByCity($section["city"]); ?>
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
