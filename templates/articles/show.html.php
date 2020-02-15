 <div id="articlecontent">
     <h1><?= $article['title'] ?></h1>
     <p><?= $article['introduction'] ?></p>
     <hr>
     <?= $article['content'] ?>
     <small>Ecrit le <?= $article['created_at'] ?></small>
 </div>
 <div id="comments">
     <?php if (count($commentaires) === 0) : ?>
         <h2>Il n'y a pas encore de commentaires pour cet article.</h2>
     <?php else : ?>
         <h2>Il y a déjà <?= count($commentaires) ?> réaction(s) : </h2>
         <?php foreach ($commentaires as $commentaire) : ?>
             <div id="commentscontent">
                 <h3>Commentaire de <?= $commentaire['author'] ?></h3>
                 <small>Le <?= $commentaire['created_at'] ?></small>
                 <blockquote>
                     <em><?= $commentaire['content'] ?></em>
                 </blockquote>
                 <?php if (isset($_SESSION['id'])) : ?>
                 <span id="reported">nombre de signalements : <?= $commentaire['report'] ?> <span>
                 <a class="deletecomment" href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
                 <?php endif?>
                 <a href="index.php?controller=comment&task=report&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir signaler ce commentaire ?!`)">Signaler</a>
             </div>
         <?php endforeach ?>
     <?php endif ?>
     <div id="postcomments">
         <form action="index.php?controller=comment&task=insert" method="POST">
             <h3>Vous voulez réagir ? N'hésitez pas à poster un commentaire !</h3>
             <input type="text" id="authorcomment" name="author" placeholder="Votre pseudo !" required>
             <textarea required name="content" id="" rows="15" placeholder="Votre commentaire ..."></textarea>
             <input type="hidden" name="article_id" value="<?= $article_id ?>">
             <button>Commenter !</button>
         </form>
     </div>
 </div>

