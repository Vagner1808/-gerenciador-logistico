<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Gerenciador Logístico</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-primary"><div class="container">
<a class="navbar-brand" href="index.php">🚚 Gerenciador Logístico</a>
<span class="text-white">Vagner Rafael - RA 60014037</span></div></nav>
<div class="container mt-4">
<h2>Bem-vindo ao Gerenciador Logístico</h2>
<p>UNIPAR EAD - Fundamentos de Programação para Internet - APO</p>
<div class="row mt-4">
<div class="col-md-3"><a href="produto.php" class="btn btn-primary w-100 p-3">Produtos</a></div>
<div class="col-md-3"><a href="endereco.php" class="btn btn-success w-100 p-3">Endereços</a></div>
<div class="col-md-3"><a href="transportador.php" class="btn btn-warning w-100 p-3">Transportador</a></div>
<div class="col-md-3"><a href="frete.php" class="btn btn-danger w-100 p-3">Gerar Frete</a></div>
</div>
<div class="card mt-4"><div class="card-body">
<h5>Fretes Cadastrados: <?php echo isset($_SESSION['fretes']) ? count($_SESSION['fretes']) : 0; ?></h5>
<a href="relatorio.php" class="btn btn-dark">Baixar Relatório do Dia</a>
</div></div>
</div></body></html>
