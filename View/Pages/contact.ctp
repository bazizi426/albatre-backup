<div id="page" class="contact">
    <div id="sidebar">
        <h1>Albatre gestion <span>immobilière</span></h1>
        <div class="tel">
            <h2>Téléphone</h2>
            <ul>
                <li>05 22 27 02 59 <span>(depuis le Maroc)</span></li>
                <li>00212 5 22 27 02 59 <span>(depuis l'etranger)</span></li>
            </ul>
        </div>

        <div class="email">
            <h2>Email</h2>
            <ul>
                <li><?php echo $this->Html->link('info@albatre.com', 'mailto:info@albatre.com')?></li>
            </ul>
        </div>

    </div>
    <div id="content">

        <?php echo $this->Form->create('Contact')?>

        <h1>Laissez <span> un message</span></h1>
        <div class="inner">
            <?php if(!empty($errors)) echo $this->element('error', array('message' => 'Veuillez renseigner les champs qui sont obligatoires.'))?>


            <div class="section">
                <?php echo $this->Form->input('name', array('label' => 'Nom ou raison sociale <span>*</span>', 'style' => 'width:426px'))?>
            <div class="section" style="margin-bottom:110px">
                <div class="line">
                    <?php echo $this->Form->input('tel', array('label' => 'Téléphone précédé de l\'indicatif du pays <span>*</span>', 'style' => 'width:200px'))?>
                    <?php echo $this->Form->input('fax', array('label' => 'Fax', 'style' => 'width:200px'))?>
                </div>
            </div>
            <div class="section">
                <?php echo $this->Form->input('email', array('label' => 'Email <span>*</span>', 'style' => 'width:426px'))?>
            </div>
            <div class="section">
                <?php echo $this->Form->input('message', array('label' => 'Message <span>*</span>', 'type' => 'textarea'))?>
            </div>
            <div class="formlinks">
                <div>(<span>*</span>) Champs obligatoires.</div>
                <?php echo $this->Html->link('Envoyer', 'javascript:;', array('class'=>'submit'))?>
            </div>
        </div>

        <?php echo $this->Form->end()?>
    </div>
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

