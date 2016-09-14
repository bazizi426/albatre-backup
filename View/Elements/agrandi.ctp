<?php $max = ceil($width/65) - 1;?>
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
<div class="block detail" id="produit<?php echo $data['Produit']['id_prod'] ?>" style="">
   <div class="title">
        <div class="widgets">
            <?php echo $this->Ajax->link("Réduire", "/produits/agrandir/{$data['Produit']['id_prod']}/less", array('data' => '"width="+width', 'update' => "produit{$data['Produit']['id_prod']}", 'class' => 'first morep', 'escape' => false, 'title' => $this->Produit->title($data)))?>
            <?php //echo $this->Html->link('Réduire', "javascript:;", array('class' => 'print'))?>
            <?php echo $this->Html->link('Imprimer', "javascript:;", array('class' => 'print', 'title' => $this->Produit->title($data)))?>
            <?php echo $this->Html->link('Contactez-nous pour cette annonce', "/contact/{$data['Produit']['ref']}/{$data['Produit']['id_prod']}", array('class' => 'contact', 'title' => $this->Produit->title($data)))?>
            <span class="ref">Réf. <?php echo $data['Produit']['ref'] ?></span>
        </div>
    </div>

    <div class="infos">
        <ul>
            <li><?php echo $data['Ville']['ville']?>, <?php echo $data['Quartier']['quartier']?></li>
            <li>Location non meublée</li>
            <li><?php echo $data['Produit']['nb_ch']?> Chambres &nbsp;&nbsp;( <?php echo $data['Produit']['nb_piece']?> pièces )</li>
        </ul>
        <div class="prix">
            <?php echo $this->Produit->printPrice($data['Produit']['prix'], $data['tc'], $data['Produit']['type_utilisation'])?>
        </div>
        <?php echo $this->Produit->services($data['Produit']['accomodation'], $services, $data['Produit']['texte_annoce'])?>
        
       
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
                                            <a href="javascript:;" style="background: ../produits/output/'  . $image['name'] . '/'. $data['Produit']['id_prod'] .'/'. $width.'/'. $height .'/true">
                                            <img src="../produits/output/'  . $image['name'] . '/'. $data['Produit']['id_prod'] .'/'. $width.'/'. $height .'/true" />
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
                                        array('style' => "background: url(../produits/output/{$image['name']}/{$data['Produit']['id_prod']}/60/40/false) no-repeat center", 'title' => $this->Produit->title($data))
                                    );?>

                                                </p>



                                                </li>
                                                <?php }?>
                    </ul>
                </div>
                
            </div>
        </div>
        
    </div>
    
</div> 