<?php list($biens, $villes, $chambres) = $this->requestAction('/produits/seOptions');?>
<div id="se">
    <h3>Trouver une location à Casablanca</h3>
                    <?php echo $this->Form->create('Produit', array("url" => '/produits/browse',"action" => "browse", 'type' => 'get'))?>
                    <?php //echo $this->Form->input('ville', array('label' => false,'options' => $villes,'div' => array('style' => 'width:200px; float:left; margin: 0 5px 0 0'), 'escape' => false))?>
                    <?php echo $this->Form->input('produit', array('label' => false,'options' => $biens, 'default' => 0, 'escape' => false,'div' => array('style' => 'width:230px; float:left; margin: 0 5px 0 0')))?>
                    <?php echo $this->Form->input('chambres', array('label' => false,'options' => $chambres, 'escape' => false, 'div' => array('style' => 'width:246px; float:left; margin: 0 0 0')))?>
                    <a class="search" href="javascript:;"></a>
                    <div class="clear"></div>
                    <?php echo $this->Form->end()?>
                    
</div>
