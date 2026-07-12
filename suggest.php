<?php
$pageTitle = "Suggest a Destination | A Cultural Journey";

$name = "";
$country = "";
$reason = "";
$errors = [];
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $country = trim($_POST["country"] ?? "");
    $reason = trim($_POST["reason"] ?? "");

    if ($name === "") {
        $errors[] = "Please enter a destination name.";
    }

    if ($country === "") {
        $errors[] = "Please enter the country.";
    }

    if ($reason === "") {
        $errors[] = "Please explain why the destination should be included.";
    }

    if (empty($errors)) {
        $submitted = true;
    }
}

include "includes/header.php";
?>
<main id="main-content" class="section">
    <div class="container narrow-container">
        <div class="section-heading">
            <p class="eyebrow">Share an idea</p>
            <h1>Suggest a Destination</h1>
            <p>Recommend another cultural destination for a future journey.</p>
        </div>

        <?php if ($submitted): ?>
            <section class="message success-message" aria-live="polite">
                <h2>Thank you for your suggestion!</h2>
                <p>
                    You suggested
                    <strong><?= htmlspecialchars($name) ?></strong>
                    in <strong><?= htmlspecialchars($country) ?></strong>.
                </p>
                <p><?= nl2br(htmlspecialchars($reason)) ?></p>
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

            <form class="suggestion-form" method="post" action="suggest.php">
                <div class="form-group">
                    <label for="name">Destination name</label>
                    <input id="name" name="name" type="text"
                           value="<?= htmlspecialchars($name) ?>" required>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input id="country" name="country" type="text"
                           value="<?= htmlspecialchars($country) ?>" required>
                </div>

                <div class="form-group">
                    <label for="reason">Why should it be included?</label>
                    <textarea id="reason" name="reason" rows="6" required><?= htmlspecialchars($reason) ?></textarea>
                </div>

                <button class="button" type="submit">Submit Suggestion</button>
            </form>
        <?php endif; ?>
    </div>
</main>
<?php include "includes/footer.php"; ?>
