<?php
    //Conexão com bando de dados
    function connection(){
      

        $servername = "sql201.epizy.com";
        $username   = "epiz_25729957";
        $password   = "CIIDYVfBAq95";
        $db         = "epiz_25729957_loja";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexão realizada com sucesso!";
        return $conn;

        } catch(PDOException $e) {
        echo "Conexão falhou! Erro: " . $e->getMessage();
        }
    }
?> 