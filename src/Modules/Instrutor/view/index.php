<?php
$ger = new CasteloBranco\Cemet\Modules\Curso\Controller\CursoController();
$dados = $ger->indexAction();
?>
<h2>Cursos</h2>
<table class="sortable">
    <thead>
        <tr>
            <th>Curso</th><th>Sigla</th><th>Orgão</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["cursos"] as $row): ?>
        <tr>
            <td><?php echo $row->nomecurso; ?></td>
            <td><?php echo $row->siglacurso; ?></td>
            <td><?php echo $row->sigla; ?></td>
            <td>
                <a href="?module=Instrutor&page=show_curso.php&idcurso=<?php echo $row->idcurso; ?>">Companhias</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>