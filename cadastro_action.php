<?php

require 'config.php';

$emailError = null;
$cpfError = null;

$nome = filter_input(INPUT_POST, 'nome');
$dtNascimento = filter_input(INPUT_POST, 'dtNascimento');
$cpf = filter_input(INPUT_POST, 'cpf');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


//NOT NULL: nome, dataDeNascimento, Cpf


if ($nome && $dtNascimento && $cpf) {

    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    $result = $sql->fetchAll();
    if (count($result) == 0) {

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE cpf = :cpf");
        $sql->bindValue(':cpf', RemPon($cpf));
        $sql->execute();

        $result = $sql->fetchAll();
        if (count($result) == 0) {

            $sql = $pdo->prepare("INSERT INTO usuario (nome, dtNascimento, cpf, telefone, email) VALUES (:nome, :dtNascimento, :cpf, :telefone, :email)");

            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':dtNascimento', RemPon($dtNascimento));
            $sql->bindValue(':cpf', RemPon($cpf));
            $sql->bindValue(':telefone', RemPon($telefone));
            $sql->bindValue(':email', $email);
            $sql->execute();
            $msg = 3;
            header("Location: ./cadastro.php?msg={$msg}");
        } else {
            $msg = 2;
            header("Location: ./cadastro.php?msg={$msg}");
        }
    } else {
        $msg = 1;
        header("Location: ./cadastro.php?msg={$msg}");
    }
} else {
    header("Location: cadastro.php");
}

//Funcoes
function RemPon($str)
{
    //Funcao feita para remover pontos
    $str = preg_replace('/[^0-9]/', '', $str);
    return $str;
}

?>
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>