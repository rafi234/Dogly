<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <title>walks</title>
</head>

<body>
<div class="base-container">
    <nav>
        <?php include ('templates/navigation.php');?>
    </nav>
    <main>
        <header id="main-header">
            <?php include ('templates/header.php');?>
        </header>

        <section class="add-meeting">
            Add an announcement<br>

            <form action="addWalk" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="dogName" type="text" placeholder="Your dog's name">
                <input name="dogAge" type="text" placeholder="Your dog's age">
                <input name="time" type="time">
                <input name="date" type="date">
                <input name="price" type="text" placeholder="Price">
                <input name="file" type="file" class="custom-upload-file-button">
                <button>Send</button>
            </form>
        </section>
    </main>
</div>
</body>