<script src="https://cdn.tiny.cloud/1/7xuyejnaxx0g28iq3k1hfplabnlccbu0228ofe0c4rv0ow2b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    content_style: 'div { margin: 10px; border: 5px solid red; padding: 3px; width: 1000; height: 700; }',
    selector: 'textarea'
  });
</script>

<div class="newarticle">
  <h2 class="h2admin">Créer un nouvel article</h2>
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
      <textarea name="articlecontent" rows="15"></textarea>
      <input type="submit" value="Poster l'article" class="btn btn-primary btn-sm">
    </label>
  </form>
</div>