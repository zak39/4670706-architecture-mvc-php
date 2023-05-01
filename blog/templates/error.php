<?php $title = "Erreur sur le blog !"; ?>

<?php ob_start(); ?>

<h1>Erreur lors de votre requête !</h1>

<p><a href="index.php">Retour à la liste des billets</a></p>
<p><?= $error->getMessage(); ?></p>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>
