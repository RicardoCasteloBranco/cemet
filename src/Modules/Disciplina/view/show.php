<?php
$ger = new CasteloBranco\Cemet\Modules\Disciplina\Controller\DisciplinaController();
$dados = $ger->indexAction();
$curso = $dados["curso"];
?>
<h2>Disciplinas - <?php echo $curso->getNomeCurso();?></h2>
<button onclick="location.href='?module=Disciplina&page=index.php'" name="btn_volta">Voltar</button>
<table class="sortable">
    <thead>
        <tr>
            <th rowspan="2">Disciplina</th><th rowspan="2">Sigla</th><th rowspan="2">CH</th>
            <th rowspan="2">Ementa</th><th colspan="3">Competências</th><th rowspan="2">Bibliografia</th>
            <th rowspan="2">Ação</th>
        </tr>
        <tr>
            <th>Conhecimento</th><th>Habilidade</th><th>Atitude</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["disciplinas"] as $row): ?>
        <tr>
            <td><?php echo $row->disciplina; ?></td>
            <td><?php echo $row->sigla; ?></td>
            <td><?php echo $row->cargahoraria; ?></td>
            <td><?php echo $row->ementa; ?></td>
            <td><?php echo $row->conhecimento; ?></td>
            <td><?php echo $row->habilidade; ?></td>
            <td><?php echo $row->atitude; ?></td>
            <td><?php echo $row->bibliografia; ?></td>
            <td>
                <a href="?module=Disciplina&page=edit.php&iddisciplina=<?php echo $row->iddisciplina; ?>">Editar</a>
                |
                <a href="?module=Aula&page=index.php&iddisciplina=<?php echo $row->iddisciplina; ?>">Aulas</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>