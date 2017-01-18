<?php
$ger = new CasteloBranco\Cemet\Modules\Disciplina\Controller\DisciplinaController();
$dados = $ger->editAction();
$disc = $dados["disciplina"];
?>
<h2>Disciplina</h2>
<form method="post" action="">
    <input type="hidden" name="iddisciplina" value="<?php echo $disc->getIdDisciplina(); ?>">
    <input type="hidden" name="idcurso" value="<?php echo $disc->getIdCurso(); ?>">
    <div>
        <label for="disciplina">Disciplina</label>
        <input type="text" name="disciplina" value="<?php echo $disc->getDisciplina(); ?>">
    </div>
    <div>
        <label for="sigla">Sigla</label>
        <input type="text" name="sigla" value="<?php echo $disc->getSigla(); ?>">
    </div>
    <div>
        <label for="cargahoraria">Carga Horária</label>
        <input type="text" name="cargahoraria" value="<?php echo $disc->getCargaHoraria(); ?>">
    </div>
    <div>
        <label for="regime">Regime</label>
        <input type="radio" name="regime" value="Presencial"
               <?php if($disc->getRegime() == "Presencial"): ?>
               checked="true"
               <?php endif; ?>
               >Presencial
        <input type="radio" name="regime" value="À distância"
               <?php if($disc->getRegime() == "À distância"): ?>
               checked="true"
               <?php endif; ?>
               >À distância
    </div>
    <div>
        <label for="ementa">Ementa</label>
        <textarea name="ementa"><?php echo $disc->getEmenta(); ?></textarea>
    </div>
    <div>
        <label for="objetivogeral">Objetivo Geral</label>
        <textarea name="objetivogeral"><?php echo $disc->getObjetivoGeral(); ?></textarea>
    </div>
    <div>
        <label for="conhecimento">Conhecimento</label>
        <textarea name="conhecimento"><?php echo $disc->getConhecimento(); ?></textarea>
    </div>
    <div>
        <label for="habilidade">Habilidade</label>
        <textarea name="habilidade"><?php echo $disc->getHabilidade(); ?></textarea>
    </div>
    <div>
        <label for="atitude">Atitude</label>
        <textarea name="atitude"><?php echo $disc->getAtitude(); ?></textarea>
    </div>
    <div>
        <label for="bibliografia">Bibliografia</label>
        <textarea name="bibliografia"><?php echo $disc->getBibliografia(); ?></textarea>
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Atualiza">
    </div>
</form>