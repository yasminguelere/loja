<?php

include 'conexao.php';

echo '<h1>Conexão OK!</h1>';
echo '<p>O PHP abriu o arquivo banco/loja.db.</p>';


$clientes = $pdo->query('SELECT COUNT(*) FROM cliente')->fetchColumn();
$produtos = $pdo->query('SELECT COUNT(*) FROM produto')->fetchColumn();
$vendas   = $pdo->query('SELECT COUNT(*) FROM venda')->fetchColumn();

echo '<ul>';
echo '<li>Clientes: ' . $clientes . '</li>';
echo '<li>Produtos: ' . $produtos . '</li>';
echo '<li>Vendas: ' . $vendas . '</li>';
echo '</ul>';
