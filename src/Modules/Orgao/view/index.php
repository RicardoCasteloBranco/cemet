<?php
$ger = new \CasteloBranco\Cemet\Modules\Orgao\Controller\OrgaoController();
$dados = $ger->indexAction();
?>
<h2>Orgão</h2>
<table class="sortable">
    <thead>
        <tr>
            <th>Orgão</th><th>Sigla</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["orgaos"] as $row): ?>
        <tr>
            <td><?php echo $row->orgao; ?></td>
            <td><?php echo $row->sigla; ?></td>
            <td><a href="?module=Orgao&page=edit.php&idorgao=<?php echo $row->idorgao; ?>">Editar</a></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>