<?php 

class ControllerCompte extends Controller {

    public function __construct(\Twig\Environment $twig, \Twig\Loader\FileSystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    public function afficher() {
        echo "afficher compte";
    }

    public function lister() {
        $pdo = Bd::getInstance()->getPdo();

        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $twig = new \Twig\Environment($loader);

        $managerActualite = new ActualiteDao($this->getPdo());
        $actualite = $managerActualite->findAll();

        // Rendre le template Twig
        echo $this->getTwig()->render('compte.html.twig', [
            'title' => 'Compte',
            'actualites' => $actualite
        ]);
    }   
}