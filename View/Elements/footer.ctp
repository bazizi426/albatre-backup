<div id="footer">
            <div class="outer">
                <div class="inner">
                    <div class="links">
                        <div class="albatre">
                            <?php echo $this->Html->link('Albatre immobilier', '/')?>

                        </div>
                        <div class="menu">
                            <ul>
                                <li><?php echo $this->Html->link('Accueil', '/', array('title' => 'Albatre agence immobilière - gestion locative'))?></li>
                                <li><?php echo $this->Html->link('Gestion locative', '/gestion-locative.html', array('title' => 'Gestion locative - administrateur de biens - gérance'))?></li>
                                <li><?php echo $this->Html->link('Contactez-nous', '/contactez-nous', array('title' => 'Contactez nous'))?></li>
                                <li><?php echo $this->Html->link('Proposer un bien', '/proposer-votre-bien', array('title' => 'Proposer un bien en gestion locative'))?></li>
                                <li><?php echo $this->Html->link('Je cherche ..', '/immobilier-casablanca-rechercher-un-bien-immobilier.html', array('title' => 'Je recherche un bien immobilier à Casablanca'))?></li>
                                <li><?php echo $this->Html->link('Honoraires', '/honoraires.html')?></li>
                            </ul>
                        </div>

                        <div>
                            <ul>
                                <?php foreach($towns as $key => $town) echo "<li>" .$this->Html->link($town, "/agence-immobiliere-".$this->Produit->slug(array($town))."/location-relocation-achat-vente-appartements-villas-maisons-bureaux-terrains-meuble-non-meuble/{$key}", array('title' => "Appartements, villas, terrrains... à $town")) . "</li>" ?>

                            </ul>
                        </div>
                        <div>
                            <ul>
                                <?php foreach($types as $key => $type) echo "<li>" .$this->Html->link($type, "/agence-immobiliere-casablanca/".$this->Produit->slug(array($type))."/ventes-locations-meuble-non-meuble/{$key}", array('title' => "$type à louer ou à acheter" )) . "</li>" ?>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <?php foreach($trans as $key => $tran) echo "<li>" .$this->Html->link($tran, "/agence-immobiliere-maroc/".$this->Produit->slug(array($tran))."/appartements-villas-maisons-bureaux-terrains-meuble-non-meuble/{$key}", array('title' => "Appartements, villas, terrrains... pour $tran")) . "</li>" ?>
                               <li><?php echo $this->Html->link('Produits recemment vendus', '/produits/browse/?ar=1', array('title' => 'Appartements, villas, maisons, bureaux, terrains... recement vendus'))?></li>
                                <li><?php echo $this->Html->link('Produits recemment loués', '/produits/browse/?ar=2', array('title' => 'Appartements, villas, maisons, bureaux, terrains... recement loués'))?></li>
                         </ul>
                        </div>

                        <!--

                        <div>
                            <ul>
                                <?php foreach($towns as $key => $town) echo "<li>" .$this->Html->link($town, "/produits/browse?ville={$key}", array('title' => "Appartements, villas, terrrains... à $town")) . "</li>" ?>

                            </ul>
                        </div>
                        <div>
                            <ul>
                                <?php foreach($types as $key => $type) echo "<li>" .$this->Html->link($type, "/produits/browse?produit={$key}", array('title' => "$type à louer ou à acheter" )) . "</li>" ?>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <?php foreach($trans as $key => $tran) echo "<li>" .$this->Html->link($tran, "/produits/browse?trans={$key}", array('title' => "Appartements, villas, terrrains... pour $tran")) . "</li>" ?>
                                <li><?php echo $this->Html->link('Produits récemment vendus', '/produits/browse?ar=1', array('title' => 'Appartements, villas, maisons, bureaux, terrains... récement vendus'))?></li>
                                <li><?php echo $this->Html->link('Produits récemment loués', '/produits/browse?ar=2', array('title' => 'Appartements, villas, maisons, bureaux, terrains... récement loués'))?></li>
                            </ul>
                        </div>
                        -->
                    </div>
                    <div class="clear"></div>

                    <div class="copy">
                        Tous droits réservés - Albatre.com - Immobilier et gestion locative - <span>Derniére mise à jour : <?php echo date("d/m/Y");?> </span>
                    </div>
                    
                </div>
            </div>

        </div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
        <script type="text/javascript">
        _uacct = "UA-1766471-1";
        urchinTracker();
        </script>