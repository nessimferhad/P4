    <script src="https://cdn.tiny.cloud/1/7xuyejnaxx0g28iq3k1hfplabnlccbu0228ofe0c4rv0ow2b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        width : 1000,
        height : 700,
        selector: 'textarea' // change this value according to your HTML
      });
    </script>


    <?php


    $hash = '$2y$10$NwKImCMVZdop5s2hH8Rd3uSaWC5Fos2BVEbqvYpPc9vUoBeBsUt0q';

    if (isset($_POST['adminaccess'])) {
      $password = $_POST['adminaccess'];
      if (password_verify($password, $hash)) { ?>
        <h2 class="h2admin">Gestion des articles</h2>
        <?php foreach ($articles as $article) : ?>
          <div class='article <?= $article["id"] ?>' id="adminarticle">
            <h2><?= $article['title'] ?></h2>
            <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
            <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer l'article</a>
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


        <?php
            //echo $commentaires;
            ?>
        <div class="newarticle">
          <h2 class="h2admin">Creer un nouvel article</h2>
          <form action="index.php?controller=article&task=insertNewArticle" method="post" class="formarticle">
            <label>
              Titre de l'article : <br />
              <input type="text" name="title">
            </label>
            <label>
              Introduction de l'article : <br />
              <input type="text" name="introduction">
            </label>
            <label>
              Contenu de l'article : <br />
              <textarea name="articlecontent"></textarea>
              <input type="submit" value="Poster l'article" class="btn btn-primary btn-sm">
            </label>
          </form>
        </div>
    <?php } else {
        echo 'MOT DE PASSE ERRONE';
      }
    } ?>
    </body>

    </html>