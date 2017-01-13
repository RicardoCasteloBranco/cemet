<?php
$ger = new CasteloBranco\Cemet\Modules\Companhia\Controller\CompanhiaController();
$dados = $ger->editAction();
$cia = $dados["companhia"];
?>
<h2>Companhia</h2>
<form method="post" action="">
    <input type="hidden" name="idcompanhia" value="<?php echo $cia->getIdCompanhia();?>">
    <div>
        <label for="idcurso">Curso</label>
        <select name="idcurso">
        <option></option>
        <?php foreach ($dados["cursos"] as $opt):?>
        <?php if($opt->idorgao != $optGroup):?>
        <optgroup label="<?php $optGroup = $opt->idorgao; echo $opt->sigla;?>">
        <?php endif; ?>
        <option value="<?php echo $opt->idcurso;?>"
               <?php if($cia->getIdCurso() == $opt->idcurso):?>
                selected="true"
                <?php endif; ?>
                ><?php echo $opt->nomecurso;?></option>
        <?php if($opt->idorgao != $optGroup): ?>
        </optgroup>
        <?php endif; ?>
        <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="companhia">Companhia</label>
        <input type="text" name="companhia" value="<?php echo $cia->getCompanhia();?>">
    </div>
    <div>
        <label for="local">Local</label>
        <input type="text" name="local" value="<?php echo $cia->getLocal();?>">
    </div>
    <div>
        <label for="data_inicio">Data de Inicio</label>
        <input type="date" name="data_inicio" value="<?php echo $cia->getDataInicio();?>">
    </div>
    <div>
        <label for="data_termino">Data de Termino</label>
        <input type="date" name="data_termino" value="<?php echo $cia->getDataTermino();?>">
    </div>
    <div>
        <label for="comandante">Comandante</label>
        <select name="comandante">
            <option></option>
            <?php foreach ($dados["pessoas"] as $opt): ?>
            <option value="<?php echo $opt->idpessoa ?>"
                    <?php if($opt->idpessoa == $cia->getComandante()):?>
                    selected="true"
                    <?php endif;?>
                    ><?php $cpf = str_split($opt->cpf,3); echo $cpf[0].".".$cpf[1].".".$cpf[2]."-".$cpf[3]." - ".$opt->nome; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Atualiza">
    </div>
</form>