<?php
// ======================
// API JSON (backend)
// ======================
if (isset($_GET['api']) && $_GET['api'] === 'listar') {
    header('Content-Type: application/json; charset=utf-8');

    $baseDir = __DIR__ . '/PDFS';
    $categoria = $_GET['categoria'] ?? '';

    $permitidas = ['POPBM', 'POPCIAD', 'POPPC', 'POPPM'];

    if (!in_array($categoria, $permitidas, true)) {
        echo json_encode(['erro' => 'Categoria inválida']);
        exit;
    }

    $path = $baseDir . '/' . $categoria;

    if (!is_dir($path)) {
        echo json_encode(['erro' => 'Pasta não encontrada']);
        exit;
    }

    $arquivos = [];

    foreach (scandir($path) as $file) {
        if ($file === '.' || $file === '..') continue;

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if ($ext === 'pdf' || $ext === 'txt') {
            $arquivos[] = $file;
        }
    }

    echo json_encode($arquivos, JSON_UNESCAPED_UNICODE);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Gestão de POPs</title>

<style>
body {
  font-family: Arial, sans-serif;
  background: #f4f4f4;
  padding: 20px;
}

h1 {
  margin-bottom: 20px;
}

.cards {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-bottom: 30px;
}

.card {
  background: #1e293b;
  color: #fff;
  padding: 30px;
  text-align: center;
  font-size: 20px;
  border-radius: 8px;
  cursor: pointer;
  transition: 0.2s;
}

.card:hover {
  background: #334155;
}

ul {
  list-style: none;
  padding: 0;
}

li {
  background: #fff;
  margin-bottom: 8px;
  padding: 10px;
  border-radius: 4px;
}

a {
  text-decoration: none;
  color: #1e293b;
}
</style>
</head>

<body>

<h1>Gestão de POPs</h1>

<div class="cards">
  <div class="card" onclick="carregar('POPCIAD')">CIAD</div>
  <div class="card" onclick="carregar('POPBM')">BM</div>
  <div class="card" onclick="carregar('POPPC')">PC</div>
  <div class="card" onclick="carregar('POPPM')">PM</div>
</div>

<h2>Arquivos</h2>
<ul id="lista"></ul>

<script>
async function carregar(categoria) {
  const lista = document.getElementById('lista')
  lista.innerHTML = '<li>Carregando...</li>'

  try {
    const res = await fetch(`index.php?api=listar&categoria=${categoria}`)
    const data = await res.json()

    lista.innerHTML = ''

    if (data.erro) {
      lista.innerHTML = `<li>${data.erro}</li>`
      return
    }

    if (data.length === 0) {
      lista.innerHTML = '<li>Nenhum arquivo encontrado</li>'
      return
    }

    data.forEach(file => {
      const li = document.createElement('li')
      const a = document.createElement('a')

      a.href = `PDFS/${categoria}/${file}`
      a.target = '_blank'
      a.textContent = file

      li.appendChild(a)
      lista.appendChild(li)
    })
  } catch (e) {
    lista.innerHTML = '<li>Erro ao conectar</li>'
    console.error(e)
  }
}
</script>

</body>
</html>
