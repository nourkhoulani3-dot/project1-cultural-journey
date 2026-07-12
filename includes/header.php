<?php
if (!isset($pageTitle)) {
    $pageTitle = "A Cultural Journey Through Syria and Vietnam";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A six-day cultural journey through Syria and Vietnam.">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a class="skip-link" href="#main-content">Skip to main content</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="site-logo" href="index.php">Cultural Journey</a>
        <?php include __DIR__ . "/nav.php"; ?>
    </div>
</header>
