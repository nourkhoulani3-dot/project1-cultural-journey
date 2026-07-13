<?php
$pageTitle = "Home | A Cultural Journey";
$showWinningTicket = true;
include "includes/header.php";
include "data/destinations.php";
?>
<label for="claim-ticket" class="ticket-overlay">
    <span class="ticket-trigger">
        <img
            src="images/ticket.jpg"
            alt="Winning ticket for a six-day cultural journey through Syria and Việt Nam, all expenses paid"
            class="ticket-full"
            width="1600"
            height="650"
        >
        <span class="ticket-hint">Click the ticket to begin your journey</span>
    </span>
</label>

<div class="confetti-layer" aria-hidden="true">
    <?php for ($i = 0; $i < 48; $i++): ?>
        <span class="confetti-piece" style="--i: <?= $i ?>;"></span>
    <?php endfor; ?>
</div>

<main id="main-content">
    <section class="hero">
        <div class="container hero-content">
            <p class="eyebrow">You won a six-day cultural journey</p>
            <h1>A Cultural Journey Through Syria and Việt Nam</h1>
            <p>
                Imagine receiving a winning ticket that takes you through six destinations:
                three in Syria and three in Việt Nam. At every stop, you will explore history,
                traditions, food, landmarks, and cultural significance.
            </p>
            <a class="button" href="#itinerary">Begin the Journey</a>
        </div>
    </section>

    <section id="itinerary" class="section timeline-section">
        <div class="container">
            <div class="section-heading timeline-heading">
                <p class="eyebrow">Your itinerary</p>
                <h2>Six days, two countries, one cultural experience</h2>
                <p>Follow the route from Syria's historic cities into the living heritage of central Việt Nam.</p>
            </div>

            <div class="journey-timeline" aria-label="Six-day journey timeline">
                <?php foreach ($destinations as $destination): ?>
                    <?php
                    $displayName = $destination["city"] ?? $destination["name"];
                    $roomHref = $destination["country"] === "Syria"
                        ? "syria-room.php?artifact=" . urlencode($destination["id"]) . "#" . urlencode($destination["city_anchor"])
                        : "vietnam-room.php?artifact=" . urlencode($destination["id"]) . "#" . urlencode($destination["city_anchor"]);
                    ?>
                    <article class="timeline-item">
                        <p class="timeline-day">Day <?= (int)$destination["day"] ?></p>
                        <div class="timeline-marker" aria-hidden="true">
                            <span><?= (int)$destination["day"] ?></span>
                        </div>
                        <div class="timeline-card">
                            <img
                                class="timeline-card-image"
                                src="<?= htmlspecialchars($destination["image"]) ?>"
                                alt="<?= htmlspecialchars($displayName) ?> cultural destination photo"
                                width="640"
                                height="360"
                            >
                            <div class="timeline-card-body">
                                <p class="country-label"><?= htmlspecialchars($destination["country"]) ?></p>
                                <h3><?= htmlspecialchars($displayName) ?></h3>
                                <p class="timeline-summary"><?= htmlspecialchars($destination["description"]) ?></p>
                                <a class="text-link" href="<?= htmlspecialchars($roomHref) ?>">Explore this stop</a>
                            </div>
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
                            <th>Việt Nam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Languages</th>
                            <td>Arabic</td>
                            <td>Vietnamese (Tiếng Việt)</td>
                        </tr>
                        <tr>
                            <th>Featured foods</th>
                            <td>Kibbeh, shawarma, stuffed vegetables</td>
                            <td>Phở, bánh mì, bún bò Huế, mì Quảng</td>
                        </tr>
                        <tr>
                            <th>Featured heritage</th>
                            <td>Ancient cities, souqs, citadels</td>
                            <td>Historic quarters, temples, trading ports</td>
                        </tr>
                        <tr>
                            <th>Journey focus</th>
                            <td>Damascus, Aleppo, Palmyra</td>
                            <td>Đà Nẵng, Hội An, Huế</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php include "includes/footer.php"; ?>
