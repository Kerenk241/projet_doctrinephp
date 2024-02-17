<?php

// menu.php

// Inclure les fonctions définies dans votre fichier fonction.php
require_once "fonction.php";

// Logique du menu
do {
    echo "\nMenu :\n";
    echo "1. Créer un nouvel auteur et ses livres\n";
    echo "2. Afficher un auteur\n";
    echo "3. Modifier le titre d'un livre\n";
    echo "4. Supprimer un auteur avec tous ses livres\n";
    echo "5. Quitter\n";
    echo "Choix : ";
    $choix = trim(fgets(STDIN));

    switch ($choix) {
        case 1:
            creer($entityManager);
            break;
        case 2:
            echo "ID de l'auteur à afficher : ";
            $auteurId = trim(fgets(STDIN));
            afficher($entityManager, $auteurId);
            break;
        case 3:
            echo "ID du livre à modifier : ";
            $livreId = trim(fgets(STDIN));
            echo "Nouveau titre du livre : ";
            $nouveauTitre = trim(fgets(STDIN));
            modifier($entityManager, $livreId, $nouveauTitre); // Appel de la fonction modifier()
            break;
        case 4:
            echo "ID de l'auteur à supprimer : ";
            $auteurId = trim(fgets(STDIN));
            supprimer($entityManager, $auteurId); // Appel de la fonction supprimer()
            break;
        case 5:
            exit("Au revoir.\n");
        default:
            echo "Choix invalide.\n";
    }
} while (true);
