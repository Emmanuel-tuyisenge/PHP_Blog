<?php
$currentUser = $currentUser ?? false;
?>

<header>
    <a href="/" class="logo">Blog</a>
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