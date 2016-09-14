       <p>Nouveau contact</p>
       
        <ul>
            <li>Nom ou raison social : <span><?php echo $data['Contact']['name']?></span> </li>
            <li>Tél :  <span><?php echo $data['Contact']['tel']?></span> </li>
            <li>Fax :  <span><?php echo $data['Contact']['fax']?></span> </li>
            <li>email :  <span><?php echo $data['Contact']['email']?></span> </li>
            <li>Message :  <span><?php echo $data['Contact']['message']?></span> </li>
        </ul>

       <?php if(isset($produit)){ ?>
       <div style="margin-top:40px">
           <p>Je suis intéréssé par le produit suivant :</p>
           <img src="<?php echo "http://www.albatre.com/produits/output/{$produit['Produit']['image_default']}/{$produit['Produit']['id_prod']}/360/240/true/"?>"/>

           <ul>
               <li><?php echo $this->Html->link('Lien direct vers le produit', 'http://wwww.albatre.com/immobilier-maroc/'.$this->Produit->slug(array($ville, $keytype, $produit['Produit']['titre']))."/details/{$produit['Produit']['id_prod']}")?></li>
               <li>Référence : <?php echo $produit['Produit']['ref']?></li>
               <li>Titre : <?php echo $produit['Produit']['titre']?></li>
               <li><?php echo $produit['TypeProduit']['type']?> à <?php echo $produit['Transaction']['keys']?></li>
               <li>Ville / Quartier : <?php echo "{$produit['Ville']['ville']} / {$produit['Quartier']['quartier']}" ?></li>
               <li>Prix : <?php echo $this->Produit->printPrice($produit['Produit']['prix'], $tc, $produit['Produit']['type_utilisation'], $produit['Produit']['taxe_inclus'], $produit['Produit']['syndic_inclus'])?>
                </li>

           </ul>
       </div>
       <?php }?>
        