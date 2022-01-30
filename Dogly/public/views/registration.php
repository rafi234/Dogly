<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Registration</title>
</head>
<body>
<div class="registration-container">
    <div class="logo">
        <img src="public/img/logo.svg">
    </div>

    <div class="registration">
        <form action="registration" method="POST">
            <div class="messages">
                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="password" name="passwordConfirmation" placeholder="confirm password">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="surname" placeholder="surname">
            <input type="tel" name="phone_number" placeholder="phone number">
            <input type="text" name="country" placeholder="country">
            <input type="text" name="street" placeholder="street">
            <input type="text" name="postal_code" placeholder=" postal code">
            <button type="submit">register</button>
        </form>
    </div>
</div>
</body>
