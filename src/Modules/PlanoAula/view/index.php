<?php
$ger = new \CasteloBranco\Cemet\Modules\PlanoAula\Controller\PlanoAulaController();
$dados = $ger->indexAction();
?>
<h2>Disciplinas<?php ?></h2>
<table class="sortable">
    <thead>
        <tr>
            <th>Disciplina</th><th>Carga Horária</th><th>Ementa</th>
            <th>Bibliografia</th><th>Curso</th><th>Turma</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["disciplinas"] as $row): ?>
        <tr>
            <td><?php echo $row->disciplina; ?></td>
            <td><?php echo $row->cargahoraria; ?></td>
            <td><?php echo $row->ementa; ?></td>
            <td><?php echo $row->bibliografia; ?></td>
            <td><?php echo $row->siglacurso; ?></td>
            <td><?php echo $row->turma; ?></td>
            <td><a href="?module=PlanoAula&page=show.php&idinstrutor=<?php echo $row->idinstrutor; ?>">Planos de Aula</a>
                |
                <a href="../../Disciplina/view/print.php?iddisciplina=<?php echo $row->iddisciplina; ?>">PlaDis</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>