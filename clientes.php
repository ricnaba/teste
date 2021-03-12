<?php

require_once 'conexao.php';
echo "<h2>Listagem de Clientes</h2>";

try {
//consulta ao banco
$query = $db->query("SELECT * FROM clientes");
$query->execute();
//exibindo dados
echo "<table border='1'>
    <tr><td>ID</td>
    <td>Empresa</td>
    <td>Contato</td>
    <td>Endereço</td>
    <td>Cidade</td>
    <td>CEP</td>
    <td>País</td>
    <td>Ações</td></tr>";
//verifica se existem dados
if ($query->rowCount() > 0):
    //obtendo o retorno por objeto
    $res = $query->fetchAll(PDO::FETCH_OBJ);
    //populando a tabela
    foreach ($res as $r){
        echo "<tr>";
        echo "<td>".$r->idcliente."</td>";
        echo "<td>".$r->empresa."</td>";
        echo "<td>".$r->contato."</td>";
        echo "<td>".$r->endereco."</td>";
        echo "<td>".$r->cidade."</td>";
        echo "<td>".$r->cep."</td>";
        echo "<td>".$r->pais."</td>";
        echo "<td>Editar  |  Excluir</td>";
        echo "</tr>";
    }
else:
    echo "Dados não encontrados";
endif;
echo "</table>";
echo "Total de registros: ".$query->rowCount();
}
catch(PDOException $e){
    echo "Falha na consulta ". $e->getMessage();
}

echo "<hr><a href='index.php'<h4>Voltar</h4></a>";