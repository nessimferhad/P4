<?php

// CE FICHIER CONTIENT TOUTES LES FONCTIONS "ACTION" LIE AUX ARTICLES :
// INDEX => MONTRE LES ARTICLES
// INDEXADMIN => AFFICHE LA LISTE DES ARTICLES AINSI QUE LES COMMENTAIRES A MODERER DANS LA PAGE ADMIN
// SHOW => MONTRE 1 ARTICLE
// DELETE => SUPPRIME 1 ARTICLE
// INSERTNEWARTICLE => AJOUTE UN NOUVEL ARTICLE
// DISPLAYTOUPDATE => AFFICHE L'ARTICLE A METTRE A JOUR
// CONFIRMUPDATE => MET A JOUR L'ARTICLE

// Protected ModelName fait appel au model avec lequel on interagit
namespace Controllers;

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
        $pageTitle = "Accueil"; // variable pour determiner le title de la page

        \Renderer::render('articles/index', compact('pageTitle', 'articles', 'listarticles')); //compile et envoie les variables pagetitle articles et lisesarticle dans la page index
    }

    public function show()
    {

        //initiation des objets

        $commentModel = new \Models\Comment(); // appel du model Commentaire car on va avoir besoin d'afficher les commentaires liés a l'article en question 

        /*
    1. Récupération du param "id" et vérification de celui-ci
*/

        $article_id = null;

        // Si il y'en a un et que c'est un nombre entier, alors c'est ok
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        } else {
            // On affiche une erreur
            die("Vous devez préciser l'id de l'article dans l'URL !");
        }


        /*
    2. Récupération d'un article en question et controle si l'article existe ou non
*/

        $article = $this->model->find($article_id);
        if (!$article) {
            die("Cet article n'existe pas !");
        }

        /*
    3. Récupération des commentaires de l'article en question
*/
        $commentaires = $commentModel->findAllWithArticle($article_id);

        /*         
     4. On affiche 
*/
        $pageTitle = $article['title'];

        \Renderer::render("articles/show", compact('pageTitle', 'article', 'commentaires', 'article_id')); //compile et envoie les variables pagetitle articles commentaire et article_id dans la page show
    }

    public function delete()
    {
        // fonctionnalité admin, on check donc si la session admin est présente ou non 
        if ($_SESSION['id']) {

            /*
     1. On vérifie que le GET possède bien un paramètre "id" et que c'est bien un nombre
*/
            if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
                die("Ho ?! Tu n'as pas précisé l'id de l'article !");
            }

            $id = $_GET['id'];
        } else { 
            \Http::redirect("index.php"); // Sinon redirection vers l'index
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
     4. Redirection vers la page d'accueil de l'admin
*/
        \Http::redirect("index.php?controller=article&task=indexAdmin");
    }
    public function indexAdmin()
    {
        // fonctionnalité admin, on check donc si la session admin est présente ou non 
        //1. Récupération des articles et des commentaires pour l'admin

        if ($_SESSION['id']) {
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
        if ($_SESSION['id']) {
            $article_id = null;

            if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                $article_id = $_GET['id'];
            }
        } else {
            \Http::redirect("index.php");
        }

        $article = $this->model->find($article_id);

        $pageTitle = "modification de l'article : " . $article['title'];

        \Renderer::render('articles/updatepost', compact('article', 'pageTitle'));
    }

    public function confirmUpdate()
    {
        if ($_SESSION['id']) {

            if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
                die("Ho ! Fallait préciser le paramètre id en GET !");
            }

            $id = $_GET['id'];
        } else {
            \Http::redirect("index.php");
        }

        // Vérification de l'existence de l'article 

        $article = $this->model->find($id);
        if (!$article) {
            die("Aucun article n'a l'identifiant $id !");
        }

        $articleid = $article["id"];

        // Controle du formulaire

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

        // execution de la requete updateArticle depuis le model qui va mettre a jour l'article 
        $this->model->updateArticle($title, $introduction, $content, $articleid);

        \Http::redirect("index.php?controller=article&task=indexAdmin");
    }
}
