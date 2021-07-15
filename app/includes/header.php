<?php
$currentUser = $currentUser ?? false;
?>

<header>
    <a href="/" class="logo">Blog</a>
    <div class="header-mobile">
        <div class="header-mobile-icon">
            <img src="/public/img/mobile-menu.png" alt="menu burger">
        </div>
        <ul class="header-mobile-list">
            <?php if ($currentUser) : ?>
                <li class=<?= $_SERVER['REQUEST_URI'] === '/add_article.php' ? 'active' : '' ?>>
                    <a href="/add_article.php"> Ecrire un article</a>
                </li>
                <li class=<?= $_SERVER['REQUEST_URI'] === '/auth_logout.php' ? 'active' : '' ?>>
                    <a href="/auth_logout.php"> Déconnexion</a>
                </li>
                <li class="<?= $_SERVER['REQUEST_URI'] === '/profile.php' ? 'active' : '' ?>">
                    <a href="/profile.php">Mon espace</a>
                </li>
            <?php else : ?>
                <li class=<?= $_SERVER['REQUEST_URI'] === '/auth_register.php' ? 'active' : '' ?>>
                    <a href="/auth_register.php"> Inscription</a>
                </li>
                <li class=<?= $_SERVER['REQUEST_URI'] === '/auth_login.php' ? 'active' : '' ?>>
                    <a href="/auth_login.php"> Connexion</a>
                </li>

            <?php endif; ?>
        </ul>
    </div>
    <ul class="header-menu">
        <?php if ($currentUser) : ?>
            <li class=<?= $_SERVER['REQUEST_URI'] === '/add_article.php' ? 'active' : '' ?>>
                <a href="/add_article.php"> Ecrire un article</a>
            </li>
            <li class=<?= $_SERVER['REQUEST_URI'] === '/auth_logout.php' ? 'active' : '' ?>>
                <a href="/auth_logout.php"> Déconnexion</a>
            </li>
            <li class="<?= $_SERVER['REQUEST_URI'] === '/profile.php' ? 'active' : '' ?> header-profile">
                <a href="/profile.php"><?= $currentUser['firstname'][0] .  $currentUser['lastname'][0] ?></a>
            </li>
        <?php else : ?>
            <li class=<?= $_SERVER['REQUEST_URI'] === '/auth_register.php' ? 'active' : '' ?>>
                <a href="/auth_register.php"> Inscription</a>
            </li>
            <li class=<?= $_SERVER['REQUEST_URI'] === '/auth_login.php' ? 'active' : '' ?>>
                <a href="/auth_login.php"> Connexion</a>
            </li>

        <?php endif; ?>
    </ul>
</header>