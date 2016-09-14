<?php echo $this->Html->script('/js/jquery.easing',  array('inline' => false));?>
<?php echo $this->Html->script('/js/jquery.jcarousel.min',  array('inline' => false));?>
<?php echo $this->Html->script('/js/script',  array('inline' => false));?>
<?php echo $this->Html->script('/js/jquery.jqprint',  array('inline' => false));?>
<?php echo $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAgyf7vQES9gQ6rfGTfcOYXgMKqnzpiCcM',  array('inline' => false));?>


<script type="text/javascript">
 $(document).ready( function(){
		var buttons = { previous:$('#slideshow .prev') ,
						next:$('#slideshow .next') };
		$('#slideshow').lofJSidernews( { interval:4000,
						 easing:'easeInOutQuad',
												duration:1200,
												auto:false,
												mainWidth:660,
												mainHeight:440,
												navigatorWidth: <?php echo floor(538/count($data['Image'])-10)?>,
                                                                                                maxItemDisplay: <?php echo count($data['Image'])?>,

                                                                                                navPosition     : 'horizontal',
												buttons:buttons } );
        });

</script>

<?php if($data['Produit']['coord_x'] && $data['Produit']['coord_y']): ?>
<script type="text/javascript">
    function initialize() {
	  var myLatlng = new google.maps.LatLng('<?php echo $data['Produit']['coord_x']?>','<?php echo $data['Produit']['coord_y']?>');
	  var mapOptions = {
	    zoom: 12,
	    center: myLatlng
	  }
	  var map = new google.maps.Map(document.getElementById('mapping'), mapOptions);

	  var marker = new google.maps.Marker({
	      position: myLatlng,
	      map: map,
	      title: 'Hello World!'
	  });
	}
  google.maps.event.addDomListener(window, 'load', initialize);

</script>
<?php endif; ?>

<div id="header">
            <div class="inner">
       <div id="topheader">
            <a id="logo" href="/">Albatre location</a>
            <div id="nav">
                <a href="/">Accueil</a>
                <a href="/gestion-locative.html">Gestion locative</a>
                <a href="/contactez-nous">Contactez nous</a>
            </div>
        </div>
                
            <div id="title">
                <h3>Locations</h3>
                <div class="desc">
                    
                </div>
            </div>
                
            </div>
    

        </div>
<div id="main">
    <div id="details">

        <div id="navprod">
            <?php echo $this->Html->link('Louez ce bien', "/contactez-nous/{$data['Produit']['ref']}/{$data['Produit']['id_prod']}/{$data['Produit']['titre']}", array('class' => 'loue'))?>
            <?php echo $this->Html->link('Imprimer', "javascript:print();", array('class' => 'print'))?>
            <?php echo $this->Html->link(
                'Retour',
                "javascript:window.history.back();",
                array('class' => 'results', 'title' => 'Résultats de votre recherche')
            );
            ?>

        </div>
       
        <div id="sidebar">
            <div class="section">
                <div class="location">
                    <?php echo "{$data['Ville']['ville']}, {$data['Quartier']['quartier']}"?>
                </div>
                <div class="tags">
                    <span class="first"><?php echo $data['TypeProduit']['type']?></span><span><?php echo $data['Produit']['nb_ch'] ?> Chambres</span><span><?php echo $data['Produit']['nb_piece']?> pièces</span>
                </div>
                <div class="price">
                    <?php echo $this->Produit->printPrice($data['Produit']['prix'], $data['tc'], $data['Produit']['type_utilisation'], $data['Produit']['taxe_inclus'], $data['Produit']['syndic_inclus'])?>
                </div>

            </div>

            <?php if($data['Produit']['coord_x'] && $data['Produit']['coord_y']): ?>
            <div class="section">
                
                
                <div id="mapping" style="height:300px; width:260px; float:left; position:relative;">
			<img src="<?php echo $this->webroot; ?>/assets/loading.gif" style="position:absolute; top: 225px; left: 185px"/>
			<div style="position:absolute; top: 260px; left: 120px; font-size:12px; width:200px;">Chargement de la g&eacute;olocalisation...</div>
		</div>
	        
                
            </div>
            <?php endif; ?>

        </div>
        <div id="produit">
            <div class="inner">
                <h3><?php echo $data['Produit']['titre']?></h3>
                <div class="desc">
                    <?php echo utf8_encode($data['Produit']['texte_annoce'])?>
                    <?php //echo $this->element('desc', array('content' =>$this->Produit->excerpt($data['Produit']['texte_annoce'], null, null)))?>
                    <div class="clearLeft"></div>
                </div>
                <div id="slideshow">
                    <div class="inner">
                        <div class="image" style="width:660px; height:440px">
                            <ul class="slider">
                                <?php
                                if(strpos($data['Image'][0]['name'], 'photo_venir')){
                                    echo '<li style="width:660px; height:440px; background:url(/assets/generic/big.png) no-repeat center"><img src="'.$this->webroot.'/assets/empty.png"/></li>';
                                }else
                                    foreach($data['Image'] as $image){
                                        echo '<li style="width:660px; height:440px; background:url(/produits/output/' . $image['name'] . '/'. $data['Produit']['id_prod'] .'/660/440/true) no-repeat center"><img src="'.$this->webroot.'/assets/empty.png"/></li>';
                                    }

                                ?>
                            </ul>

                        </div>
<!--
                        <div class="picto" style="width:660px; height:70px; background:#000; margin:1px 10px">
                            <div class="navigator">
                                <ul class="iconslider">
                                <?php foreach($data['Image'] as $image){
                                echo '<li>
                                      <p>
<a href="javascript:;" style="display:block; width:75px; height:50px; background:url(/produits/output/'.$image['name'].'/'.$data['Produit']['id_prod'].'/75/50/false) no-repeat center">

</a>
</p>

                                      </li>';
                                }?>
                            </ul>


                        </div>

                        </div>
                        -->

                       
                    </div>
                        <a href="javascript:;" class="prev">prev</a>
                        <a href="javascript:;" class="next">next</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>

        
    </div>
</div>
