<?php require __DIR__ . '/../config/bootstrap.php';?>

<link href="../style/reset.css" rel="stylesheet">
<link href="../style/style.css" rel="stylesheet">


<header>
    <ul class="nav">
            <li >
                <img src="../assets/img/logo.png" alt="logo" class="logo" >
            </li>
        <?php if (isLoggedIn()): ?>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Wiki
                </a>
            </li>
            <li class="nav-item">
                <a href="blog.php" class="nav-link">
                    Feed
                </a>
            </li>
            <li class="nav-item">
                <a href=".#" class="nav-link button__discover">
                    Discover
                </a>
            </li>
            <li class="nav-item">
                <a href="../login/login.php?logout" class="nav-link">
                    Logout
                </a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a href="./login/inscription.php" class="nav-link">
                    Subscribe
                </a>
            </li>
            <li class="nav-item">
                <a href="./login/login.php" class="nav-link">
                    Connect
                </a>
            </li>
        <?php endif; ?>
    </ul>
</header>