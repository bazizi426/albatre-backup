<div class="title">

    <h1>
        <?php echo 'Je recherche <span>un bien immobilier</span>'?>
    </h1>

</div>

<div id="page">
    <div id="content" class="proposer" style="width:800px; margin:0px auto">
        <?php echo $this->Form->create('Proposer')?>
        <div class="inner">
            <?php if(!empty($errors)) echo $this->element('error', array('message' => 'Veuillez renseigner les champs qui sont obligatoires.'))?>


            <div class="section">
                <?php echo $this->Form->input('name', array('label' => 'Nom, prénom ou raison sociale <span>*</span>', 'style' => 'width:426px'))?>
            </div>
            <div class="section" style="margin-bottom:110px">
                <div class="line">
                    <?php echo $this->Form->input('tel', array('label' => 'Téléphone <span>*</span>','type' => 'text', 'style' => 'width:200px'))?>
                    <?php echo $this->Form->input('fax', array('label' => 'Fax', 'style' => 'width:200px'))?>
                </div>
            </div>
            <div class="section">
                <?php echo $this->Form->input('email', array('label' => 'email <span>*</span>','type' => 'text', 'style' => 'width:426px'))?>
            </div>
            <div class="section" style="margin-top:60px; border-top:#ddd 1px solid; padding-top:50px">
                <?php echo $this->Form->input('nature', array('label' => 'Nature du bien <span>*</span>', 'style' => 'width:426px'))?>
            </div>
            <?php if(empty($gestion)){?>
            <div class="section">
                <?php echo $this->Form->input('trans', array('label' => 'Type du transaction <span>*</span>', 'options' => array('Achat/vente' => 'Achat/vente', 'Location non meublée' => 'Location non meublée', 'Location meublée' => 'Location meublée'),'style' => 'width:200px'))?>
            </div>
            <?php }?>
            <div class="section">
                <?php echo $this->Form->input('description', array('label' => 'Laissez-nous un message <span>*</span>', 'type' => 'textarea'))?>
            </div>
            <div class="formlinks">
                <div>(<span>*</span>) Champs obligatoires.</div>
                <?php echo $this->Html->link('Envoyer', 'javascript:;', array('class'=>'submit'))?>
            </div>
        </div>

        <?php echo $this->Form->end()?>
    </div>


    <div class="clear"></div>


</div>


    <script type="text/javascript">
    $('.submit').click(function(){
        $(this).closest('form').submit();
    })
    $('input').focus(function(){
        $(this).css({'border' : '#c2c9cc 1px solid', 'color' : '#000', 'background' : '#fff'});
    });
    $('input').blur(function(){
        $(this).css({'border' : '#c2c9cc 1px solid', 'color' : '#333'});
    });
        $('textarea').focus(function(){
        $(this).css({'border' : '#c2c9cc 1px solid', 'color' : '#000', 'background' : '#fff'});
    });
    $('textarea').blur(function(){
        $(this).css({'border' : '#c2c9cc 1px solid', 'color' : '#333'});
    });


</script>
