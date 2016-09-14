<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       <?php
       echo $this->Html->charset();
       echo $this->Html->meta('icon');
       echo $this->Html->css('/css/home');
       echo $this->Html->script('/js/jquery-1.7.2.min');
       echo $this->Html->script('/js/jquery.selectbox');
       echo $this->fetch('css');
       echo $this->fetch('script');
       ?>
    </head>
    <body>
        <div id="topheader">
            <div class="inner">
                <?php echo $this->Html->link('Albatre Gestion Immobilière: immobilier au Maroc, location', '/', array('title' => 'Albatre Gestion Immobilière: immobilier au Maroc, location', 'id' => 'logo'))?>
                <ul id="menu">
                    <li class="selected"><?php echo $this->Html->link('Accueil<span>Accueil</span>', 'javascript:;',array('title' => "Accueil", 'escape' => false))?></li>
                    <li><?php echo $this->Html->link('Gestion locative<span>Gestion locative</span>', '/gestion-locative',array('title' => "Gestion locative", 'escape' => false))?></li>
                    <li><?php echo $this->Html->link('Contactez-nous<span>Contactez-nous</span>', '/gestion-locative',array('title' => "Contactez-nous", 'escape' => false))?></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="inner">
                <div id="se">
                    <?php echo $this->Form->create('Annonce')?>
                    <?php echo $this->Form->input('produit', array('label' => false,'options' => $prod))?>
                    <?php echo $this->Form->input('transaction', array('label' => false,'options' => $villes))?>
                    <?php echo $this->Form->input('ville', array('label' => false,'options' => $trans))?>
                    <?php echo $this->Html->link('Rechercher', 'javascript:;', array('id' => 'submit'))?>
                    <?php echo $this->Form->end()?>
                </div>

                <div id="links">
                    <div class="outer">
                        <div class="inner">
                            <ul>
                                <li><a>Location meublée appartement à Casablanca</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div id="footer">
            <div class="inner">
                Albatre Gestion - Tous droits reservés - Dernière mise à jour : 25/03/2013
            </div>
        </div>

    </body>
</html>

<?php
$jss = '$("#submit").click(function(){
    $(this).closest("form").submit();
    });
                $(function () {
			$("#se select").selectbox({
                        "effect": "toggle"
                        }
                    );
		});
';
$this->Js->buffer($jss);
?>
<?php echo $this->Js->writeBuffer(); ?>