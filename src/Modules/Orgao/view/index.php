<?php
$ger = new \CasteloBranco\Cemet\Modules\Orgao\Controller\OrgaoController();
$dados = $ger->indexAction();
?>
<table>
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
            <td></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>