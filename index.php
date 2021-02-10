<?php
      include('db_connect.php');

      if (isset($_POST['entrar'])) {

                $login = mysqli_real_escape_string($connect, $_POST['login']);
                $senha = mysqli_real_escape_string($connect, $_POST['senha']);

                if (empty($_POST['login'] AND empty($_POST['senha']))) {
                   echo "erro login e senha precisam ser prenchido";
                }else{
            
                        $resultado = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($resultado)>0) {
                            $sql = "SELECT * FROM usuario WHERE nome = '$login' AND senha = '$senha'";
                            $resultado = mysqli_query($connect, $sql);

                            if (mysqli_num_rows($resultado)==1) {
                                $dados = mysqli_fetch_array($resultado);
                                $_SESSION['logado'] = true;
                                $_SESSION['id_usuario'] = $dados['id'];
                                header('location: home.php');
                            }else{
                                echo "usuario e senha não coferem";
                            }
                          
                        }else{
                            echo "usuario inexistente";
                        }



                }



      }

?>     
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL - Canal TI</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Login</h3>
                    <h3 class="title has-text-grey"><a href="https://youtube.com/canaltioficial" target="_blank">Canal TI</a></h3>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <div class="box">
                        <form action="index.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="login" name="text" class="input is-large" placeholder="Seu usuário" autofocus="" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua senha" required>
                                </div>
                            </div>
                            <button type="submit" name="entrar" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>