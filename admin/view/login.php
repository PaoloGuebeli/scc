<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ogani</title>
    <script src="<?php echo URL ?>view/js/jquery.min.js" type="text/javascript"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input[type="text"], input[type="password"] {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form .button {
            text-transform: uppercase;
            outline: 0;
            background: #3499ff;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form .button:hover, .form .button:active, .form .button:focus {
            background: #2388dd;
        }

        .form .message {
            margin: 15px 0 0;
            color: #2388dd;
            font-size: 16px;
        }

        .form .message a {
            color: #1266aa;
            text-decoration: none;
        }

        .form .register-form {
            display: none;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }

        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }

        .container .info {
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }

        .container .info span {
            color: #4d4d4d;
            font-size: larger;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #1266aa;
        }

        body {
            background: #2388dd;
            font-family: "Cairo", sans-serif;
        }
    </style>
</head>
<body>
<div class="login-page">
    <div class="form">
        <img src="<?php echo URL ?>resources/img/scc_logo.png" width="150px" height="150px">
        <form class="login-form" action="<?php echo URL ?>Login/authenticate" method="post">
            <input type="text" placeholder="Email" name="email" id="email"/>
            <input type="password" placeholder="Password" name="pass" id="pass"/>
            <input type="text" placeholder="Codice" name="code" style="display: none" id="code"/>
            <input type="submit" class="button" value="ACCEDI" id="submit">
            <p class="message"><a href="#" onclick="resetPassword()">Dimenticato la password?</a></p>
            <p class="message"><a href="#" onclick="activateAccount()">Attiva Account</a></p>
            <p class="message" id="error"><?php if (isset($return)) echo $return['message'] ?></p>
        </form>
    </div>
</div>
</body>

<script>

    function resetPassword() {

        var email = $('#email').val();

        var request = $.ajax({
            url: "<?php echo URL ?>Login/resetPassword",
            type: "post",
            data: {'email': email}
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            if (response !== "null") {
                var message = JSON.parse(response);
                if(message[0]) {
                    $('#email').attr('type','password').attr('placeholder','Nuova Password').val('');
                    $('#pass').attr('placeholder','Ripeti Password');
                    $('#code').show();
                    $('#submit').attr('type','button').attr('onclick','setPassword()');
                    alert("È stata inviata un'email all'indirizzo email inserito.");
                }else{
                    $('#error').html(message);
                }
            }
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });


    }

    function activateAccount() {

        var email = $('#email').val();

        var request = $.ajax({
            url: "<?php echo URL ?>Login/activate",
            type: "post",
            data: {'email': email}
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            if (response !== "null") {
                var message = JSON.parse(response);
                if(message[0]) {
                    $('#email').attr('type','password').attr('placeholder','Nuova Password').val('');
                    $('#pass').attr('placeholder','Ripeti Password');
                    $('#code').show();
                    $('#submit').attr('type','button').attr('onclick','setPassword()');
                    alert("È stata inviata un'email all'indirizzo email inserito.");
                }else{
                    $('#error').html(message);
                }
            }
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    }

    function setPassword() {

        var pass = $('#email').val();
        var rpass = $('#pass').val();
        var code = $('#code').val();

        var request = $.ajax({
            url: "<?php echo URL ?>Login/setNewPassword",
            type: "post",
            data: {'code':code, 'pass':pass, 'rpass':rpass}
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            if (response !== "null") {
                var message = JSON.parse(response);
                if(message[0]) {
                    $('#email').attr('type','text').attr('placeholder','E-mail').val('');
                    $('#pass').attr('placeholder','Password');
                    $('#code').hide();
                    $('#submit').attr('type','submit').attr('onclick','');
                    alert("La password è stata impostata con successo.")
                }else{
                    $('#error').html(message);
                }
            }
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    }
</script>

</html>