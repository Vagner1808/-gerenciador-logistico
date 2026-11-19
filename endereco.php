<?php session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $_SESSION['enderecos'][] = $_POST;
  $msg="Endereço salvo!";
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><title>Endereço</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<nav class="navbar navbar-dark bg-primary"><div class="container"><a class="navbar-brand" href="index.php">🚚 Gerenciador Logístico</a></div></nav>
<div class="container mt-4">
<a href="index.php">← Voltar</a><h2>Cadastrar Endereço</h2>
<?php if(isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
<form method="POST">
<label>CEP</label><input name="cep" id="cep" class="form-control" required>
<label class="mt-2">Rua / Logradouro</label><input name="rua" id="rua" class="form-control" required>
<label class="mt-2">Cidade / Estado</label><input name="cidade" id="cidade" class="form-control" required>
<label class="mt-2">Tipo</label>
<select name="tipo" class="form-control"><option>Origem</option><option>Destino</option></select>
<div id="extras"></div>
<button type="button" class="btn btn-secondary mt-2" onclick="addCampo()">+ Adicionar Complemento (JavaScript)</button><br>
<button class="btn btn-success mt-3">Salvar Endereço</button>
</form></div>
<script>
function addCampo(){
  let d=document.createElement('input');
  d.className='form-control mt-2'; d.placeholder='Complemento / Referência'; d.name='complemento[]';
  document.getElementById('extras').appendChild(d);
}
document.getElementById('cep').addEventListener('blur', function(){
  let cep=this.value.replace(/\D/g,'');
  fetch('https://viacep.com.br/ws/'+cep+'/json/').then(r=>r.json()).then(data=>{
    if(!data.erro){ document.getElementById('rua').value=data.logradouro; document.getElementById('cidade').value=data.localidade+'/'+data.uf; }
  });
});
</script></body></html>
