<h1>A Propos de moi</h1>


<div id="aboutme">
  <div id="img">
    <figure><img src="libraries\public\images\writer.jpg" alt="Jean Forteroche" id="me"></figure>
  </div>
  <div id="mydescription">
    <p>je suis né le 20 octobre 1975 à Marseille, dans une petite cité marseillaise où j'ai passer la plus grande partie de son enfance. 
      A l'âge de 27 ans j'ai décidé de me lancer dans l'aventure de l'écriture, mais depuis toutes ces années mon rêve etait le voyage...
      J'ai donc prit mon courage à deux mains et je me suis lancé direction l'Alaska pour commencer mon premier roman du longue série.
      Celui-ci ce nomme : <strong>Billet pour l'Alaska</strong></p>
</div>
</div>



<h1>Mes chapitres les plus récents</h1>

<?php foreach ($articles as $article) : ?>
  <div class='article <?= $article["id"] ?>' id="article">
    <h2><?= $article['title'] ?></h2>
    <small>Ecrit le <?= $article['created_at'] ?></small>
    <p><?= $article['introduction'] ?></p>
    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
    <!--<a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>-->
  </div>
<?php endforeach ?>



<div class="btn-group col-3" role="group" aria-label="Button group with nested dropdown">
  <button type="button" class="btn btn-primary">Accedez à l'article de votre choix</button>
  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <?php foreach ($listarticles as $listarticle) : ?>
        <a class="dropdown-item" href="index.php?controller=article&task=show&id=<?= $listarticle['id'] ?>"><?= $listarticle["title"] ?></a>
      <?php endforeach ?>
    </div>
  </div>
</div>

<div id="testdiv">
  <?php
  for ($i = 0; $i < 3; $i++) : ?>
    <div class="card mb-3 card<?= $i ?>">
      <h3 class="card-header" id="card-header<?= $i ?>"></h3>
      <div class="card-body">
        <h5 class="card-title" id="card-title<?= $i ?>"></h5>
      </div>
      <img id="card-image<?= $i ?>" style="height: 230px; width: 100%; display: block;" alt="Card image">
      <div class="card-body card-body<?= $i ?>">
        <p class="card-text" id="card-text<?= $i ?>"></p>
        <a id="card-link<?= $i ?>" href="#"></a>
      </div>
    </div>
  <?php endfor ?>
</div>
<script src="libraries\public\js\Cards.js"></script>