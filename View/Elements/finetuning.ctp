<?php
$biens = $this->Produit->options($options['bien']);
$villes = $this->Produit->options($options['ville']);
$trans = $this->Produit->options($options['trans']);

?>
<div>
    <h6><?php echo $this->Html->link('Type de bien<span>-</span>', 'javascript:;', array('class' => 'toggle more', 'escape' => false))?></h6>
    <div>
        <?php echo $this->Form->input('produit',array('label' => false, 'type' => 'select', 'options' => $biens,'multiple' => 'checkbox', 'escape' => false))?>
    </div>
</div>

<div>
    <h6><?php echo $this->Html->link('Ville<span>-</span>', 'javascript:;', array('class' => 'toggle more', 'escape' => false))?></h6>
    <div>
    <?php echo $this->Form->input('ville',array('label' => false, 'type' => 'select', 'multiple' => 'checkbox', 'options' => $villes, 'escape' => false))?>
    </div>
</div>

<div>
    <h6><?php echo $this->Html->link('Acheter ou louer<span>-</span>', 'javascript:;', array('class' => 'toggle more', 'escape' => false))?></h6>
    <div>
    <?php echo $this->Form->input('trans',array('label' => false, 'type' => 'select', 'multiple' => 'checkbox', 'options' => $trans, 'escape' => false))?>
    </div>
</div>


<div class="filter">
    <p><span><?php echo $count ?></span> <?php echo $count > 1 ? 'Résultats' : 'Résultat'?></p>
    <?php echo $this->Ajax->link('<span>Filtrer</span>', '/produits/browse', array('update' => 'content','with' => '$("#ProduitFilterForm").serialize()', 'class' => 'button', 'escape' => false))?>
</div>
