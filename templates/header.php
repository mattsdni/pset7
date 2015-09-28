<!DOCTYPE html>

<html>

    <head>

        <link href="/pset7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/pset7/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/pset7/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <script src="/pset7/js/jquery-1.11.1.min.js"></script>
        <script src="/pset7/js/bootstrap.min.js"></script>
        <script src="/pset7/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/pset7/public/"><img alt="C$50 Finance" src="img/logo.png"/></a>
                <br><br>
            </div>

            <div id="middle">
