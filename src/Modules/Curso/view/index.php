<?php
$ger = new CasteloBranco\Cemet\Modules\Curso\Controller\CursoController();
$dados = $ger->indexAction();
?>
<h2>Cursos</h2>
<table class="sortable">
    <thead>
        <tr>
            <th>Curso</th><th>Sigla</th><th>Campus</th><th>Orgão</th><th>Público Alvo</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["cursos"] as $row): ?>
        <tr>
            <td><?php echo $row->nomecurso; ?></td>
            <td><?php echo $row->siglacurso; ?></td>
            <td><?php echo $row->sigla_campus; ?></td>
            <td><?php echo $row->sigla; ?></td>
            <td><?php echo $row->publicoalvo; ?></td>
            <td><a href="?module=Curso&page=edit.php&idcurso=<?php echo $row->idcurso; ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>