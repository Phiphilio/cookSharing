<!-- Ce fichier ne doit PAS appeler session_start() car il est inclus dans index.php
si un fichier qui appelle sessions start en inclus un autre, la superglobale
$_SESSION est automatiquement présente dans ce fichier inclus.
dans le cas contraire, je dois appeler session_start() 
-->

<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
    <form action="submit_login.php" method="POST">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($_SESSION['ERROR_MESSAGE'])) : ?>
            <div class="alert alert-danger" role="alert">
                <p><?php echo $_SESSION['ERROR_MESSAGE'];
                    unset($_SESSION['ERROR_MESSAGE']) ?></p>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
            <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <!-- Si utilisateur/trice bien connectée on affiche un message de succès -->
<?php else : ?>
    <div>
        Bonjour <?php echo $_SESSION['LOGGED_USER']['email'] ?> et bienvenue sur le site !!!
    </div>
<?php endif ?>
