<h1>A Propos de moi</h1>


<div id="aboutme">
  <div id="img">
    <figure><img src="libraries\public\images\writer.jpg" alt="Jean Forteroche" id="me"></figure>
  </div>
<div id="mydescription">
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend suscipit velit vitae dictum. 
    In ac odio eleifend, vestibulum mi ac, aliquam dui. Sed porta eros eget hendrerit condimentum. Cras massa libero, finibus ut metus a,
    condimentum bibendum lacus. Nullam varius odio iaculis magna tempor, ac venenatis mi auctor. Sed condimentum, purus id condimentum blandit,
    tortor mi molestie orci, nec viverra ipsum ex in nisl. Nullam vel tristique arcu, et dictum ante. Duis lacinia, mauris nec maximus ullamcorper,
    ipsum erat pharetra sem, id dapibus eros felis eu arcu. Curabitur nibh est, finibus a ipsum nec, aliquet fermentum nunc.</p>
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
    <div class="card mb-3">
      <h3 class="card-header">Card header</h3>
      <div class="card-body">
        <h5 class="card-title">Special title sample</h5>
        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
      </div>
      <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
    </div>
  <?php endfor ?>
</div>