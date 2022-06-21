
<?php
require 'config.php';
//NOT NULL: nome, dataDeNascimento, Cpf

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$dtNascimento = filter_input(INPUT_POST, 'dtNascimento');
$cpf = filter_input(INPUT_POST, 'cpf');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 

if ($nome && $dtNascimento && $telefone) {
    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome, dtNascimento = :dtNascimento, cpf = :cpf, telefone = :telefone WHERE id = :id");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":dtNascimento", $dtNascimento);
    $sql->bindValue(":cpf", $cpf);
    $sql->bindValue(":telefone", $telefone);
    $sql->bindValue(":id", $id);
    $sql->execute();
    //echo 'if';
    header("Location: index.php");
    exit;
} else {
    //echo 'else';
    header("Location: index.php");
    exit;
}
