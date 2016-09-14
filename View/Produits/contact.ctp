<?php echo $this->Html->css('/css/contact', false);?>
<div id="header" class="gestionlocative">
    <div class="inner">
        <div id="topheader">
            <a id="logo" href="/">Albatre location</a>
            <div id="nav">
                <a href="/">Accueil</a>
                <a href="/produits/browse?produit=0&chambres=0">Locations</a>
                <a href="/gestion-locative.html">gestion locative</a>

            </div>
        </div>
        <div id="title">
            <h3>Contactez nous</h3>
            <?php if(isset($ref)){?>
            <div class="desc">
                <?php echo $title?>
                - Réf. <?php echo $ref?>
            </div>
            <?php }?>
        </div>
   </div>
</div>
<div id="main">
    <div id="contact">
        <div class="left">
            <h3>Albatre gestion immobiliere</h3>
            <div class="section">
                <h4>Telephone</h4>
                <ul>
                    <li><span class="nb">Depuis le Maroc</span><span class="number">05 29 03 63 84</span></li>
                    <li><span class="nb">Depuis l'étranger</span><span class="number">00212 529 03 63 84</span></li>
                </ul>
            </div>
            <div class="section">
                <h4>Email</h4>
                <ul>
                    <li class="email"><?php echo $this->Html->link('info@albatre.com', 'mailto:info@albatre.com')?></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <h3>Laissez un message</h3>
            <?php echo $this->Form->create('Contact')?>
            <?php if(isset($ref)){
                echo $this->Form->input('id', array('type' => 'hidden', 'value' => $id));
                echo $this->Form->input('ref', array('type' => 'hidden', 'value' => $ref));
                echo $this->Form->input('title', array('type' => 'hidden', 'value' => $title));
            } ?>
            <div class="inner">
                <?php if(!empty($errors)) echo $this->element('error', array('message' => 'Merci de renseigner les champs obligatoires.'))?>
                <div style="width:45%; float:left">
                    <?php echo $this->Form->input('name', array('label' => 'Nom ou raison sociale <span>*</span>', 'style' => 'width:100%', 'div'=> array('class' => 'section')))?>
                    <?php if( isset($fields_required['name']) ) : ?>
                        <span class="warning" style="display: inline-block; margin-top: -20px">
                                Veuillez saisir votre nom.
                        </span>
                    <?php endif; ?>
                    <?php echo $this->Form->input('tel', array('label' => 'Téléphone et pays <span>*</span>', 'type' => 'text','style' => 'width:100%', 'div'=> array('class' => 'section')))?>
                    <?php if( isset($fields_required['tel']) ) : ?>
                        <span class="warning" style="display: inline-block; margin-top: -20px">
                                Veuillez saisir votre téléphone.
                        </span>
                    <?php endif; ?>
                    <?php echo $this->Form->input('Email', array('label' => 'E.mail <span>*</span>', 'type' => 'text','style' => 'width:100%', 'div'=> array('class' => 'section')))?>
                    <?php if( isset($fields_required['Email']) ) : ?>
                        <span class="warning" style="display: inline-block; margin-top: -20px">
                                Veuillez saisir votre E-mail.
                        </span>
                    <?php endif; ?>

                </div>
                <div style="width:45%; float:right">
                    <?php echo $this->Form->input('message', array('label' => 'Message <span>*</span>', 'type' => 'textarea', 'style' => 'height:120px'))?>
                    <br><br>
                    <?php if( isset($fields_required['message']) ) : ?>
                        <span class="warning" style="display: inline-block; margin-top: -20px">
                                Veuillez saisir votre message.
                        </span>
                    <?php endif; ?>
                    <div class="formlinks">
                        <?php echo $this->Html->link('Envoyer', 'javascript:;', array('class'=>'submit', 'style' => 'width:100%'))?>
                        <div class="clearLeft"></div>
                    </div>
                </div>
                <div class="clear"></div>

                
                
                
            </div>

            <?php echo $this->Form->end()?>
        </div>
        <div class="clear"></div>
    </div>
</div>

<script type="text/javascript">
    $('.submit').click(function(){
        $(this).closest('form').submit();
    })
    $('input').focus(function(){
        $(this).css({'color' : '#000', 'background' : '#fff'});
    });
    $('input').blur(function(){
        $(this).css({'color' : '#333','background': '#f5f5f5'});
    });
        $('textarea').focus(function(){
        $(this).css({'border' : '#c2c9cc 1px solid', 'color' : '#000', 'background' : '#fff'});
    });
    $('textarea').blur(function(){
        $(this).css({'border' : '#c2c9cc 1px solid', 'color' : '#333'});
    });


</script>


