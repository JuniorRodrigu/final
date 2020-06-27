<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO distribuidora (filme, genero, tempo)
    VALUES (:filme, :genero, :tempo)");
    $stmt->bindParam(':filme', $filme);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':tempo', $tempo);

    $filme           = $_POST['filme'];
    $genero          = $_POST['genero'];
    $tempo        = $_POST['tempo'];

    $stmt->execute();


    echo "Filme cadastrada com sucesso!";
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: infil.php');
?> 