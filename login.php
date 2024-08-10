<?php
require_once(__DIR__ . '/backend/variables.php');
$postData = $_POST;

if (isset($postData['email']) && isset($postData['password'])) {
    
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMesssage = "l'adresse email n'est pas valide";
       var_dump(filter_var(isset($postData['email']), FILTER_VALIDATE_EMAIL));
    } else {
        foreach ($users as $user) {
            if (
                $postData['email'] === $user['email']
                &&
                $postData['password'] === $user['password']
            ) {
                $loggedUser = [
                    'email' => $user['email']
                ];
               
            }

            if (!isset($loggedUser)) {
                $errorMesssage = "les informations envoyés ne vous permettent pas de vous identifier";
                
            }
        }
        echo  $errorMesssage;
    }
}
?>
<?php if (!isset($loggedUser)) : ?>
    <form action="index.php" method="POST">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
              <p><?php echo $errorMessage; ?></p>  
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
        Bonjour <?php echo $loggedUser['email'] ?> et bienvenue sur le site
    </div>
<?php endif ?>