<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <script type="text/javascript" src="./public/js/nav.js" defer></script>
    <title>WALK PAGE</title>
</head>

<body>
<div class="base-container">
        <?php include('templates/navigation.php'); ?>
    <main>
        <header id="main-header">
            <?php include('templates/header.php'); ?>
        </header>

        <section class="meetings-page">
            <a href="http://localhost:8080/addMeeting"> Add meeting</a>
            <div class="meetings">
                <?php foreach ($meetings as $meeting) : ?>
                    <div class="meeting" id="<?= $meeting->getId(); ?>">
                        <img src="public/uploads/<?= $meeting->getFile(); ?>">

                        <div class="meet-main-section">
                            <div class="meet-header">
                                <?= $meeting->getPlace() . ', ' . $meeting->getDate(); ?>
                            </div>
                            <div class="meet-description">
                                <?= $meeting->getDescription(); ?>
                            </div>
                            <div class="meet-going">
                                <header>
                                    Guests
                                </header>
                                <div class="meet-going-label">
                                    <div class="going">
                                        <?= $meeting->getGoing(); ?><br>Going
                                    </div>
                                    <div class="interested">
                                        <?= $meeting->getInterested(); ?><br>Interested
                                    </div>
                                </div>
                                <div class="meet-icon">

                                </div>
                            </div>
                            <div class="meet-buttons">
                                <button class="button" id="goingButton">Going</button>
                                <button class="button" id="interestedButton">Interested</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </main>
</div>
</body>


<template id="meeting-template">
    <img src="">
    <div class="meet-main-section">
        <div class="meet-header">
            place, date
        </div>
        <div class="meet-description">
            description
        </div>
        <div class="meet-going">
            <header>
                Guests
            </header>
            <div class="meet-going-label">
                <div class="going">
                    20<br>Going
                </div>
                <div class="interested">
                    12<br>Interested
                </div>
            </div>
            <div class="meet-icon">

            </div>
        </div>
        <div class="meet-buttons">
            <button class="button">Going</button>
            <button class="button">Interested</button>
        </div>
    </div>
</template>