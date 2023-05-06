<?php

namespace Application\Controllers\Comment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository;

class Comment
{

    public function show(string $id)
    {
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($id);

        require('templates/getComment.php');
    }


    public function update(string $id, array $input) {
        if ($id === null && gettype($id) !== 'string') {
            throw new \Exception('Impossible de récupérer l\'identifiant du commentaire. Impossible de modifier.');
        }

        if (empty($input)) {
            throw new \Exception('Les données du formulaire sont invalides. Impossible de modifier.');
        }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();

        $success = $commentRepository->updateComment($id, $input);

        if (!$success) {
            throw new \Exception('Imposible de modifier le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $input['postId']);
        }
    }

    public function create(string $post, array $input)
    {
        $author = null;
        $comment = null;
        if (!empty($input['author']) && !empty($input['comment'])) {
            $author = $input['author'];
            $comment = $input['comment'];
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post, $author, $comment);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $post);
        }
    }
}
