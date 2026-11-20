<?php
require_once 'connexion.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO 1 (Ex 7) : Récupérer personne_id, poids et taille depuis $_POST
    $personne_id = (int) ($_POST['personne_id'] ?? 0);
    $poids = (float) ($_POST['poids'] ?? 0);
    $taille = (float) ($_POST['taille'] ?? 0);
 
    // TODO 2 (Ex 8) : Valider côté serveur que les champs ne sont pas vides et respectent les bornes
    // (personne_id > 0, 20 <= poids <= 300, 0.5 <= taille <= 2.5)
    if (
        $personne_id > 0 &&
        $poids >= 20 && $poids <= 300 &&
        $taille >= 0.5 && $taille <= 2.5
    ) {
 
    // TODO 3 (Ex 7) : Calculer $imc = round($poids / ($taille * $taille), 1) et déterminer $categorie
 $imc = round($poids / ($taille * $taille), 1);

        if ($imc < 18.5) {
            $categorie = 'Sous-poids';
        } elseif ($imc < 25) {
            $categorie = 'Normal';
        } elseif ($imc < 30) {
            $categorie = 'Surpoids';
        } else {
            $categorie = 'Obésité';
        }

    // TODO 4 (Ex 7 & 8) : Préparer et exécuter la requête INSERT INTO mesures (...)
     $stmt = $pdo->prepare(
            "INSERT INTO mesures (personne_id, poids, taille, imc, categorie)
             VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$personne_id, $poids, $taille, $imc, $categorie]);
    }
}
}
 
// TODO 5 (Ex 7) : Rediriger vers index.php avec header()
header('Location: index.php');
exit;
