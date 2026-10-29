<?php
include 'conexao.php';

$id         = $_POST['id'];
$cliente_id = $_POST['cliente_id'];
$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];
$data_venda = $_POST['data_venda'];


$sql = $pdo->prepare('SELECT preco FROM produto WHERE id = ?');
$sql->execute([$produto_id]);
$preco = $sql->fetchColumn();


$valor_total = round($preco * $quantidade, 2);

if ($id == '') {
   
    $sql = $pdo->prepare('INSERT INTO venda (cliente_id, produto_id, quantidade, valor_total, data_venda) VALUES (?, ?, ?, ?, ?)');
    $sql->execute([$cliente_id, $produto_id, $quantidade, $valor_total, $data_venda]);
} else {
    
    $sql = $pdo->prepare('UPDATE venda SET cliente_id = ?, produto_id = ?, quantidade = ?, valor_total = ?, data_venda = ? WHERE id = ?');
    $sql->execute([$cliente_id, $produto_id, $quantidade, $valor_total, $data_venda, $id]);
}

header('Location: vendas.php?msg=salvo');
exit;