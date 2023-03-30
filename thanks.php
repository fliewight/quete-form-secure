<?php

$errors = [];

if (!isset($_POST['name']) || empty($_POST['name'])) $errors[] = 'Champ "Nom" manquant';
elseif (!isset($_POST['courriel']) || empty($_POST['courriel'])) $errors[] = 'Champ "Adresse e-mail" manquant';
elseif (!isset($_POST['phone']) || empty($_POST['phone'])) $errors[] = 'Champ "Numéro de téléphone" manquant';
elseif (!isset($_POST['subject']) || empty($_POST['subject'])) $errors[] = 'Champ "Sujet" manquant';
elseif (!isset($_POST['message']) || empty($_POST['message'])) $errors[] = 'Champ "Message" manquant';

if (empty($errors))
{
    $name = $_POST['name'];
    $courriel = $_POST['courriel'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $response = array_map('trim', $_POST);
    $response = array_map('htmlentities', $_POST);

    echo "
        Merci ".$response['name']." de nous avoir contacté à propos de \"".$response['subject']."\"<br><br>
        Un de nos conseillers vous contactera soit à l’adresse ".$response['courriel']." ou par téléphone au ".$response['phone']." dans les plus brefs délais pour traiter votre demande :<br><br>
        ".$response['message']."
    ";
}
else
{
    ?><div>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php
}