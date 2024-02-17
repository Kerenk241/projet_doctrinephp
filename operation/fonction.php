<?php

require_once "../bootstrap.php";

require_once "menu.php";

require_once "../src/Entity/Livre.php";
require_once "../src/Entity/Auteur.php";

// Fonction pour créer un nouvel auteur et plusieurs livres associés à cet auteur
function creer($entityManager) {
    echo "Création d'un nouvel auteur :\n";
    echo "Nom de l'auteur : ";
    $nomAuteur = readline();
    echo "Prénom de l'auteur : ";
    $prenomAuteur = readline();

    // Créer un nouvel objet Auteur
    $auteur = new Auteur();
    $auteur->setNom($nomAuteur);
    $auteur->setPrenom($prenomAuteur);

    // Persist the author to the database
    $entityManager->persist($auteur);
    $entityManager->flush();

    echo "Auteur ajouté avec succès.\n";

    echo "Ajout de livres :\n";
    do {
        echo "Titre du livre (ou 'exit' pour quitter) : ";
        $titreLivre = readline();
        if ($titreLivre == 'exit') {
            break;
        }
        echo "Genre du livre : ";
        $genreLivre = readline();
        echo "Prix du livre : ";
        $prixLivre = readline();

        $livre = new Livre();
        $livre->setTitre($titreLivre);
        $livre->setGenre($genreLivre);
        $livre->setPrix($prixLivre);
        $livre->setAuteur($auteur);

        // Persist the book to the database
        $entityManager->persist($livre);
        $entityManager->flush();

        echo "Livre ajouté avec succès.\n";
    } while (true);
}


function afficher($entityManager, $auteurId) {
    $auteur = $entityManager->getRepository('Auteur')->find($auteurId);

    if (!$auteur) {
        echo "Auteur non trouvé.\n";
        return;
    }

    // Afficher les détails de l'auteur
    echo "Auteur : {$auteur->getNom()} {$auteur->getPrenom()}\n";
    echo "Livres :\n";

    // Récupérer tous les livres associés à cet auteur
    $livres = $auteur->getLivres();

    // Afficher les détails de chaque livre
    foreach ($livres as $livre) {
        echo " - Titre : {$livre->getTitre()}, Genre : {$livre->getGenre()}, Prix : {$livre->getPrix()}\n";
    }
}

function modifier($entityManager, $livreId, $nouveauTitre) {
    // Récupérer le livre à partir de l'ID
    $livre = $entityManager->find('Livre', $livreId);

    if ($livre === null) {
        echo "Livre non trouvé.\n";
        return;
    }

    // Modifier le titre du livre
    $livre->setTitre($nouveauTitre);

    // Enregistrer les modifications
    $entityManager->flush();

    echo "Titre du livre modifié avec succès.\n";
}


function supprimer($entityManager, $auteurId) {
    // Récupérer l'auteur à partir de l'ID
    $auteur = $entityManager->find('Auteur', $auteurId);

    if ($auteur === null) {
        echo "Auteur non trouvé.\n";
        return;
    }

    // Supprimer tous les livres associés à l'auteur
    foreach ($auteur->getLivres() as $livre) {
        $entityManager->remove($livre);
    }

    // Supprimer l'auteur lui-même
    $entityManager->remove($auteur);

    // Enregistrer les suppressions
    $entityManager->flush();

    echo "Auteur et ses livres supprimés avec succès.\n";
}

?>
