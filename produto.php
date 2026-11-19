<?php session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $_SESSION['produtos'][] = $_POST;
  $msg="Produto salvo com sucesso!";
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><title>Produto</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<nav class="navbar navbar-dark bg-primary"><div class="container"><a class="navbar-brand" href="index.php">🚚 Gerenciador Logístico</a></div></nav>
<div class="container mt-4">
<a href="index.php">← Voltar</a>
<h2>Cadastrar Produto</h2>
<?php if(isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
<form method="POST">
<label>Nome do Produto</label><input name="nome" class="form-control" required>
<label class="mt-2">Código / ID</label><input name="codigo" class="form-control" required>
<label class="mt-2">Peso (kg)</label><input name="peso" type="number" step="0.1" class="form-control" required>
<label class="mt-2">Valor (R$)</label><input name="valor" type="number" step="0.01" class="form-control" required>
<button class="btn btn-primary mt-3">Salvar Produto</button>
</form>
<h4 class="mt-4">Produtos Cadastrados</h4>
<?php if(!empty($_SESSION['produtos'])) foreach($_SESSION['produtos'] as $p) echo "<p>{$p['nome']} - {$p['peso']}kg - R$ {$p['valor']}</p>"; ?>
</div></body></html>
