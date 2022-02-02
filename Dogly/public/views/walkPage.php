<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/nav.js" defer></script>
    <title>WALK PAGE</title>
</head>

<body>
<div class="base-container">
        <?php include('templates/navigation.php') ?>
    <main>
        <header id="main-header">
            <?php include('templates/header.php'); ?>
        </header>

        <section class="walk-page">
            <a href="http://localhost:8080/addWalk">Add walk</a>
            <div class="announcements">
                <?php foreach ($walks as $walk) : ?>
                    <div class="announcement">
                        <header class="announcement-header">
                            <div class="dog-name"><?= $walk->getName(); ?></div>
                            <div class="dog-age"><?= $walk->getAge() . ' years'; ?></div>
                            <div class="dog-price"><?= $walk->getPrice() . ' $'; ?></div>
                        </header>
                        <img class="announcement-img" src="public/uploads/<?= $walk->getImage(); ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</div>
</body>