<?php
include 'conexao.php';
include 'funcoes.php';


if (isset($_POST['id'])) {
    $sql = $pdo->prepare('DELETE FROM venda WHERE id = ?');
    $sql->execute([$_POST['id']]);

    header('Location: vendas.php?msg=excluido');
    exit;
}


$sql = $pdo->prepare('SELECT venda.*, cliente.nome AS cliente, produto.nome AS produto
                      FROM venda
                      JOIN cliente ON cliente.id = venda.cliente_id
                      JOIN produto ON produto.id = venda.produto_id
                      WHERE venda.id = ?');
$sql->execute([$_GET['id']]);
$venda = $sql->fetch();

$titulo = 'Excluir venda';
$pagina = 'vendas.php';
include 'topo.php';
?>

<div class="caixa">
    <h1>Excluir venda</h1>

    <p>Tem certeza que deseja excluir esta venda?</p>

    <div class="resumo">
        <div><b>Data:</b> <?= data_br($venda['data_venda']) ?></div>
        <div><b>Cliente:</b> <?= e($venda['cliente']) ?></div>
        <div><b>Produto:</b> <?= e($venda['produto']) ?> × <?= $venda['quantidade'] ?></div>
        <div><b>Total:</b> <?= dinheiro($venda['valor_total']) ?></div>
    </div>

    <form method="post" class="acoes">
        <input type="hidden" name="id" value="<?= $venda['id'] ?>">
        <button type="submit" class="botao perigo">Sim, excluir</button>
        <a href="vendas.php" class="botao claro">Cancelar</a>
    </form>
</div>

<?php include 'rodape.php'; ?>