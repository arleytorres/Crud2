<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>CRUD TESTE</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="?page=inicio">CRUD TESTE</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <?php
                  print '
                    <li class="nav-item">
                      <a class="nav-link '.(@$_REQUEST['page'] != 'login' && (@$_COOKIE['Logado'] == false or @$_COOKIE['Logado'] == null) ? '' : 'disabled').'" href="?page=login">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link '.(@$_REQUEST['page'] != 'produtos' && @$_COOKIE['Logado'] ? '' : 'disabled').'" href="?page=produtos">Produtos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link '.(!@$_COOKIE['Logado'] ? 'disabled' : '').'" href="?page=logout">Logout</a>
                    </li>';
                  ?>
                </ul>
              </div>
            </div>
          </nav>

          <div class="container">
            <div class="row">
              <div class="col mt-5">
                <?php
                include('DB.php');
                  switch (@$_REQUEST['page']) {
                    case "login":
                      if ($_COOKIE['Logado']) {
                        print "<script>location.href='?page=inicio'</script>";
                      } else {
                        include('login.php');
                      }
                      break;
                    case "produtos":
                      if ($_COOKIE['Logado']) {
                        include('produtos.php');
                      } else {
                        print "<script>location.href='?page=login'</script>";
                      }
                      break;
                    case "logout":
                      if ($_COOKIE['Logado']) {
                        unset($_COOKIE['Logado']);
                        setcookie('Logado', false, 1);
                        print "<script>location.href='?page=login'</script>";
                      }
                      break;

                    case "acoes":
                      include('acoes.php');
                      break;
                    case "editar":
                      include('editar-item.php');
                      break;
                  }
                ?>
              </div>
            </div>
          </div>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>