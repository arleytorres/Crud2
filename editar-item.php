<?php
    $sql = "SELECT * FROM produtos WHERE ID=" . $_REQUEST['id'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<h1>EDITAR ITEM</h1>
<form  action="?page=acoes" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->ID; ?>">
    <div class="mb-3">
        <label>Nome do Item</label>
        <input type="text" name="nome" class="form-control" value="<?php print $row->Nome; ?>">
    </div>
    <div class="mb-3">
        <label>Valor</label>
        <input type="number" name="preco" class="form-control" value="<?php print $row->Preco; ?>">
    </div>
    <div class="mb-3">
        <label>Estoque</label>
        <input type="number" name="estoque" class="form-control" value="<?php print $row->Estoque; ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>