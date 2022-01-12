<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/760d12b685.js" crossorigin="anonymous"></script>
    <title>MAIN PAGE</title>
</head>

<body>
<div class="base-container">
    <nav>
        <?php include ('templates/navigation.php'); ?>
    </nav>
    <main>
        <header id="main-header">
            <?php include ('templates/header.php');?>
        </header>

        <section class="add-meeting">
            Create your meeting<br>

            <form action="addMeeting" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="place" type="text" placeholder="Place">
                <input name="date" type="date" placeholder="Date">
                <input name="description" type="text" placeholder="Short description">
                <input name="file" type="file" class="custom-upload-file-button">
                <button>Add meeting</button>
            </form>
        </section>
    </main>
</div>
</body>