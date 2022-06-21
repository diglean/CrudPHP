<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios cadastrados</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
    <Link rel="stylesheet" href="css/bootstrap.min.css">
    <Link rel="stylesheet" href="css/cadastro.css">
    <script src="https://kit.fontawesome.com/179f8fd68f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</head>

<body>

    <div class="container">
        <?php
        require 'config.php';
        $lista = [];
        $sql = $pdo->query("SELECT * FROM usuario");
        if ($sql->rowCount() > 0) {
            $lista = $sql->fetchAll(pdo::FETCH_ASSOC);
        }
        ?>
        <div class="card card-default bg-dark cadastro">
            <div class="card-header text-center">
                <h2>Usuarios cadastrados</h2>
                <span>
                    <a href="cadastro.php">
                        <i class="fa-solid fa-circle-plus"></i>
                        Cadastrar novo
                    </a>
                </span>
            </div>
            <?php if ($lista != null) : ?>

                <table class="table table-bordered table-dark table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Data de nascimento</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Opções</th>
                    </tr>
                    <?php foreach ($lista as $usuario) : ?>
                        <tr>
                            <td><?= $usuario['id'] ?></td>
                            <td><?= $usuario['nome'] ?></td>
                            <td><?= $usuario['dtNascimento'] ?></td>
                            <td id="cpf"><?= $usuario['cpf'] ?></td>
                            <td id="telefone"><?= $usuario['telefone'] ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td>
                                <div class="form-row">
                                    <a href="editar.php?id=<?= $usuario['id'] ?>" class="btn btn-primary btn-sm col-md-6">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="excluir.php?id=<?= $usuario['id'] ?>" class="btn btn-danger btn-sm col-md-6">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <h2 class="text-center m-5">Vazio :(</h2>
            <?php endif ?>
        </div>
    </div>

    <script type="text/javascript">
        //Mascara para input...

        $("#telefone, #celular").mask("(00) 00000-0000");
        $("#cpf").mask("000.000.000-00");
    </script>


</body>