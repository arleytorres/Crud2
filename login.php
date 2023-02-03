<h1>LOGIN</h1>
<form  action="?page=acoes" method="POST">
    <input type="hidden" name="acao" value="logar">
    <div class="mb-3">
        <label>Nome de Usuário</label>
        <input type="text" name="user" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Entrar</button>
    </div>
</form>