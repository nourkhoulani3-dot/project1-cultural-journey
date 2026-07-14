<?php
$pageTitle = "Postcard & Journal | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";

$name = "";
$favoriteStop = "";
$message = "";
$errors = [];
$submitted = false;
$postcardPhoto = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $favoriteStop = trim($_POST["favorite_stop"] ?? "");
    $message = trim($_POST["message"] ?? "");

    $validStopIds = array_column($destinations, "id");

    if ($name === "") {
        $errors[] = "Please enter your name.";
    }
    if (!in_array($favoriteStop, $validStopIds, true)) {
        $errors[] = "Please choose one of the six stops.";
    }
    if ($message === "") {
        $errors[] = "Please write a short journal message.";
    }

    if (empty($errors)) {
        $favoriteDestination = null;
        foreach ($destinations as $d) {
            if ($d["id"] === $favoriteStop) {
                $favoriteDestination = $d;
                break;
            }
        }

        $caption = $favoriteDestination["city"] ?? $favoriteDestination["name"] ?? $favoriteStop;
        $postcardPhoto = [
            "src" => $favoriteDestination["image"] ?? "",
            "caption" => $caption
        ];

        saveJournalEntry([
            "name" => $name,
            "stop_id" => $favoriteStop,
            "stop_name" => $favoriteDestination["name"] ?? $favoriteStop,
            "country" => $favoriteDestination["country"] ?? "",
            "message" => $message,
            "saved_at" => date("Y-m-d H:i"),
            "postcard_image" => $postcardPhoto["src"],
            "postcard_caption" => $postcardPhoto["caption"]
        ]);

        $submitted = true;
    }
}

$favoriteDestination = null;
foreach ($destinations as $d) {
    if ($d["id"] === $favoriteStop) {
        $favoriteDestination = $d;
        break;
    }
}

$syriaStops = array_values(array_filter($destinations, fn($d) => $d["country"] === "Syria"));
$vietnamStops = array_values(array_filter($destinations, fn($d) => $d["country"] === "Việt Nam"));
?>
<main id="main-content" class="section postcard-section">
    <div class="container postcard-container">
        <div class="section-heading">
            <p class="eyebrow">Send word home</p>
            <h1>Postcard &amp; Journal</h1>
            <p>Choose a stop, write your note, and send a city postcard home.</p>
        </div>

        <?php if ($submitted && $postcardPhoto): ?>
            <section class="postcard-result" aria-live="polite">
                <p class="eyebrow">Delivered</p>
                <h2 class="visually-hidden">Postcard sent</h2>

                <article class="aesthetic-postcard aesthetic-postcard-sent">
                    <div class="postcard-photo-pane">
                        <img
                            src="<?= htmlspecialchars($postcardPhoto["src"]) ?>"
                            alt="Postcard view of <?= htmlspecialchars($postcardPhoto["caption"]) ?>"
                            width="800"
                            height="560"
                        >
                        <span class="postcard-city-tag"><?= htmlspecialchars($postcardPhoto["caption"]) ?></span>
                        <span class="postcard-country-ribbon"><?= htmlspecialchars($favoriteDestination["country"] ?? "") ?></span>
                    </div>
                    <div class="postcard-message-pane">
                        <div class="postcard-postmark" aria-hidden="true">
                            <span>AIR MAIL</span>
                            <strong><?= htmlspecialchars($postcardPhoto["caption"]) ?></strong>
                        </div>
                        <p class="postcard-greeting">Dear Friends,</p>
                        <p class="postcard-message-text"><?= nl2br(htmlspecialchars($message)) ?></p>
                        <p class="postcard-signoff">
                            With love from
                            <strong><?= htmlspecialchars($favoriteDestination["name"] ?? "") ?></strong>,
                            <?= htmlspecialchars($name) ?>
                        </p>
                        <p class="postcard-date"><?= htmlspecialchars(date("F j, Y")) ?></p>
                    </div>
                </article>

                <div class="postcard-result-actions">
                    <p>
                        Saved in your
                        <a class="text-link" href="passport.php#passport-notes">Passport Notes</a>.
                    </p>
                    <a class="button" href="postcard.php">Write another postcard</a>
                </div>
            </section>
        <?php else: ?>
            <?php if (!empty($errors)): ?>
                <section class="message error-message" aria-live="assertive">
                    <h2>Please fix the following:</h2>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <form class="aesthetic-postcard aesthetic-postcard-compose" method="post" action="postcard.php">
                <div class="postcard-photo-pane">
                    <div class="postcard-preview postcard-preview-default" aria-hidden="true">
                        <p>Pick a stop to preview that city's photo</p>
                    </div>

                    <?php foreach ($destinations as $d): ?>
                        <?php $cityLabel = $d["city"] ?? $d["name"]; ?>
                        <div class="postcard-preview postcard-preview-<?= htmlspecialchars($d["id"]) ?>">
                            <img
                                src="<?= htmlspecialchars($d["image"]) ?>"
                                alt=""
                                width="800"
                                height="560"
                            >
                            <span class="postcard-city-tag"><?= htmlspecialchars($cityLabel) ?></span>
                            <span class="postcard-country-ribbon"><?= htmlspecialchars($d["country"]) ?></span>
                        </div>
                    <?php endforeach; ?>

                    <div class="postcard-stamp-seal" aria-hidden="true">✈</div>
                </div>

                <div class="postcard-message-pane">
                    <p class="postcard-compose-label">Greetings from my journey</p>

                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input id="name" name="name" type="text" value="<?= htmlspecialchars($name) ?>" required>
                    </div>

                    <fieldset class="stop-picker">
                        <legend>Favorite stop</legend>

                        <p class="stop-group-label">Syria</p>
                        <div class="stop-options">
                            <?php foreach ($syriaStops as $d): ?>
                                <label class="stop-option stop-option-syria">
                                    <input
                                        type="radio"
                                        name="favorite_stop"
                                        value="<?= htmlspecialchars($d["id"]) ?>"
                                        <?= $favoriteStop === $d["id"] ? "checked" : "" ?>
                                        required
                                    >
                                    <span><?= htmlspecialchars($d["name"]) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>

                        <p class="stop-group-label">Việt Nam</p>
                        <div class="stop-options">
                            <?php foreach ($vietnamStops as $d): ?>
                                <label class="stop-option stop-option-vietnam">
                                    <input
                                        type="radio"
                                        name="favorite_stop"
                                        value="<?= htmlspecialchars($d["id"]) ?>"
                                        <?= $favoriteStop === $d["id"] ? "checked" : "" ?>
                                        required
                                    >
                                    <span><?= htmlspecialchars($d["name"]) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="message">Journal message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Wish you were here..."><?= htmlspecialchars($message) ?></textarea>
                    </div>

                    <button class="button" type="submit">Send Postcard</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</main>
<?php include "includes/footer.php"; ?>
