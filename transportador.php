<?php session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){ $_SESSION['transportadores'][]=$_POST; $msg="Transportador salvo!"; }
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><title>Transportador</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<nav class="navbar navbar-dark bg-primary"><div class="container"><a class="navbar-brand" href="index.php">🚚 Gerenciador Logístico</a></div></nav>
<div class="container mt-4"><a href="index.php">← Voltar</a><h2>Cadastrar Transportador</h2>
<?php if(isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
<form method="POST">
<label>Nome do Transportador</label><input name="nome" class="form-control" required>
<label class="mt-2">CPF / CNPJ</label><input name="cpf" class="form-control" required>
<label class="mt-2">Veículo / Placa</label><input name="veiculo" class="form-control" required>
<label class="mt-2">Valor por KM (R$)</label><input name="valor_km" type="number" step="0.01" class="form-control" required>
<button class="btn btn-warning mt-3">Salvar Transportador</button>
</form></div></body></html>
