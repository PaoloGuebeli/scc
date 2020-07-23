<DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>view/style/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>view/style/menu.css">
    <link href="<?php echo URL ?>view/style/fontawesome/css/all.css" rel="stylesheet">
    <script src="<?php echo URL ?>view/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo URL ?>view/js/main.js" type="text/javascript"></script>
</head>
<body>
<nav class="main-menu">
    <ul>
        <li class="<?php if($page == "home"){ echo "active";} ?>">
            <a href="<?php echo URL ?>Home">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                    Home
                </span>
            </a>
        </li>
        <li class="has-subnav <?php if($page == "users"){ echo "active";} ?>">
            <a href="<?php echo URL ?>Users">
                <i class="fa fa-user fa-2x"></i>
                <span class="nav-text">
                    Utenti
                </span>
            </a>

        </li>
        <li id="events" class="has-subnav <?php if($page == "events"){ echo "active";} ?>">
            <a href="<?php echo URL ?>Events">
                <i class="fa fa-list fa-2x"></i>
                <span class="nav-text">
                    Eventi
                </span>
            </a>
        </li>
    </ul>

    <ul class="logout">
        <li id="settings" class="has-subnav">
            <a href="<?php echo URL ?>Settings">
                <i class="fa fa-cog fa-2x"></i>
                <span class="nav-text">
                    Impostazioni
                </span>
            </a>
        </li>
        <li>
            <a href="<?php echo URL ?>Login/logout">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    Logout
                </span>
            </a>
        </li>
    </ul>
</nav>