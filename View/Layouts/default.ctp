<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
list($produits, $labels) = $this->requestAction('/produits/seoLinks');
list($produits, $towns, $trans, $types) = $this->Produit->seo($produits, $labels);
if(!isset($keywords)) $keywords = "Agence, immobilier, immobilière, maroc, ".implode(', ', $towns) .", location, appartement, villa, louer, location, vendre, acheter, Achat, vente, appartement,gestion, locative";
if(!isset($desc)) $desc= "Agence immobilière, gestion locative, location ( appartement, villa, maison, bureau, meublé ) et vente sont exercées à Casablanca et Rabat. Relocation. Nous accompagnons les expatriés.";
if(!isset($title_for_layout)) $title_for_layout = 'Agence Immobilière au Maroc, ' . implode(', ', $towns) . ' : Location meublée ou non, Achat - Vente, appartement, bureau, terrain , gestion locative :';
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
		<meta name="description" content="<?php echo $desc?>"/>
        <meta name="keywords" content="<?php echo $keywords?>"/>
        <meta name="googlebot" content="index,follow" />
        <meta name="robots" content="index,follow" />
        <meta name="google-site-verification" content="esxYIFRaEJq1wCXI855eVWWDXM0Wt1Td8nY9vdvJTXY" />
         <link href='https://fonts.googleapis.com/css?family=Raleway:600,100,400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:500,600,400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100' rel='stylesheet' type='text/css'>
        <?php
            echo $this->Html->meta('icon');
            echo $this->Html->css('/css/style');
            echo $this->Html->css('/css/common');
            echo $this->Html->script('/js/jquery-1.7.2.min');
            echo $this->Html->script('/js/jquery.selectbox');
            // echo $this->Html->script('/js/jquery.gallery');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"/>
        <script type="text/javascript">
        _uacct = "UA-1766471-1";
        urchinTracker();
     </script>
    </head>
    <body>
        <?php echo $content_for_layout; ?>
        <div id="footer">
            <div class="inner">
                <?php echo $this->element('se')?>
                <div class="links">
                    <p>
                        <a href="/">Accueil</a>
                        <a href="/produits/browse?produit=0&chambres=0">Locations</a>
                        <a href="/gestion-locative.html">Gestion locative</a>
                        <a href="/contactez-nous">Contactez nous</a>
                    </p>
                </div>
                <!--
                <a href="javascript:;">Accueil</a>
                <a href="javascript:;">Locations</a>
                <a href="javascript:;">Gestion locative</a>
                <a href="javascript:;">Contactez nous</a>
                <span class="copy">Tous droits reservés - Janvier 2016</span>
                -->
            </div>
        </div>
    <?php echo $this->Js->writeBuffer()?>
    </body>
</html>
<script type="text/javascript">
    $(function () {
        $('.search').click(function(){
            a = ['villa-maison-bureau-appartement-vide-meuble', 'villa-maison', 'appartement-non-meuble', 'appartement-meuble', 'bureau'];
            val = $('#ProduitProduit').val();
            $(this).closest('form').attr('action', "location-a-casablanca-"+a[val]);
            $(this).closest("form").submit();
        })
        $("#se select").selectbox({"effect": "toggle"});
    });
</script>