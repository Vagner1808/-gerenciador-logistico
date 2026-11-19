<?php session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $dist = floatval($_POST['distancia']);
  $vkm = floatval($_POST['valor_km']);
  $_POST['total'] = $dist * $vkm;
  $_POST['data'] = date('d/m/Y');
  $_SESSION['fretes'][] = $_POST;
  $msg="Frete gerado! Total: R$ ".number_format($_POST['total'],2,',','.');
}
$prods = $_SESSION['produtos'] ?? [];
$ends = $_SESSION['enderecos'] ?? [];
$trans = $_SESSION['transportadores'] ?? [];
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><title>Frete</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<nav class="navbar navbar-dark bg-primary"><div class="container"><a class="navbar-brand" href="index.php">🚚 Gerenciador Logístico</a></div></nav>
<div class="container mt-4"><a href="index.php">← Voltar</a><h2>Gerar Frete</h2>
<?php if(isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
<form method="POST">
<label>Selecione o Produto</label>
<select name="produto" class="form-control"><?php foreach($prods as $p) echo "<option>{$p['nome']} - R$ {$p['valor']}</option>"; ?></select>
<label class="mt-2">Origem</label>
<select name="origem" class="form-control"><?php foreach($ends as $e) echo "<option>{$e['rua']} - {$e['cidade']}</option>"; ?></select>
<label class="mt-2">Destino</label>
<select name="destino" class="form-control"><?php foreach($ends as $e) echo "<option>{$e['rua']} - {$e['cidade']}</option>"; ?></select>
<label class="mt-2">Transportador</label>
<select name="transportador" class="form-control"><?php foreach($trans as $t) echo "<option>{$t['nome']} - {$t['veiculo']}</option>"; ?></select>
<label class="mt-2">Distância (km)</label><input name="distancia" type="number" class="form-control" required>
<label class="mt-2">Valor por KM</label><input name="valor_km" type="number" step="0.01" class="form-control" required>
<button class="btn btn-danger mt-3">Gerar Frete</button>
<a href="relatorio.php" class="btn btn-dark mt-3">Baixar Relatório</a>
</form>
<h4 class="mt-4">Fretes Gerados</h4>
<?php if(!empty($_SESSION['fretes'])) foreach($_SESSION['fretes'] as $f) echo "<p>{$f['data']} - {$f['produto']} | {$f['origem']} → {$f['destino']} | {$f['transportador']} | Total R$ ".number_format($f['total'],2,',','.')."</p>"; ?>
</div></body></html>
