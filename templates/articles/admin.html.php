<h2 class="h2admin">Gestion des articles</h2>
<?php foreach ($articles as $article) : ?>
  <div class='article <?= $article["id"] ?>' id="adminarticle">
    <h2><?= $article['title'] ?></h2>
    <ul class="adminactions">
      <li><a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire l'article</a></li>
      <li><a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer l'article</a></li>
      <li><a href="index.php?controller=article&task=displayArticleToUpdate&id=<?= $article['id'] ?>">Modifier l'article</a></li>
    </ul>
  </div>
<?php endforeach ?>
<h2 class="h2admin">Gestion des commentaires</h2>
<?php foreach ($commentaires as $commentaire) : ?>
  <div class='article <?= $article["id"] ?>' id="adminarticle">
    <h2><?= $commentaire['author'] ?></h2>
    <p><?= $commentaire['content'] ?></p>
    <p>nombre de signalements : <?= $commentaire["report"] ?></p>
    <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer ce commentaire ?!`)">Supprimer le commentaire</a>
  </div>
<?php endforeach ?>
<div id="adminarticle">
  <a href="index.php?controller=article&task=addnewarticle"><button type="button" class="btn btn-primary">Ajoutez un nouvel article</button></a>
</div>
<?php
?>

<!--  end html -->




</body>

</html>