<?php
    $cpf = $_GET["cpf_contato"];

    
    // definições de host, database, usuário e senha
    $host = "localhost";
    $db   = "agenda";
    $user = "root";
    $pass = "";
    // conecta ao banco de dados
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    } 

    // cria a instrução SQL que vai remover os dados
    $sql = "DELETE FROM pessoa WHERE cpf_contato='$cpf'";
    
    // executa a query
    $conn->query($sql);
    
    $conn->close();

    header("Location: listaContatos.php");
?>