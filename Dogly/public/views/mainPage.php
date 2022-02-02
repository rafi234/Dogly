<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/deleteCookie.js" defer></script>
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
                    <div id="top-priority-announcements">
                        <div class="announcement">
                            <?php include('templates/walkAnnouncement.php');?>
                        </div>
                        <div class="announcement">
                            <?php include('templates/walkAnnouncement.php');?>
                        </div>
                    </div>
                    <footer id="top-priority-footer">
                        <a href="#" id="go-to-walk">go to walk section</a>
                    </footer>
                </div>

                <div id="most-popular">
                    <h2>Most popular meetings</h2>
                    <div id="most-popular-announcements">
                        <div class="mp-announcement">
                            <div class="img-mp">
                                <img src="public/img/park.JPG">
                            </div>
                            <div class="mp-main-section">
                                <div class="mp-date">
                                    <h3>Miejsce, data</h3>
                                </div>
                                <div class="mp-description">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                </div>
                                <div class="mp-icons">

                                </div>
                                <div class="mp-buttons">
                                    <button type="button">
                                        Interested
                                    </button>
                                    <button type="submit">
                                        Going
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mp-announcement">
                            <div class="img-mp">
                                <img src="public/img/park.JPG">
                            </div>
                            <div class="mp-main-section">
                                <div class="mp-date">
                                    <h3>Miejsce, data</h3>
                                </div>

                                <div class="mp-description">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                </div>
                                <div class="mp-icons">

                                </div>
                                <div class="mp-buttons">
                                    <button type="submit">
                                        Interested
                                    </button>
                                    <button type="submit">
                                        Going
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mp-announcement">
                            <div class="img-mp">
                                <img src="public/img/park.JPG">
                            </div>
                            <div class="mp-main-section">
                                <div class="mp-date">
                                    <h3>Miejsce, data</h3>
                                </div>
                                <div class="mp-description">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                </div>
                                <div class="mp-icons">

                                </div>
                                <div class="mp-buttons">
                                    <button type="submit">
                                        Interested
                                    </button>
                                    <button type="submit">
                                        Going
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>