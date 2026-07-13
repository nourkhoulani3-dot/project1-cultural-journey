<?php
$pageTitle = "Postcard & Journal | A Cultural Journey";
include "includes/header.php";
include "data/destinations.php";

$name = "";
$favoriteStop = "";
$message = "";
$errors = [];
$submitted = false;

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
        $submitted = true;
    }
}

// Look up the chosen stop's full name for the confirmation message
$favoriteDestination = null;
foreach ($destinations as $d) {
    if ($d["id"] === $favoriteStop) {
        $favoriteDestination = $d;
        break;
    }
}
?>
<main id="main-content" class="section">
    <div class="container narrow-container">
        <div class="section-heading">
            <p class="eyebrow">Send word home</p>
            <h1>Postcard &amp; Journal</h1>
            <p>Write a postcard about your favorite stop on the journey.</p>
        </div>

        <?php if ($submitted): ?>
            <section class="message success-message" aria-live="polite">
                <h2>Postcard sent!</h2>
                <p>
                    <strong><?= htmlspecialchars($name) ?></strong> wrote home about
                    <strong><?= htmlspecialchars($favoriteDestination["name"] ?? "") ?></strong>.
                </p>
                <p><?= nl2br(htmlspecialchars($message)) ?></p>
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

            <div class="postcard">
                <div class="postcard-stamp" aria-hidden="true">✈</div>
                <form class="suggestion-form postcard-form" method="post" action="postcard.php">
                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input id="name" name="name" type="text" value="<?= htmlspecialchars($name) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="favorite_stop">Favorite stop</label>
                        <select id="favorite_stop" name="favorite_stop" required>
                            <option value="">Choose a destination</option>
                            <?php foreach ($destinations as $d): ?>
                                <option value="<?= htmlspecialchars($d["id"]) ?>"
                                    <?= $favoriteStop === $d["id"] ? "selected" : "" ?>>
                                    <?= htmlspecialchars($d["name"]) ?> (<?= htmlspecialchars($d["country"]) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Journal message</label>
                        <textarea id="message" name="message" rows="6" required><?= htmlspecialchars($message) ?></textarea>
                    </div>

                    <button class="button" type="submit">Send Postcard</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php include "includes/footer.php"; ?>