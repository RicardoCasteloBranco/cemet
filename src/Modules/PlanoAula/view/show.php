<?php
$ger = new \CasteloBranco\Cemet\Modules\PlanoAula\Controller\PlanoAulaController();
$dados = $ger->showAction();
$disciplina = $dados["disciplina"];
$instrutor = $dados["instrutor"];
?>
<h2>Plano de Aula - <?php echo $disciplina->getDisciplina(); ?></h2>
<button onclick="location.href='?module=PlanoAula&page=add.php&idinstrutor=<?php echo $instrutor->getIdInstrutor(); ?>'">Inserir</button>
<table class="sortable">
    <thead>
        <tr>
            <th>Data</th><th>Turno</th><th>Qtd de Aulas</th><th>Objetivo</th>
            <th>Conteúdo</th><th>Metodologia</th><th>Meios</th><th>Avaliação</th>
            <th>Lançamento</th><th>Atualização</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["planos"] as $row): ?>
        <tr>
            <td><?php echo date("d/m/Y",strtotime($row->data)); ?></td>
            <td><?php switch ($row->turno){
                    case 1: echo "Manhã"; break;
                    case 2: echo "Tarde"; break;
                    case 3: echo "Noite"; break;
            } ?>
            </td>
            <td><?php echo $row->qtdaula; ?></td>
            <td><?php echo $row->objetivo;?></td>
            <td><?php echo $row->conteudo;?></td>
            <td><?php echo $row->metodologia;?></td>
            <td><?php echo $row->meios;?></td>
            <td><?php echo $row->avaliacao;?></td>
            <td><?php echo is_null($row->datacriacao)?NULL:date("d/m/Y",strtotime($row->datacriacao));?></td>
            <td><?php echo is_null($row->atualizacao)?NULL:date("d/m/Y",strtotime($row->atualizacao));?></td>
            <td>
                <a href="?module=PlanoAula&page=edit.php&idplano=<?php echo $row->idplano;?>">Editar</a>
                |
                <a href="../../PlanoAula/view/print.php?idplano=<?php echo $row->idplano;?>">Imprimir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>