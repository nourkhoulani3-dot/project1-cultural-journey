<?php
$pageTitle = "My Passport | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";

$totalCount = count($destinations);
$foundCount = visitedCount(array_column($destinations, "id"));
?>
<main id="main-content" class="section">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Feature A: Collectible</p>
            <h1>My Passport</h1>
            <p><?= $foundCount ?> of <?= $totalCount ?> stamps collected so far. Explore the Syria and Việt Nam rooms to fill it in.</p>
        </div>

        <div class="passport-page">
            <?php foreach ($destinations as $d): ?>
                <?php $found = isVisited($d["id"]); ?>
                <div class="stamp <?= $found ? "stamp-collected" : "stamp-empty" ?>">
                    <?php if ($found): ?>
                        <p class="stamp-name"><?= htmlspecialchars($d["name"]) ?></p>
                        <?php if (!empty($d["stamp_image"])): ?>
                            <img
                                class="stamp-symbol"
                                src="<?= htmlspecialchars($d["stamp_image"]) ?>"
                                alt=""
                                width="120"
                                height="120"
                            >
                        <?php endif; ?>
                        <p class="stamp-day">Day <?= (int)$d["day"] ?></p>
                    <?php else: ?>
                        <p class="stamp-placeholder">?</p>
                        <p class="stamp-name">Not yet explored</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="section-heading">
            <p class="eyebrow">Quick reference</p>
            <h2>Passport Notes: Syria vs. Việt Nam</h2>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr><th>Category</th><th>Syria</th><th>Việt Nam</th></tr>
                </thead>
                <tbody>
                    <tr><th>Languages</th><td>Arabic</td><td>Vietnamese (Tiếng Việt)</td></tr>
                    <tr><th>Featured foods</th><td>Kibbeh, shawarma, stuffed vegetables</td><td>Phở, bánh mì, bún bò Huế, mì Quảng</td></tr>
                    <tr><th>Featured heritage</th><td>Ancient cities, souqs, citadels</td><td>Historic quarters, temples, trading ports</td></tr>
                    <tr><th>Journey focus</th><td>Damascus, Aleppo, Palmyra</td><td>Đà Nẵng, Hội An, Huế</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include "includes/footer.php"; ?>
