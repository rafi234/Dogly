<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <title>MAIN PAGE</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <i class="fas fa-user"></i>
                    <a href="#" class="button">People</a>
                </li>
                <li>
                    <i class="fas fa-walking"></i>
                    <a href="#" class="button">Walk</a>
                </li>
                <li>
                    <i class="fas fa-paw"></i>
                    <a href="#" class="button">Long-term care</a>
                </li>
                <li>
                    <i class="fab fa-meetup"></i>
                    <a href="#" class="button" id="meetings">Dog meetings</a>
                </li>
                <li>
                    <i class="fas fa-bell"></i>
                    <a href="#" class="button">Notification</a>
                </li>
                <li>
                    <i class="fas fa-cog"></i>
                    <a href="#" class="button">Settings</a>
                </li>
            </ul>
        </nav>
        <main>
            <header id="main-header">
                <div class="search-bar">
                    <form class="search">
                        <input type="search" placeholder="search">
                    </form>
                </div>

                <div class="upper-icons">
                    <a href="#"><i class="far fa-comment-dots"></i></a>
                    <a href="#"><i class="fas fa-user-circle"></i></a>
                    <a href="#"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </header>

            <section class="main-page">
                <div id="logo-main">
                    <img src="public/img/logo.svg">
                </div>

                <div id="top-priority">
                    <h2>Top priority</h2>
                    <div id="top-priority-announcements">
                        <div class="announcement">
                            <header class="announcement-header">
                                <div class="dog-name">Name</div>
                                <div class="dog-age">age</div>
                                <div class="dog-price">price</div>
                            </header>
                            <img class="announcement-img" src="public/img/pies.jpg">
                        </div>
                        <div class="announcement">
                            <header class="announcement-header">
                                <div class="dog-name">Name</div>
                                <div class="dog-age">age</div>
                                <div class="dog-price">price</div>
                            </header>
                            <img class="announcement-img" src="public/img/pies.jpg">
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
                                        Intrested
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
                                        Intrested
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
                                        Intrested
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