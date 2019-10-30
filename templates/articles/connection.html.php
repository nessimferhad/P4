<div class="jumbotron">
    <h1 class="display-20">Se connecter a l'administration</h1>
    <form class="form-inline my-2 my-lg-0" method="post">
        <label>
            Entrez le mot de passe : 
            <input class="form-control mr-sm-2" type="password" name="adminaccess">
        </label>
        <button class="btn btn-primary btn-lg" type="submit"> Envoyer</button>
    </form>
</div>


<?php


if (isset($_POST["adminaccess"])) {

    $checkpassword = password_verify($_POST["adminaccess"], $user['password']);

    if ($checkpassword) {
        session_start();
        $_SESSION['id'] = $user['id'];
        \Http::redirect("index.php?controller=article&task=indexAdmin");
    } else {
        \Http::redirect("index.php?");
    }
}


?>

<?php /*endif*/ ?>