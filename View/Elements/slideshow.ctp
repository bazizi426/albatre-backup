<?php $max = ceil($width/65);?>
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
