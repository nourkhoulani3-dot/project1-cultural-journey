<?php
$pageTitle = "My Passport | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";

$totalCount = count($destinations);
$foundCount = visitedCount(array_column($destinations, "id"));
$journalEntries = getJournalEntries();
?>
<main id="main-content" class="section">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Stamp collection</p>
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

        <section id="passport-notes" class="passport-notes">
            <div class="section-heading">
                <p class="eyebrow">Saved memory</p>
                <h2>Passport Notes</h2>
                <p>Everything you send from Postcard &amp; Journal is kept here as journey memory.</p>
            </div>

            <?php if (empty($journalEntries)): ?>
                <div class="journal-empty">
                    <p>No journal notes yet.</p>
                    <p><a class="text-link" href="postcard.php">Write a postcard</a> to save your first memory.</p>
                </div>
            <?php else: ?>
                <div class="journal-memory-list">
                    <?php foreach ($journalEntries as $entry): ?>
                        <article class="journal-memory-card">
                            <?php if (!empty($entry["postcard_image"])): ?>
                                <img
                                    class="journal-memory-photo"
                                    src="<?= htmlspecialchars($entry["postcard_image"]) ?>"
                                    alt="<?= htmlspecialchars($entry["postcard_caption"] ?? $entry["stop_name"] ?? "Postcard photo") ?>"
                                    width="480"
                                    height="300"
                                >
                            <?php endif; ?>
                            <div class="journal-memory-content">
                                <header class="journal-memory-header">
                                    <p class="journal-memory-meta">
                                        <span class="country-label"><?= htmlspecialchars($entry["country"] ?? "") ?></span>
                                        <strong><?= htmlspecialchars($entry["stop_name"] ?? "") ?></strong>
                                    </p>
                                    <p class="journal-memory-time"><?= htmlspecialchars($entry["saved_at"] ?? "") ?></p>
                                </header>
                                <p class="journal-memory-from">
                                    From <strong><?= htmlspecialchars($entry["name"] ?? "") ?></strong>
                                    <?php if (!empty($entry["postcard_caption"])): ?>
                                        · photo of <?= htmlspecialchars($entry["postcard_caption"]) ?>
                                    <?php endif; ?>
                                </p>
                                <p class="journal-memory-body"><?= nl2br(htmlspecialchars($entry["message"] ?? "")) ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <div class="section-heading">
            <p class="eyebrow">Quick reference</p>
            <h2>Syria vs. Việt Nam</h2>
        </div>
        <div class="table-wrapper">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col" class="col-syria">Syria</th>
                        <th scope="col" class="col-vietnam">Việt Nam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Languages</th>
                        <td class="col-syria">Arabic</td>
                        <td class="col-vietnam">Vietnamese (Tiếng Việt)</td>
                    </tr>
                    <tr>
                        <th scope="row">Foods</th>
                        <td class="col-syria">Shawarma, kibbeh, muhammara</td>
                        <td class="col-vietnam">Cao Lầu, white rose dumplings, bún bò Huế</td>
                    </tr>
                    <tr>
                        <th scope="row">Heritage</th>
                        <td class="col-syria">Umayyad Mosque, souqs, Citadel of Aleppo</td>
                        <td class="col-vietnam">Hội An Ancient Town, silk lanterns, Huế Imperial City</td>
                    </tr>
                    <tr>
                        <th scope="row">Journey focus</th>
                        <td class="col-syria">Damascus, Aleppo, Palmyra</td>
                        <td class="col-vietnam">Đà Nẵng, Hội An, Huế</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include "includes/footer.php"; ?>
