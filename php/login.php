<?php
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $host = "localhost";
    $db = "agenda";
    $user = "root";
    $pass = "";

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");

    if($conn->connect_error){
        die("Falha na conexão: " .$conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE 
        usuario=\"$usuario\" AND senha=\"$senha\"";
    
    $result = $conn->query($sql);

    $nome = "";

    if($result->num_rows > 0){
        $row = $result->fetch_object();
        setcookie("id_usuario", $row->id);
        setcookie("nome_usuario", $row->usuario);
        setcookie("senha_usuario", $row->senha);
        setcookie("nome", $row->nome);
        header("Location: listaContatos.php");
    }else{
		header("Location: ../login.html");
    }

    $conn->close();

?>