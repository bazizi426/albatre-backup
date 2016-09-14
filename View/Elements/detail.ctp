
<?php $max = ceil($width/65) - 1;?>
<?php $width -= 270 ?>

<script type="text/javascript">
 $(document).ready( function(){
		var buttons = { previous:$('#jslidernews2 .button-previous') ,
						next:$('#jslidernews2 .button-next') };
		$('#slideshow').lofJSidernews( { interval:3000,
						 easing:'easeInOutQuad',
												duration:1200,
												auto:true,
												mainWidth:<?php echo $width+10?>,
												mainHeight:<?php echo $height+10?>,
												navigatorHeight		: 48,
												navigatorWidth		: 64,
												maxItemDisplay:<?php echo $max?>,
												buttons:buttons,
                                                                                                onComplete:function(slider, index){
                                                                                                    $("#paginator").find('a').removeClass('active');
                                                                                                    $("#image"+index).addClass('active');
                                                                                                    $("#index").html(index+1);
                                                                                                }} );





        });

</script>
<script type="text/javascript">
                    var width = $('#content').width();
                </script>
<div class="title">
    <h1><?php echo $data['Produit']['titre']?></h1>
    <div class="links">
        <?php echo $this->Produit->spacenav($links, $url)?>
        <?php echo $this->Html->link('Imprimer', "javascript:;", array('class' => 'print'))?>
        <?php echo $this->Html->link('Contactez-nous pour cette annonce', "/contact/{$data['Produit']['ref']}/{$data['Produit']['id_prod']}", array('class' => 'contact'))?>
    </div>
</div>
<div id="page" class="block detail">

    <div class="infos">
        <ul>
            <li>Référence <span class="orange"><?php echo $data['Produit']['ref']?></span></li>
            <li><?php echo $data['Ville']['ville']?>, <?php echo $data['Quartier']['quartier']?></li>
            <li><?php echo $data['TypeProduit']['type']?> à <?php echo $data['Transaction']['keys']?></li>
            <li><?php echo $data['Produit']['nb_ch']?> Chambres &nbsp;&nbsp;( <?php echo $data['Produit']['nb_piece']?> pièces )</li>
        </ul>
        <div class="prix">
            <?php echo $this->Produit->printPrice($data['Produit']['prix'], $data['tc'], $data['Produit']['type_utilisation'], $data['Produit']['taxe_inclus'], $data['Produit']['syndic_inclus'])?>
            <div class="clear"></div>
        </div>
        <div class="desc">
            <span class="titre"><?php echo $data['Produit']['titre']?></span><?php echo $this->Produit->excerpt($data['Produit']['texte_annoce'])?>
        </div>
        <?php //echo $this->Produit->services($data['Produit']['accomodation'], $services, $data['Produit']['texte_annoce'])?>
        
       
    </div>

        <div id="images">
        <div id="slideshow">
            <div class="inner" style="padding:0; margin:0">
               <div class="images">
                    <div class="image" style="height:<?php echo $height+10?>px; width:<?php echo $width+10?>px" >
                        <ul class="slider">

                            <?php
                                        foreach($data['Image'] as $image)
                                            echo '
                                            <li><div>
                                            <a href="javascript:;" style="background: /produits/output/'  . $image['name'] . '/'. $data['Produit']['id_prod'] .'/'. $width.'/'. $height .'/true">
                                            <img src="/produits/output/'  . $image['name'] . '/'. $data['Produit']['id_prod'] .'/'. $width.'/'. $height .'/true" />
                                            </a></div></li>'
                                        ?>

                        </ul>
                    </div>
                </div>

                <div class="navigator">
                    <ul class="iconslider">
                        <?php foreach($data['Image'] as $image){ ?>
                                            <li style="position:static">

                                                <p>




                                                    <?php echo $this->Html->link(
                                        '',
                                        "javascript:;",
                                        array('style' => "background: url(/produits/output/{$image['name']}/{$data['Produit']['id_prod']}/60/40/false) no-repeat center", 'title' => $this->Produit->title($data))
                                    );?>

                                                </p>



                                                </li>
                                                <?php }?>
                    </ul>
                </div>

            </div>
        </div>

    </div>

    <div class="clear"></div>
    
</div>

<script type="text/javascript">
    $('.print').click(function(){
        $("#sidebar").jqprint({ operaSupport: true, importCSS:true });
    });
</script>