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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</head>

<body>
    <div class="container col-md-6">
        <div class="card card-default bg-dark cadastro">
            <div class="card-header text-center">
                <h2>Cadastro de usuários</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="cadastro_action.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>
                                Nome:
                            </label>
                            <input type="text" name="nome" class="form-control col-md-12 bg-secondary">
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                Data de nascimento:
                            </label>
                            <input name="dtNascimento" type="text" class="form-control col-md-12 bg-secondary" id="datepicker">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>
                                Cpf:
                            </label>
                            <input type="text" name="cpf" required id="cpf" class="form-control bg-secondary">
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                Telefone:
                            </label>
                            <input type="text" id="telefone" name="telefone" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" class="form-control bg-secondary">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>
                                Email:
                            </label>
                            <input type="email" name="email" required class="form-control bg-secondary">
                        </div>
                    </div>
                    <div class="form-message">
                        <div id="lmsgSubmit" class="h3 text-center hidden">
                            <?php
                            $messages = [1 => 'Email já está em uso!', 2 => 'CPF já está em uso!', 3 => 'usuario cadastrado com sucesso!'];
                            $msg = filter_input(INPUT_GET, 'msg', FILTER_VALIDATE_INT);
                            if ($msg && array_key_exists($msg, $messages)) {
                                echo $messages[$msg];
                            }
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success col-md-12">Cadastrar</button>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="button" value="Ver cadastros" class="btn btn-primary col-md-12" onclick="document.location.href='index.php'"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>


<!-- Scripts -->
<script type="text/javascript">
    //Mascara para input...

    $("#telefone, #celular").mask("(00) 00000-0000");
    $("#cpf").mask("000.000.000-00");
    $("#dtNasc").mask("00/00/0000");
</script>
<script>
    $("#datepicker").datepicker({
        format: "yyyy/mm/dd",
        language: "en"
    });
</script>
<script>
    //Redirecionador

    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
        document.location.href = '<?php echo $page; ?>';
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>