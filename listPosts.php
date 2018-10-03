?php $title = 'Mon blog';?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><h2>Derniers billets du blog :</h2></p>
 

<?php
while ($data = $posts->fetch())
{
?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($data['title']); ?>
        <em>le <?php echo htmlspecialchars($data['creation_date_fr']); ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($data['content']));
    ?>
    <br />
    <em><a href="index.php?action=post&id=<?php echo $data['id']; ?>">Commentaires</a></em>
    </p>
</div>

<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<?php //Ajouter un footer ici