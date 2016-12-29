<?php
$ger = new \CasteloBranco\Cemet\Modules\Aula\Controller\AulaController();
$dados = $ger->indexAction();
$disciplina = $dados["disciplina"];
?>
<h2>Aulas - <?php echo $disciplina->getDisciplina();?></h2>
<button onclick="location.href='?module=Aula&page=add.php&iddisciplina=<?php echo $disciplina->getIdDisciplina();?>'">Adiciona</button>
<button onclick="location.href='?module=Disciplina&page=show.php&idcurso=<?php echo $disciplina->getIdCurso();?>'">Volta</button>
<table class="sortable">
    <thead>
        <tr>
            <th>Objetivo</th><th>Qtd de Aulas</th><th>Instrutor Secundário</th>
            <th>Conteúdo</th><th>Eixo</th><th>Relação</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["aulas"] as $row):?>
        <tr>
            <td><?php echo $row->objetivo; ?></td>
            <td><?php echo $row->qtd_aulas; ?></td>
            <td><?php echo $row->instrutor_secundario; ?></td>
            <td><?php echo $row->conteudo; ?></td>
            <td><?php echo $row->eixo; ?></td>
            <td><?php echo $row->relacao; ?></td>
            <td><a href="?module=Aula&page=edit.php&idaula=<?php echo $row->idaula; ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>