<?php echo $this->Html->css('/css/contact', false);?>
<style>
    .error-message {
        display: none;
    }
</style>
<div id="header" class="gestionlocative">
    <div class="inner">
        <div id="topheader">
            <a id="logo" href="/">Albatre location</a>
            <div id="nav">
                <a href="/">Accueil</a>
                <a href="/produits/browse?produit=0&chambres=0">Locations</a>
                <a href="/contactez-nous">Contactez nous</a>
            </div>
        </div>
        <div id="title">
            <h3>Gestion locative</h3>
            <div class="desc">
                Proposer un bien
            </div>
        </div>
   </div>
</div>  

<div id="main">
    <div id="contact">
        <?php echo $this->Form->create('Proposer')?>
        <div class="inner">
            <?php if(!empty($errors)) echo $this->element('error', array('message' => 'Veuillez renseigner les champs qui sont obligatoires.'))?>
            <div style="width:30%; float:left">
                <?php echo $this->Form->input('name', array('label' => 'Nom ou raison sociale <span>*</span>', 'style' => 'width:100%', 'div' => array('class' => 'section')))?>
                <?php if( isset($fields_required['name']) ) : ?>
                    <span class="warning" style="display: inline-block; margin-top: -20px">
                            Veuillez saisir le nom.
                    </span>
                <?php endif; ?>

                <?php echo $this->Form->input('tel', array('label' => 'Téléphone et pays <span>*</span>','type' => 'text', 'style' => 'width:100%', 'div' => array('class' => 'section')))?>
                <?php if( isset($fields_required['tel']) ) : ?>
                    <span class="warning" style="display: inline-block; margin-top: -20px">
                            Veuillez saisir le téléphone.
                    </span>
                <?php endif; ?>
                <?php echo $this->Form->input('email', array('label' => 'E.mail <span>*</span>','type' => 'text', 'style' => 'width:100%', 'div' => array('class' => 'section')))?>
                <?php if( !is_null($email_not_valid) ) : ?>
                    <span class="warning" style="display: inline-block; margin-top: -20px">
                            <?php echo $email_not_valid; ?>
                    </span>
                <?php endif; ?>
            </div>
            <div style="width:60%; float:right">
                <div class="section" style="height:60px">
                    <?php 
                        echo $this->Form->input('nature', array(
                        'label' => 'Nature du bien <span>*</span>', 
                        'style' => 'width:50%', 
                          'options' => array(
                                'appartement', 
                                'villa', 
                                'bureau', 
                                'immeuble'
                            ),
                        ));
                    ?>    
                    <?php if( isset($fields_required['nature']) and $fields_required['nature'] != '' ) : ?>
                        <span class="warning">
                                Veuillez saisir la nature du bien.
                        </span>  
                    <?php endif; ?>

                    <?php //echo $this->Form->input('nature', array('label' => 'Nature du bien <span>*</span>', 'style' => 'width:100%', 'div' => array('style' => 'width:45%; float:left')))?>
                 <?php echo $this->Form->input('adresse', array('label' => 'Adresse du bien <span>*</span>', 'style' => 'width:100%', 'div' => array( 'style' => 'margin-top: -57px; width:45%; float:right')))?>
                 <?php if( isset($fields_required['adresse']) ) : ?>
                    <span class="warning" style="display: block; width:233px; margin-right: 0">
                        Veuillez saisir l'adresse du bien.
                    </span>
                <?php endif; ?>

                </div>
                <?php echo $this->Form->input('description', array('label' => 'Description du bien <span>*</span>', 'type' => 'textarea', 'style' => 'height:30px'))?>
                <?php if( isset($fields_required['description']) ) : ?>
                    <span class="warning">
                           Veuillez saisir la description.
                    </span>
                <?php endif; ?>
                <div class="formlinks">
                    <?php //echo $this->Html->link('Envoyer', 'javascript:;', array('class'=>'submit')) ?>
                    <button class="submit" type="submit">Envoyer</button>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <?php echo $this->Form->end()?>
    </div>
    
</div>
