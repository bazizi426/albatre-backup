<?php
    if(strpos($data['Produit']['image_default'], 'photo_venir')) $style = "background: url(/assets/generic/small.png) no-repeat left";
    else $style = "background: url(/produits/output/{$data['Produit']['image_default']}/{$data['Produit']['id_prod']}/360/240/true/{$data['Image'][0]['name']}) no-repeat left";
?>
<div class="produit" id="produit<?php echo $data['Produit']['id_prod'] ?>">
    <div class="left">
        <div class="image">

            <?php echo $this->Html->link(
            $this->Produit->title($data),
            "/immobilier-maroc/".$this->Produit->slug(array($data['Ville']['ville'], $data['Transaction']['keys'], str_replace('&','&amp;',$data['Produit']['titre'])))."/details/{$data['Produit']['id_prod']}",
            array(
                'style' => $style,
                'escape' => false,
                'title' => "{$data['Ville']['ville']}, {$data['TypeProduit']['type']} à  {$data['Transaction']['keys']} : ". str_replace('&','&amp;',$data['Produit']['titre'])
            )
       );?>
        </div>
        <div class="infos">
            <div class="location"><?php echo $this->Html->link("{$data['Ville']['ville']}, {$data['Quartier']['quartier']}", "/immobilier-maroc/".$this->Produit->slug(array($data['Ville']['ville'], $data['Transaction']['keys'], $data['Produit']['titre']))."/details/{$data['Produit']['id_prod']}", array('title' => "{$data['Ville']['ville']}, {$data['TypeProduit']['type']} à {$data['Transaction']['keys']} : {$data['Produit']['titre']}"))?></div>
            <div class="tags">
                <span class="first"><?php echo $data['TypeProduit']['type']?></span>
                <?php if($data['Produit']['nb_ch'] >0){?><span><?php echo $data['Produit']['nb_ch'] ?> Chambres</span><?php }?>
                <?php if($data['Produit']['nb_piece'] >0){?><span><?php echo $data['Produit']['nb_piece']?> pièces</span><?php }?>
            </div>
            <div class="price"><?php echo $this->Produit->printPrice($data['Produit']['prix'], $data['tc'], $data['Produit']['type_utilisation'], $data['Produit']['taxe_inclus'], $data['Produit']['syndic_inclus'])?>
                </div>
        </div>
    </div>
    <div class="right">
        <h3><?php echo $this->Html->link("{$data['Produit']['titre']}, {$data['Quartier']['quartier']}", "/immobilier-maroc/".$this->Produit->slug(array($data['Ville']['ville'], $data['Transaction']['keys'], $data['Produit']['titre']))."/details/{$data['Produit']['id_prod']}", array('title' => "{$data['Ville']['ville']}, {$data['TypeProduit']['type']} à {$data['Transaction']['keys']} : {$data['Produit']['titre']}"))?></h3>
        <p><?php echo $this->Produit->excerpt($data['Produit']['texte_annoce'], 180)?></p>
        <ul class="links">
            <li class="ref">Réf. <span><?php echo $data['Produit']['ref'] ?></span></li>
            <li><?php echo $this->Html->link("Plus d'informations", "/immobilier-maroc/".$this->Produit->slug(array($data['Ville']['ville'], $data['Transaction']['keys'], $data['Produit']['titre']))."/details/{$data['Produit']['id_prod']}", array('title' => "{$data['Ville']['ville']}, {$data['TypeProduit']['type']} à {$data['Transaction']['keys']} : {$data['Produit']['titre']}", 'class' => 'more'))?></li>
        </ul>
    </div>
</div>