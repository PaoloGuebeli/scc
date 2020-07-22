<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ogani</title>
    <script src="<?php echo URL ?>libs/jquery.min.js" type="text/javascript"></script>
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
            background: #d24f56;
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
            background: #a21f36;
        }

        .form .message {
            margin: 15px 0 0;
            color: #a21f36;
            font-size: 16px;
        }

        .form .message a {
            color: #900f26;
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
            color: #900f26;
        }

        body {
            background: #a21f36;
            font-family: "Cairo", sans-serif;
        }
    </style>
</head>
<body>
<div class="login-page">
    <div class="form">
        <form class="login-form" action="<?php echo URL ?>Login/authenticate" method="post">
            <input type="text" placeholder="email" name="Email" id="email"/>
            <input type="password" placeholder="Password" name="pass"/>
            <input type="submit" class="button" value="ACCEDI">
            <p class="message"><a href="#" onclick="resetPassword()">Dimenticato la password?</a></p>
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
                    alert("È stata inviata un'email all'indirizzo email inserito.")
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