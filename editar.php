<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE distribuidora SET filme=:filme, genero=:genero, 
    tempo=:tempo WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':filme', $filme);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':tempo', $tempo);

    $id             = $_GET['id'];
    $filme          = $_POST['filme'];
    $genero          = $_POST['genero'];
    $tempo        = $_POST['tempo'];

    $stmt->execute();


    echo "filme atualizada com sucesso!<br>";
    echo $id;
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: infil.php');
?> 