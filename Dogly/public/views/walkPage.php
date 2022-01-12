<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <title>WALK PAGE</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <?php include ('templates/navigation.php')?>
        </nav>
        <main>
            <header id="main-header">
                <?php include ('templates/header.php'); ?>
            </header>

            <section class="walk-page">
                <div class="announcements">
                    <div class="announcement" id="ad1">
                        <?php include('templates/walkAnnouncement.php');?>
                    </div>
                    <div class="announcement" id="ad2">
                        <?php include('templates/walkAnnouncement.php');?>
                    </div>
                    <div class="announcement" id="ad3">
                        <?php include('templates/walkAnnouncement.php');?>
                    </div>
                    <div class="announcement" id="ad4">
                        <?php include('templates/walkAnnouncement.php');?>
                    </div>
                    <div class="announcement" id="ad5">
                        <?php include('templates/walkAnnouncement.php');?>
                    </div>
                    <div class="announcement" id="ad6">
                        <?php include('templates/walkAnnouncement.php');?>
                    </div>
                    <div class="announcement" id="ad7">
                        <?php include('templates/walkAnnouncement.php');?>
                    </div>
                    <div class="announcement" id="ad8">
                        <?php include('templates/walkAnnouncement.php');?>
                    </div>
                </div>

                <div class="page-picker">
                    <a href="#">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </section>
        </main>
    </div>
</body>