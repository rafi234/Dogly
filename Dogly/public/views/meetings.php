<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <title>WALK PAGE</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <?php include ('templates/navigation.php');?>
        </nav>
        <main>
            <header id="main-header">
                <?php include ('templates/header.php'); ?>
            </header>

            <section class="meetings-page">
                <div class="meet-announcements">
                    <div class="meet-announcement">
                        <?php include ('templates/meetingAnnouncement.php');?>
                    </div>
                    <div class="meet-announcement">
                        <?php include ('templates/meetingAnnouncement.php');?>
                    </div>
                    <div class="meet-announcement">
                        <?php include ('templates/meetingAnnouncement.php');?>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>