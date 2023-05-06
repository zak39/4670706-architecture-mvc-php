<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>

<h1>Le commentaire du super blog de l'AVBN !</h1>
<p><a href="index.php?action=post&id=<?= urlencode($comment->postId) ?>">Retour sur le billet</a></p>

<div class="news">
    <h3>
        Modification de son commentaire
    </h3>
    <form action="index.php?action=updateComment&id=<?= $comment->identifier ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" value="<?= htmlspecialchars($comment->author) ?>"/>
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"><?= htmlspecialchars($comment->comment) ?></textarea>
        </div>
        <div>
            <label for="date">date</label><br />
            <input type="text" id="date" name="date" value="<?= htmlspecialchars($comment->frenchCreationDate) ?>" disabled />
        </div>

        <input type="hidden" name="postId" value="<?= htmlspecialchars($comment->postId) ?>">
        <input type="submit" />
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
