<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    
<h2>Listagem de Vendedores</h2>

    <table border='1'>
    <tr><td><a href="ordena.php?param=idvendedor">ID</a></td>
    <td><a href="ordena.php">Nome</a></td>
    <td><a href="ordena.php?param=telefone">Telefone</a></td>
    <td>Ações</td></tr>

<?php
    $param = $_GET['param']??"nome";
    ordena($param);

function ordena($param){
    require_once 'conexao.php';
    $p = $param;

    try {
    $query = $db->query("SELECT * FROM vendedores ORDER BY $p");
    $query->execute();

    if ($query->rowCount() > 0):
        $res = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($res as $r){
            echo "<tr>";
            echo "<td>".$r->idvendedor."</td>";
            echo "<td>".$r->nome."</td>";
            echo "<td>".$r->telefone."</td>";
            echo "<td>Editar  |  Excluir</td>";
            echo "</tr>";
        }    
    else:
        echo "Dados não encontrados";
    endif;

    echo "</table>";
    echo "Total de registros: ".$query->rowCount();
    } catch(PDOException $e){
        echo "Falha na consulta ". $e->getMessage();
    }
}

echo "<hr><a href='index.php'<h4>Voltar</h4></a>";

?>
</body>
</html>