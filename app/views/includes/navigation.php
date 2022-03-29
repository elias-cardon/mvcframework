<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Accueil</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/about">A propos</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/projects">Projets</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/posts">Blog</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/contact">Contact</a>
        </li>
        <li class="btn-login">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Déconnexion</a>
            <?php else : ?>
            <a href="<?php echo URLROOT; ?>/users/login">Connexion</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>