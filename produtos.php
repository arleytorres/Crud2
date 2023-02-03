<h1>LISTA DE PRODUTOS</h1>

<?php

    $sql = "SELECT * FROM produtos";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0){
        print '<table class="table table-hover table-striped table-bordered">';
        print '<tr>
                <th>#</td>
                <th>Nome</td>
                <th>Preço</td>
                <th>Estoque</td>';
        if (@$_COOKIE['Permissao'] == 1) {
            print '<th>Opções</td>';
        }
        print '</tr>';
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->ID."</td>";
            print "<td>".$row->Nome."</td>";
            print "<td>".$row->Preco."</td>";
            print "<td>".$row->Estoque."</td>";
            if (@$_COOKIE['Permissao'] == 1) {
                print "<td><button onclick= \"location.href='?page=editar&id=" . $row->ID . "'\" class='btn btn-success'>Editar</button> 
                <button onclick= \"if(confirm('Tem certeza que deseja fazer isto?')){location.href='?page=acoes&acao=excluir&id=" . $row->ID . "';}else{ false;}\" class='btn btn-danger'>Excluir</button></td>";
            }
            print "</tr>";
        }
		if (@$_COOKIE['Permissao'] == 1) {
            print "<form method='post' action='?page=acoes'>
                    <input type='hidden' name='acao' value='cadastrar'>
                    <tr><td>#</td>
                        <td><input type='text' name='nome' placeholder='Nome'></td>
                        <td><input type='number' name='preco' placeholder='Valor'></td>
                        <td><input type='number' name='estoque' placeholder='Estoque'></td>
                        <td><button onclick= \"location.href='?page=cadastrar&id=" . $row->ID . "'\" class='btn btn-success'>Inserir</button></td>
                    </tr></form>";
        }
		
        print '</table>';
    }else{
        print 'Nenhum resultado encontrado!';
    }
?>