<?php

// CE FICHIER CONTIENT TOUTES LES FONCTIONS "ACTION" LIE AUX ARTICLES :
// INDEX => MONTRE LES ARTICLES
// SHOW => MONTRE 1 ARTICLE
// DELETE => SUPPRIME 1 ARTICLE

namespace Controllers;

require_once('libraries/autoload.php');

class Article extends Controller
{
    protected $modelName = \Models\Article::class;

    public function index()
    {
        //1. Récupération des articles

        $articles = $this->model->findAll("created_at DESC LIMIT 3");
        $listarticles = $this->model->findAll("created_at DESC");


        /*
     2. Affichage
*/
        $pageTitle = "Accueil";

        \Renderer::render('articles/index', compact('pageTitle', 'articles', 'listarticles'));
    }

    public function show()
    {

        //initiation des objets

        $commentModel = new \Models\Comment();

        /*
    1. Récupération du param "id" et vérification de celui-ci
*/
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }
        /*
    2. Récupération d'un article en question
*/

        $article = $this->model->find($article_id);


        /*
    3. Récupération des commentaires de l'article en question
*/
        $commentaires = $commentModel->findAllWithArticle($article_id);

        /*         
     4. On affiche 
*/
        $pageTitle = $article['title'];

        \Renderer::render("articles/show", compact('pageTitle', 'article', 'commentaires', 'article_id'));
    }

    public function delete()
    {

        if($_SESSION['id']) {

        /*
     1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
*/
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

    } else {
        \Http::redirect("index.php");
    }

        /*
     2. Vérification que l'article existe bel et bien
*/
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /*
     3. Suppression de l'article
*/
        $this->model->delete($id);
        /*
     4. Redirection vers la page d'accueil
*/
        \Http::redirect("index.php?controller=article&task=indexAdmin");
    }
    public function indexAdmin()
    {
        //1. Récupération des articles et des commentaires pour l'admin

        if($_SESSION['id']) {
            $commentModel = new \Models\Comment();
            $commentaires = $commentModel->findReported();
            $articles = $this->model->findAll("created_at DESC");
        } else {
            \Http::redirect("index.php");
        }

        /*
     2. Affichage
*/
        $pageTitle = "Accueil Admin";

        \Renderer::render('articles/admin', compact('pageTitle', 'articles', 'commentaires'));
    }

    public function insertNewArticle()
    {

        $title = null;
        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
        }

        $introduction = null;
        if (!empty($_POST['introduction'])) {
            $introduction = $_POST['introduction'];
        }

        $content = null;
        if (!empty($_POST['articlecontent'])) {
            $content = $_POST['articlecontent'];
        }

        if (!$title || !$introduction || !$content) {
            die("Certains champ de votre article ont été mal rempli !");
        }

        $this->model->insertArticle($title, $introduction, $content);

        \Http::redirect("index.php?controller=article&task=indexAdmin");
    }

    public function displayArticleToUpdate()
    {

        $article_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        $article = $this->model->find($article_id);

        \Renderer::render('articles/updatepost', compact('article'));
    }

    public function confirmUpdate()
    {

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        // 2. Vérification de l'existence du commentaire

        $article = $this->model->find($id);
        if (!$article) {
            die("Aucun article n'a l'identifiant $id !");
        }

        $articleid = $article["id"];

        $title = null;
        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
        }

        $introduction = null;
        if (!empty($_POST['introduction'])) {
            $introduction = $_POST['introduction'];
        }

        $content = null;
        if (!empty($_POST['articlecontent'])) {
            $content = $_POST['articlecontent'];
        }

        if (!$title || !$introduction || !$content) {
            die("Certains champ de votre article ont été mal rempli !");
        }

        $this->model->updateArticle($title, $introduction, $content, $articleid);

        \Http::redirect("index.php?controller=article&task=indexAdmin");
    }
}
