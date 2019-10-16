    <script src="https://cdn.tiny.cloud/1/7xuyejnaxx0g28iq3k1hfplabnlccbu0228ofe0c4rv0ow2b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea' // change this value according to your HTML
        });
    </script>


<?php


$hash = '$2y$10$NwKImCMVZdop5s2hH8Rd3uSaWC5Fos2BVEbqvYpPc9vUoBeBsUt0q';

if (isset($_POST['adminaccess'])) {
    $password = $_POST['adminaccess'];
    if (password_verify($password, $hash)) { ?>   

<?php foreach ($articles as $article) : ?>
  <div class='article <?= $article["id"] ?>' id="article">
    <h2><?= $article['title'] ?></h2>
    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
    <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
  </div>
<?php endforeach ?>

            <form action="" method="post">
                <textarea></textarea>
                <input type="submit" value="Poster l'article">
            </form>
        
<?php } else {
        echo 'MOT DE PASSE ERRONE';
    }
} ?>
</body>
</html>

