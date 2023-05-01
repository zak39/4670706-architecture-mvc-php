<?php

require_once('src/controllers/add_comment.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
    
                post($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                addComment($identifier, $_POST);
            } else {
                throw new Exception('Erreur : aucun identifiant de billet renvoyé');
            }
        } else {
            throw new Exception('La page que vous recherchez n\'existe pas.');
        }
    } else {
        homepage();
    }
} catch (Exception $error) {
    require('templates/error.php');
}
