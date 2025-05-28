<?php
session_start();

if (!isset($_SESSION['dados'])) {
    echo "Nenhum dado encontrado.";
    exit();
}

$dados = $_SESSION['dados'];

function data_br($data) {
    if (!empty($data)) {
        $partes = explode('-', $data);
        if (count($partes) === 3) {
            return $partes[2] . '/' . $partes[1] . '/' . $partes[0];
        }
    }
    return '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Resultado do Currículo</title>
  <link rel="stylesheet" href="Css/resultado.css">
</head>
<body>

<h1>Currículo de <?php echo htmlspecialchars($dados['nome'] ?? ''); ?></h1>

<p><strong>Telefone:</strong> <?php echo htmlspecialchars($dados['telefone'] ?? ''); ?></p>
<p><strong>Cidade:</strong> <?php echo htmlspecialchars($dados['cidade'] ?? ''); ?></p>
<p><strong>Estado:</strong> <?php echo htmlspecialchars($dados['estado'] ?? ''); ?></p>
<p><strong>Rua:</strong> <?php echo htmlspecialchars($dados['endereco'] ?? ''); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($dados['email'] ?? ''); ?></p>
<p><strong>Data de Nascimento:</strong> <?php echo data_br($dados['dataNascimento'] ?? ''); ?></p>
<p><strong>Idade:</strong> <?php echo htmlspecialchars($dados['idade'] ?? ''); ?> anos</p>

<h3>Objetivos</h3>
<p><?php echo nl2br(htmlspecialchars($dados['objetivos'] ?? 'Nenhum objetivo informado.')); ?></p>

<h3>Formações</h3>
<ul>
<?php
if (!empty($dados['formacoes'])) {
    foreach ($dados['formacoes'] as $f) {
        $inicio = data_br($f['inicio'] ?? '');
        $fim = data_br($f['fim'] ?? '');
        $periodo = '';

        if ($inicio && $fim) {
            $periodo = $inicio . ' até ' . $fim;
        } elseif ($inicio) {
            $periodo = $inicio;
        } elseif ($fim) {
            $periodo = $fim;
        }

        echo '<li>' . htmlspecialchars($f['instituicao'] ?? '') . ' - ' .
             htmlspecialchars($f['curso'] ?? '') .
             ($periodo ? ' | ' . $periodo : '') . '</li>';
    }
} else {
    echo '<li>Nenhuma formação adicionada.</li>';
}
?>
</ul>

<h3>Experiências Profissionais</h3>
<ul>
<?php
if (!empty($dados['experiencias'])) {
    foreach ($dados['experiencias'] as $e) {
        $inicio = data_br($e['inicio'] ?? '');
        $fim = data_br($e['fim'] ?? '');
        $periodo = '';

        if ($inicio && $fim) {
            $periodo = $inicio . ' até ' . $fim;
        } elseif ($inicio) {
            $periodo = $inicio;
        } elseif ($fim) {
            $periodo = $fim;
        }

        echo '<li>' . htmlspecialchars($e['empresa'] ?? '') . ' - ' .
             htmlspecialchars($e['cargo'] ?? '') .
             ($periodo ? ' | ' . $periodo : '') . '</li>';
    }
} else {
    echo '<li>Nenhuma experiência adicionada.</li>';
}
?>
</ul>

<button id="btnImprimir" onclick="imprimirCurriculo()">Imprimir Currículo</button>

<script>
function imprimirCurriculo() {
    const btn = document.getElementById('btnImprimir');
    btn.style.display = 'none';
    window.print();
    btn.style.display = 'block';
}
</script>

</body>
</html>
