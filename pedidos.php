<?php

require_once 'conexao.php';
echo "<h2>Listagem de Pedidos</h2>";

try {
//consulta ao banco
$query = $db->query("SELECT * FROM pedidos ORDER BY datapedido");
$query->execute();
//exibindo dados
echo "<table border='1'>
    <tr><td>ID</td>
    <td>Cliente</td>
    <td>Vendedor</td>
    <td>Fornecedor</td>
    <td>Data</td>
    <td>Ações</td></tr>";
//verifica se existem dados
if ($query->rowCount() > 0):
    //obtendo o retorno por objeto
    $res = $query->fetchAll(PDO::FETCH_OBJ);
    //populando a tabela
    foreach ($res as $r){
        echo "<tr>";
        echo "<td>".$r->idpedido."</td>";
        echo "<td>".$r->idcliente."</td>";
        echo "<td>".$r->idvendedor."</td>";
        echo "<td>".$r->idfornecedor."</td>";
        echo "<td>".$r->datapedido."</td>";
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