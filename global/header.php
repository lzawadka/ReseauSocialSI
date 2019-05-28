<?php require_once 'function.php';?>
<header>
    <ul class="nav">
        

        <?php if (isLoggedIn()): ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <?php echo getUserInfo(); ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="../login/login.php?logout" class="nav-link">
                    Déconnexion
                </a>
            </li>
            <?php if(getUserInfo('type') === 'pseudo'): ?>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        Back-Office
                    </a>
                </li>
            <?php endif; ?>

        <?php else: ?>
            <li class="nav-item">
                <a href="../login/inscription.php" class="nav-link">
                    Inscription
                </a>
            </li>
            <li class="nav-item">
                <a href="../login/login.php" class="nav-link">
                    Connexion
                </a>
            </li>
        <?php endif; ?>
    </ul>
</header>