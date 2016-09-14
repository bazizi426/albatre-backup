<div id="produits">
    <div>
        <h1>Nos produits immobilièrs classés par  Ville</h1>
        <?php foreach($produits as $ville => $produits){  echo "<h2>{$ville}</h2>"?>
        <?php foreach ($produits as $keytr => $trans){  echo "<h3>{$keytr}</h3>"?>
        <?php foreach($trans as $keytype => $produits){ echo "<h4>{$keytype}</h4>"?>

        <?php foreach($produits as $produit){
            $produit['Produit']['titre'] = str_replace('&', '&amp;', $produit['Produit']['titre']);
            echo  $this->Html->link("{$ville}, {$keytr} - {$keytype} : {$produit['Produit']['titre']}",
            '/immobilier-maroc/'.$this->Produit->slug(array($ville, $keytype, $produit['Produit']['titre']))."/details/{$produit['Produit']['id_prod']}",
            array('title' => "{$ville}, {$keytr} - {$keytype} : {$produit['Produit']['titre']}", 'escape' => false))?>
        <?php } } } } ?>

    </div>
</div>

