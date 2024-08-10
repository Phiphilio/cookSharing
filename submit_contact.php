<?php
//on vérifie si le fichier est envoyé et qu'il n'y a pas 'erreur
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === 0) { 

    //vérifions si l'envoie est trop volumineux
    if ($_FILES['screenshot']['size'] > 1000000) {
        echo "l'envoie n'a pas pu se faire";
        return;
    }

    $isFileLoaded = false;// c'est la pour l'affichage du message quand le fichier sera envoyé

//on utilise la fonction pathinfo pour stocker des infos dont l'extension du fichier
$filesInfo = pathinfo($_FILES['screenshot']['name']);

//on stocke cette extension dans une variable
$extension = $filesInfo['extension'];

//on crée un tableau qui contient les extensions souhaitées
$allowedExtension = ['jpg', 'jpeg', 'gif', 'png'];

if (!in_array($extension, $allowedExtension)) {
    echo "l'envoie n'a pas pu être effectué. les fichiers {$extension} ne sont pas autorisés.";
    return;
}
//on stocke le chemin vers le dossier où seront upload les fichiers
$path = __DIR__ . "/uploads/";

//on vérifie si le chemin existe réellement
if (!is_dir($path)) {
    echo $path;
    echo "l'envoi n'a pas pu être effectué, le dossier uploads est manquant";
    return;
}

// On peut valider le fichier et le stocker définitivement
move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name']));
$isFileLoaded = true;
}
?>
<?php
/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if (
    !isset($postData['email'])
    || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL) // filtre une variable avec un filtre spécifié. FILTER_VALIDATE_EMAIL est un filtre qui valide si la variable est une adresse email valide.
    || empty($postData['message']) // Une variable est considérée comme vide si elle n'existe pas ou si sa valeur est false, 0, '', null, ou une chaîne vide.
    || trim($postData['message']) === ''
) {
    echo ('Il faut un email et un message valides pour soumettre le formulaire.');
    return;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Contact reçu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Message bien reçu !</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Email</b> : <?php echo ($postData['email']); ?></p>
                <p class="card-text"><b>Message</b> : <?php echo (strip_tags($postData['message'])); ?></p>
            </div>

            <?php if($isFileLoaded) : ?>
                <div class="alert alert-success" role="alert">
                        L'envoi a bien été effectué !
                    </div>
                <?php endif; ?>
        </div>
</body>

</html>