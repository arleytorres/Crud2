<?php
switch(@$_REQUEST['acao']){
    case 'logar':
        $username = addslashes(trim(@$_POST['user']));
        $senha = addslashes(trim(@$_POST['senha']));

        $sql = "SELECT Senha, Permissao FROM usuarios WHERE User = '{$username}'";
        $res = $conn->query($sql);
        $dados = $res->fetch_object();
        $qnt = $res->num_rows;

        if ($qnt > 0){
            if ($dados->Senha == $senha){
                print '<script>alert("Logado com sucesso")</script>';
                print "<script>location.href='?page=produtos'</script>";
                setcookie('Logado', true, (time() + 600));
                setcookie('Permissao', $dados->Permissao, (time() + 600));
                $_COOKIE['Logado'] = true;
                $_COOKIE['Permissao'] = $dados->Permissao;
            }else{
                print '<script>alert("Usuario/Senha incorretos")</script>';
                print "<script>location.href='?page=login'</script>";
            }
        }else{
            print '<script>alert("Este usuário não existe")</script>';
            print "<script>location.href='?page=login'</script>";
        }
        break;
    case 'cadastrar':
        if (@$_COOKIE['Permissao'] == 1) {
            $nome = addslashes(trim(@$_POST['nome']));
            $valor = addslashes(trim(@$_POST['preco']));
            $estoque = addslashes(trim(@$_POST['estoque']));

            $sql = "INSERT INTO produtos(Nome,Preco,Estoque) VALUES('{$nome}','{$valor}','{$estoque}')";
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Item inserido na lista!')</script>";
                print "<script>location.href='?page=produtos'</script>";
            } else {
                print "<script>alert('Não foi possivel inserir este item')</script>";
                print "<script>location.href='?page=produtos'</script>";
            }
        }else{
            print "<script>location.href='?page=inicio'</script>";
        }
        break;
    case 'editar':
        if (@$_COOKIE['Permissao'] == 1) {
            $nome = addslashes(trim(@$_POST['nome']));
            $valor = addslashes(trim(@$_POST['preco']));
            $estoque = addslashes(trim(@$_POST['estoque']));

            $sql = "UPDATE produtos SET Nome='{$nome}', Preco='{$valor}', Estoque='{$estoque}' WHERE ID=" . $_REQUEST['id'];
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Item editado na lista!')</script>";
                print "<script>location.href='?page=produtos'</script>";
            } else {
                print "<script>alert('Não foi possivel editar este item')</script>";
                print "<script>location.href='?page=produtos'</script>";
            }
        }else{
            print "<script>location.href='?page=inicio'</script>";
        }
            break;
    case 'excluir':
        if (@$_COOKIE['Permissao'] == 1) {
            $sql = "DELETE FROM produtos WHERE ID=" . $_REQUEST['id'];
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Item excluido da lista!')</script>";
                print "<script>location.href='?page=produtos'</script>";
            } else {
                print "<script>alert('Não foi possivel excluir este item')</script>";
                print "<script>location.href='?page=produtos'</script>";
            }
        }else{
            print "<script>location.href='?page=inicio'</script>";
        }
            break;
}
?>