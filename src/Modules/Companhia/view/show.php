<?php
$ger = new CasteloBranco\Cemet\Modules\Companhia\Controller\CompanhiaController();
$dados = $ger->indexAction();
$curso = $dados["curso"];
?>
<h2>Companhias - <?php echo $curso->getNomeCurso(); ?></h2>

<button onclick="location.href='?module=Companhia&page=index.php'">Voltar</button>

<table class="sortable" id="tabela">
    <thead>
        <tr>
            <th>Companhia</th><th>Local</th><th>Data de Inicio</th>
            <th>Data de Término</th><th>Ação</th>
        </tr>
    </thead>
    <?php foreach ($dados["companhias"] as $row): ?>
    <tr>
        <td><?php echo $row->companhia; ?></td>
        <td><?php echo $row->local; ?></td>
        <td><?php echo date("d/m/Y",strtotime($row->data_inicio)); ?></td>
        <td><?php echo date("d/m/Y",strtotime($row->data_termino)); ?></td>
        <td>
            <a href="?module=Companhia&page=edit.php&idcompanhia=<?php echo $row->idcompanhia; ?>">Editar</a>
            |
            <a href="?module=Turma&page=index.php&idcompanhia=<?php echo $row->idcompanhia; ?>">Turmas</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<div id="pageNav"></div>
        <script>var pager = new Pager('tabela',10);
            pager.init();
            pager.showPageNav('pager','pageNav');
            pager.showPage(1);
        </script>
