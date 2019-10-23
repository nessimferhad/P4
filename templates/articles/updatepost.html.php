<script src="https://cdn.tiny.cloud/1/7xuyejnaxx0g28iq3k1hfplabnlccbu0228ofe0c4rv0ow2b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        width : 1000,
        height : 700,
        selector: 'textarea' // change this value according to your HTML
      });
    </script>


<div class="newarticle">
          <h2 class="h2admin">Creer un nouvel article</h2>
          <form action="index.php?controller=article&task=confirmUpdate&id=<?=$article["id"]?>" method="post" class="formarticle">
            <label>
              Titre de l'article : <br />
              <input type="text" name="title" value="<?=$article['title']?>">
            </label>
            <label>
              Introduction de l'article : <br />
              <input type="text" name="introduction" value="<?=$article['introduction']?>">
            </label>
            <label>
              Contenu de l'article : <br />
              <textarea name="articlecontent" >"<?=$article['content']?>"</textarea>
              <input type="submit" value="Poster l'article" class="btn btn-primary btn-sm">
            </label>
          </form>
        </div>