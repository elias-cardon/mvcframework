<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Inscription</h2>

        <form action="<?php echo URLROOT; ?>/users/register" method="POST">
            <input type="text" placeholder="Pseudonyme *" name="username">
            <span class="invalideFeedback">
                <?php echo $data['usernameError'];?>
            </span>

            <input type="email" placeholder="Adresse email *" name="email">
            <span class="invalideFeedback">
                <?php echo $data['emailError'];?>
            </span>

            <input type="password" placeholder="Mot de passe *" name="password">
            <span class="invalideFeedback">
                <?php echo $data['passwordError'];?>
            </span>

            <input type="password" placeholder="Confirmez le mot de passe *" name="confirmPassword">
            <span class="invalideFeedback">
                <?php echo $data['confirmPasswordError'];?>
            </span>

            <button id="submit" type="submit" value="submit">Connexion</button>

            <p class="options">
                Pas encore inscrit ? <a href="<?php echo URLROOT;?>/users/register">S'inscrire</a>.
            </p>
        </form>
    </div>
</div>
