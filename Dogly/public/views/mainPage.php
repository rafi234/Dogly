<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/nav.js" defer></script>
    <title>MAIN PAGE</title>
</head>

<body>
    <div class="base-container">
            <?php include ('templates/navigation.php');?>
        <main>
            <header id="main-header">
               <?php include ('templates/header.php'); ?>
            </header>

            <section class="main-page">
                <div id="logo-main">
                    <img src="public/img/logo.svg">
                </div>

                <div id="top-priority">
                    <h2>Top priority</h2>
                    <div class="announcements" id="tp">
                        <?php for($i = 0; $i < 2; $i++) :?>
                            <div class="announcement-tp">
                                <header class="announcement-header">
                                    <div class="dog-name"><?= $walks[$i]->getName(); ?></div>
                                    <div class="dog-age"><?= $walks[$i]->getAge() . ' years'; ?></div>
                                    <div class="dog-price"><?= $walks[$i]->getPrice() . ' $'; ?></div>
                                </header>
                                <img class="announcement-img" src="public/uploads/<?= $walks[$i]->getImage(); ?>">
                            </div>
                        <?php endfor; ?>
                    </div>
                    <footer id="top-priority-footer">
                        <a href="http://localhost:8080/walkPage" id="go-to-walk">go to walk section</a>
                    </footer>
                </div>

                <div class="meetings-page" id="most-popular">
                    <h2>Most popular meetings</h2>
                    <div class="mp-announcement" id="most-popular-announcements">
                        <?php for($i = 0; $i < 2; $i++) :?>
                            <div class="meeting" id="<?= $meetings[$i]->getId(); ?>">
                                <img src="public/uploads/<?= $meetings[$i]->getFile(); ?>">

                                <div class="meet-main-section">
                                    <div class="meet-header">
                                        <?= $meetings[$i]->getPlace() . ', ' . $meetings[$i]->getDate(); ?>
                                    </div>
                                    <div class="meet-description">
                                        <?= $meetings[$i]->getDescription(); ?>
                                    </div>
                                    <div class="meet-going">
                                        <header>
                                            Guests
                                        </header>
                                        <div class="meet-going-label">
                                            <div class="going">
                                                <?= $meetings[$i]->getGoing(); ?><br>Going
                                            </div>
                                            <div class="interested">
                                                <?= $meetings[$i]->getInterested(); ?><br>Interested
                                            </div>
                                        </div>
                                    </div>
                                    <div class="meet-buttons">
                                        <button class="button" id="goingButton">Going</button>
                                        <button class="button" id="interestedButton">Interested</button>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <a href="http://localhost:8080/meetings">go to meetings section</a>
                </div>
            </section>
        </main>
    </div>
</body>