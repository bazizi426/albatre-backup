<?php echo $this->Html->css('/css/contact', false);?>
<div id="header">
    <div class="inner">
        <div id="topheader">
            <a id="logo" href="/">Albatre location</a>
            <div id="nav">
                <a href="/gestion-locative.html">Gestion locative</a>
                <a href="/contactez-nous">Contactez nous</a>
            </div>
        </div>
        <div id="title">
            <h3>Locations</h3>
            <div class="desc">
                <?php echo $this->Produit->pagetitle($data, $this->Paginator->counter(array('format' => "%count%")))?>
            </div>
        </div>
   </div>
</div>
 <div id="main">
     <div class="nodata">
         <p>Aucun produit n'est actuellement disponible et qui correspondant à vos crétères de recherches.</p>
         <p>Veuillez laisser vos coordonées, on vous contactera dès que le produit que vous recherchez sera disponible .</p>
     </div>

     <div id="contact">

                 <h3>Créer une alerte</h3>
            <?php echo $this->Form->create('Contact')?>
            <?php if(isset($ref)){
                echo $this->Form->input('id', array('type' => 'hidden', 'value' => $id));
                echo $this->Form->input('ref', array('type' => 'hidden', 'value' => $ref));
                echo $this->Form->input('title', array('type' => 'hidden', 'value' => $title));
            } ?>
            <div class="inner">
                <?php if(!empty($errors)) echo $this->element('error', array('message' => 'Veuillez renseigner les champs qui sont obligatoires.'))?>
                <div style="width:45%; float:left">
                    <?php echo $this->Form->input('name', array('label' => 'Nom, prénom ou raison sociale <span>*</span>', 'div'=> array('class' => 'section', 'style' => 'float:left; width:45%')))?>
                    <?php echo $this->Form->input('tel', array('label' => 'Téléphone <span>*</span>', 'type' => 'text', 'div'=> array('class' => 'section', 'style' => 'float:right; width:45%')))?>
                    <div class="clear"></div>
                    <?php echo $this->Form->input('email', array('label' => 'email <span>*</span>', 'type' => 'text','style' => 'width:100%', 'div'=> array('class' => 'section')))?>
                    <?php echo $this->Form->input('type', array('label' => 'Nature du bien', 'div'=> array('class' => 'section', 'style' => 'float:left; width:45%')))?>
                    <?php echo $this->Form->input('nbr', array('label' => 'Nombre de chambres', 'type' => 'text', 'div'=> array('class' => 'section', 'style' => 'float:right; width:45%')))?>
                    <div class="clear"></div>
                </div>
                <div style="width:45%; float:right">
                    <?php echo $this->Form->input('message', array('label' => 'Description du bien', 'type' => 'textarea', 'style' => 'height:142px'))?>
                    <div class="formlinks">
                        <?php echo $this->Html->link('Envoyer', 'javascript:;', array('class'=>'submit', 'style' => 'width:100%'))?>
                        <div class="clearLeft"></div>
                    </div>
                </div>
                <div class="clear"></div>




            </div>

            <?php echo $this->Form->end()?>
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