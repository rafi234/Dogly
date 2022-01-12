<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>

        <div class="center-line">
            <hr>
        </div>

        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php
                        if(isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <input name="login" type="text" placeholder="login">
                <input name="password" type="password" placeholder="password">
                <button class="login-button" type="submit">sign in</button>
                <a href="http://localhost:8080/registration" class="login-buttons">register</a>
            </form>
        </div>

    </div>
</body>