<?php

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

    // cria a instrução SQL que vai selecionar os dados
    $sql = "SELECT * FROM pessoa";
    // executa a query
    $result = $conn->query($sql);
   
    $num_reg = $result->num_rows;
 
    if($num_reg > 0){
        for($i = 0; $i < $num_reg; $i++ ){
            $row = $result->fetch_object();
            
            echo '<tr class="contato-item">
                    <td class="cpf_contato">'.$row->cpf_contato.'</td>
                    <td class="nome_contato">'.$row->nome_contato.'</td>
                    <td class="email">'.$row->email.'</td>
                    <td class="estado">'.$row->estado.'</td>
                    <td class="cidade">'.$row->cidade.'</td>
                    <td class="cep">'.$row->cep.'</td>
                    <td class="numero_residencial">'.$row->numero_residencial.'</td>
                    <td class="numero_telefone">'.$row->numero_telefone.'</td>
                    <td class="text-center">
                        <div class="contato-edit">
                            <i class="material-icons text-warning" data-toggle="tooltip" title="Editar">create</i>
                        </div>
                        <div>
                            <a href="removerContato.php?cpf_contato='.$row->cpf_contato.'">
                                <i class="material-icons text-danger" data-toggle="tooltip" title="Excluir">delete</i>
                            </a>
                        </div>
                    </td>

                </tr>';
        }
    }

    $conn->close();
    
?>