<?php
$ger = new CasteloBranco\Cemet\Modules\Cargo\Controller\CargoController();
$dados = $ger->indexAction();
?>
<h2>Cargos</h2>
<table class="sortable">
    <thead>
        <tr>
            <th>Cargo</th><th>Abreviatura</th><th>Orgão</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["cargos"] as $row): ?>
        <tr>
            <td><?php echo $row->cargo ?></td>
            <td><?php echo $row->abreviatura ?></td>
            <td><?php echo $row->sigla ?></td>
            <td><a href="?module=Cargo&page=edit.php&idcargo=<?php 
            echo $row->idcargo; ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
