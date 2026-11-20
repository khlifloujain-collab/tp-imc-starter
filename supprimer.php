<?php
require_once 'connexion.php';
 
// TODO 1 (Ex 7) : Vérifier si $_GET['id'] existe et est un entier valide
 $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id !== false && $id !== null && $id > 0) {
// TODO 2 (Ex 7 & 8) : Préparer et exécuter la requête DELETE FROM mesures WHERE id = :id
 $stmt = $pdo->prepare("DELETE FROM mesures WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
// TODO 3 (Ex 7) : Rediriger vers index.php avec header()
header('Location: index.php');
exit;
