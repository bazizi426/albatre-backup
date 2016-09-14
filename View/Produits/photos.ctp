
<script type="text/javascript">
 $(document).ready( function(){
		var buttons = { previous:$('#jslidernews2 .button-previous') ,
						next:$('#jslidernews2 .button-next') };
		$('#slideshow').lofJSidernews( { interval:3000,
						 easing:'easeInOutQuad',
												duration:1200,
												auto:true,
												mainWidth:699,
												mainHeight:462,
												navigatorHeight		: 62,
												navigatorWidth		: 86,
												maxItemDisplay:8,
												buttons:buttons,
                                                                                                onComplete:function(slider, index){
                                                                                                    $("#paginator").find('a').removeClass('active');
                                                                                                    $("#image"+index).addClass('active');
                                                                                                    $("#index").html(index+1);
                                                                                                }} );



        });

</script>
<div id="box">

<div id="slideshow">
            <div class="inner">
                <div class="navigator">
                            <ul class="iconslider">

                                <?php foreach($data['Image'] as $image){ ?>
                                <li>
                                    
                                    <p>
                                        <span></span>
                                        
                                        
                                        <?php echo $this->Html->link(
                            '',
                            "javascript:;",
                            array('style' => "background: url(/produits/output/{$image['name']}/{$data['Produit']['id_prod']}/small) center")
                        );?>
                                        

                                    </p>


                                    </li>
                                    <?php }?>

                            </ul>

                  </div>

                <div class="images">
                <div class="image">

                            <ul class="slider">
                                <?php foreach($data['Image'] as $image)
                                echo '<li><div>
<a href="javascript:;">
<img src="/produits/output/' . $image['name'] . '/'. $data['Produit']['id_prod'] .'/slide" />
</a>

</div></li>'
                                ?>
                            </ul>

                        </div>
                </div>
            </div>
        </div>
<div class="infos">
    <span class="counter"><span id="index">1</span>/<?php echo count($data['Image'])?> images</span>
    <div id="paginator">
        <?php foreach($data['Image'] as $key => $image){ ?>
        <a id="image<?php echo $key?>"></a>
        <?php }?>
    </div>
    <!--<span style="font-weight:bold; padding-left:6px"><?php echo $data['Produit']['titre']?></span>-->
    <div style="position:absolute; right:10px; top:0px; z-index:1000">
        <?php echo $this->Html->link("Réf <span>{$data['Produit']['ref']}</span>", "details/{$data['Produit']['id_prod']}", array('class' => "ref",'escape' => false))?>
        <?php echo $this->Html->link('Détails', "details/{$data['Produit']['id_prod']}", array('class' => 'more'))?>
        <?php echo $this->Html->link('Contactez-nous pour ce bien', 'contact', array('class' => 'contact'))?>
        <?php echo $this->Html->link('Fermer', 'javascript:;', array('class' => 'close'))?>
    </div>

</div>

</div>


<script type="text/javascript">
$(".close").click(function(){
    jQuery.colorbox.close();
})
</script>