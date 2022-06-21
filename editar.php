<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrudPhp</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
    <Link rel="stylesheet" href="css/bootstrap.min.css">
    <Link rel="stylesheet" href="css/cadastro.css">
    <script src="https://kit.fontawesome.com/179f8fd68f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</head>

<?php
require 'config.php';
//NOT NULL: nome, dataDeNascimento, Cpf

$usuario = [];
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
}
?>

<body>
    <div class="container col-md-6">
        <div class="card card-default bg-dark cadastro">
            <div class="card-header text-center">
                <h2>Editando usuários</h2>
            </div>
            <div class="card-body">
                <form action="editAction.php" method="POST">
                    <div class="form-row">
                        <label>
                            <input hidden type="text" name="id" value="<?= $usuario['id']; ?>" class="form-control col-md-6 bg-secondary">
                        </label>
                        <div class="form-group col-md-6">
                            <label>
                                Nome:
                            </label>
                            <input type="text" name="nome" value="<?= $usuario['nome']; ?>" class="form-control col-md-12 bg-secondary" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                Data de nascimento:
                            </label>
                            <input type="text" name="dtNascimento" value="<?= $usuario['dtNascimento']; ?>" class="form-control col-md-12 bg-secondary" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                CPF:
                            </label>
                            <input type="text" id="cpf" name="cpf" disabled value="<?= $usuario['cpf']; ?>" class="form-control col-md-12 bg-secondary" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                Telefone:
                            </label>
                            <input type="text" id="telefone" name="telefone" value="<?= $usuario['telefone']; ?>" class="form-control col-md-12 bg-secondary" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                Email:
                            </label>
                            <input type="text" name="email" disabled value="<?= $usuario['email']; ?>" class="ml-10 form-control col-md-12 bg-secondary" />
                        </div>
                        <div class="form-group col-md-6">
                            <a href=""><i class="fa-solid fa-circle-info btn-sm" data-toggle="tooltip" data-placement="right" title="Email e CPF não podem ser alterados. contate o suporte."></i></a>
                            <input type="submit" value="Editar" class="btn btn-primary mt-2 form-control col-md-12">
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script type="text/javascript">
        //Mascara para input...

        $("#telefone, #celular").mask("(00) 00000-0000");
        $("#cpf").mask("000.000.000-00");
        $("#dtNasc").mask("00/00/0000");
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>