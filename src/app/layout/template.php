<?php

use wimmelsoft\core\Application;

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello World!</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/users">Users</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="jumbotron">
    <h1 class="display-3"><?php echo Application::$app->session->get('applicationName'); ?></h1>
    <p class="lead">Inholland API is an application to demonstrate routing in PHP.</p>
    <?php $user = Application::$app->session->get('user');
    echo ($user) ? "Welcome $user" :"No user logged in"; ?>
</div>



</div>

<div class="container-fluid">
{{content}}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>
