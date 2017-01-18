<?php
$ger = new CasteloBranco\Cemet\Modules\Companhia\Controller\CompanhiaController();
$dados = $ger->indexAction();
$curso = $dados["curso"];
?>
<h2>Companhias - <?php echo $curso->getNomeCurso(); ?></h2>

<button onclick="location.href='?module=Instrutor&page=index.php'">Voltar</button>

<table class="sortable">
    <thead>
        <tr>
            <th>Companhia</th><th>Local</th><th>Comandante</th><th>Data de Inicio</th>
            <th>Data de Término</th><th>Ação</th>
        </tr>
    </thead>
    <?php foreach ($dados["companhias"] as $row): ?>
    <tr>
        <td><?php echo $row->companhia; ?></td>
        <td><?php echo $row->local; ?></td>
        <td><?php echo $row->abreviatura." ".$row->nome; ?></td>
        <td><?php echo date("d/m/Y",strtotime($row->data_inicio)); ?></td>
        <td><?php echo is_null($row->data_termino)?NULL:date("d/m/Y",strtotime($row->data_termino)); ?></td>
        <td>
            <a href="?module=Instrutor&page=show_turma.php&idcompanhia=<?php echo $row->idcompanhia; ?>">Turmas</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
