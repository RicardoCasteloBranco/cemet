<?php
$ger = new \CasteloBranco\Cemet\Modules\Campus\Controller\CampusController();
$dados = $ger->indexAction();
?>
<h2>Campi</h2>
<table id="tabela" class="sortable">
    <thead>
        <tr>
            <th>Nome do Campus</th><th>Sigla do Campus</th><th>Orgão</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["campi"] as $row):?>
        <tr>
            <td><?php echo $row->nome_campus ?></td>
            <td><?php echo $row->sigla_campus ?></td>
            <td><?php echo $row->sigla ?></td>
            <td><a href="?module=Campus&page=edit.php&idcampus=<?php echo $row->idcampus; ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>