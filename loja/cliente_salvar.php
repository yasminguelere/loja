<?php
include 'conexao.php';


$id       = $_POST['id'];
$nome     = $_POST['nome'];
$email    = $_POST['email'];
$telefone = $_POST['telefone'];
$cidade   = $_POST['cidade'];

if ($id == '') {
   
    $sql = $pdo->prepare('INSERT INTO cliente (nome, email, telefone, cidade) VALUES (?, ?, ?, ?)');
    $sql->execute([$nome, $email, $telefone, $cidade]);
} else {
   
    $sql = $pdo->prepare('UPDATE cliente SET nome = ?, email = ?, telefone = ?, cidade = ? WHERE id = ?');
    $sql->execute([$nome, $email, $telefone, $cidade, $id]);
}


header('Location: clientes.php?msg=salvo');
exit;