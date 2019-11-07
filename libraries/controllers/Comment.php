<?php
// L'autoload est required pour appeller les classes des models
// Protected ModelName fait appel au model avec lequel on interagit
// CE FICHIER CONTIENT TOUTES LES FONCTIONS "ACTION" LIE AUX COMMENTAIRES :
// INSERT => ajoute un commentaire
// DELETE => SUPPRIME 1 ARTICLE
// REPORT => signale un commentaire


namespace Controllers;

class Comment extends Controller
{
    //instencie le model Comment depuis le namespace Models
    protected $modelName = \Models\Comment::class;


    //insert un commentaire

    public function insert()
    {
        //instencie le model Article depuis le namespace Models
        $articleModel = new \Models\Article();

        
        //On vérifie que les données ont bien été envoyées en POST
        //Ensuite, on vérifie qu'elles ne sont pas nulles
        

        $author = null;
        if (!empty($_POST['author'])) {
            $author = htmlspecialchars($_POST['author']);              // Protection des données au cas ou l'utilisateur envoie du contenu malveillant
        }


        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);            // Protection des données au cas ou l'utilisateur envoie du contenu malveillant
        }

        // Enfin l'id de l'article
        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
            $article_id = $_POST['article_id'];
        }

        $report = 0; // variable pour compter le nombre de signalement de commentaires 


        // Vérification finale des infos envoyées
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article on affiche une erreur 
        if (!$author || !$article_id || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        //2. Vérification que l'id de l'article pointe bien vers un article qui existe

        $article = $articleModel->find($article_id);

        // Si l'id verifié n'existe pas on envoie une erreur
        if (!$article) {
            die("L'article $article_id n'existe pas !");
        }

        // 3. Insertion du commentaire
        $article = $this->model->insert($author, $content, $article_id, $report);

        // 4. Redirection vers l'article en question :

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }


    public function delete()
    {
        // fonctionnalité admin, on check donc si la session admin est présente ou non 
        if ($_SESSION['id']) {

            //1. Si la session est bien la : Récupération du paramètre "id" en GET

            if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
                die("Aucun id de commentaire n'a été trouvé !");
            }

            $id = $_GET['id'];
        } else { // Sinon redirection vers l'index
            \Http::redirect("index.php");
        }

        // 2. Vérification de l'existence du commentaire

        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        // 3. Suppression du commentaire
        // On récupère l'identifiant de l'article avant de supprimer le commentaire

        $article_id = $commentaire['article_id'];

        $this->model->delete($id);

        //5. Redirection vers l'article en question

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }
    public function report()
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) { // controle de l'id du commentaire dans l'url GET
            die("Aucun commentaire n'a été trouvé !");
        }

        $id = $_GET['id'];

        // 2. Vérification de l'existence du commentaire

        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        $commentid = $commentaire["id"];
        // 3. Suppression du commentaire
        // On récupère l'identifiant de l'article avant de supprimer le commentaire

        $article_id = $commentaire['article_id'];

        $this->model->report($commentid);

        //5. Redirection vers l'article en question

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }
}
