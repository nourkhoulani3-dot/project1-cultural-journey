<?php
$pageTitle = "Home | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";
?>
<main id="main-content">
    <section class="hero">
        <div class="container hero-content">
            <p class="eyebrow">You won a six-day cultural journey</p>
            <h1>A Cultural Journey Through Syria and Vietnam</h1>
            <p>
                Imagine receiving a winning ticket that takes you through six destinations:
                three in Syria and three in Vietnam. At every stop, you will explore history,
                traditions, food, landmarks, and cultural significance.
            </p>
            <a class="button" href="#itinerary">Begin the Journey</a>
        </div>
    </section>

    <section id="itinerary" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Your itinerary</p>
                <h2>Six days, two countries, one cultural experience</h2>
            </div>

            <div class="card-grid">
                <?php foreach ($destinations as $destination): ?>
                    <article class="destination-card">
                        <div class="card-image placeholder-image" role="img"
                             aria-label="Image placeholder for <?= htmlspecialchars($destination["name"]) ?>">
                            <span>Day <?= (int)$destination["day"] ?></span>
                        </div>
                        <div class="card-content">
                            <p class="country-label"><?= htmlspecialchars($destination["country"]) ?></p>
                            <h3><?= htmlspecialchars($destination["name"]) ?></h3>
                            <p><?= htmlspecialchars($destination["history"]) ?></p>
                            <a class="text-link"
                               href="<?= $destination["country"] === "Syria" ? "syria.php" : "vietnam.php" ?>#<?= htmlspecialchars($destination["id"]) ?>">
                                Explore this stop
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section comparison-section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Feature A</p>
                <h2>Cultural Comparison Guide</h2>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Syria</th>
                            <th>Vietnam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Languages</th>
                            <td>Arabic</td>
                            <td>Vietnamese</td>
                        </tr>
                        <tr>
                            <th>Featured foods</th>
                            <td>Kibbeh, shawarma, stuffed vegetables</td>
                            <td>Pho, bánh mì, bun cha</td>
                        </tr>
                        <tr>
                            <th>Featured heritage</th>
                            <td>Ancient cities, souqs, citadels</td>
                            <td>Historic quarters, temples, trading ports</td>
                        </tr>
                        <tr>
                            <th>Journey focus</th>
                            <td>Damascus, Aleppo, Palmyra</td>
                            <td>Hanoi, Ho Chi Minh City, Hội An</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php include "includes/footer.php"; ?>
