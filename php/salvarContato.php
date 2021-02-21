<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    $cpf = $_POST["cpf_contato"];
    $nome_contato = $_POST["nome_contato"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $cep = $_POST["cep"];
    $numero_residencial = $_POST["numero_residencial"];
    $email = $_POST["email"];
    $numero_telefone = $_POST["numero_telefone"];
    $modo = $_POST["modo"];
        
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

    if($modo == 0){

        // cria a instrução SQL que vai inserir os dados
        $sql = "INSERT INTO pessoa (cpf_contato, email, nome_contato, cep, cidade, estado, numero_residencial, numero_telefone) VALUES 
            ('$cpf', '$email', '$nome_contato', '$cep', '$cidade', '$estado', '$numero_residencial', '$numero_telefone')";
    
        // executa a query
        $conn->query($sql);
    }else{
        $sql = "UPDATE pessoa SET nome_contato='$nome_contato', email='$email', cep='$cep', cidade='$cidade', estado='$estado', numero_residencial='$numero_residencial', numero_telefone='$numero_telefone' WHERE cpf_contato='$cpf'";
        
        $conn->query($sql); 
    }
    
    $conn->close();
    
    header("Location: listaContatos.php");
?>