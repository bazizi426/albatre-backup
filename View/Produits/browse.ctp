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
  

                <?php echo $this->Produit->pagetitle($data, $this->Paginator->counter(array('format' => "%count%")))?>
                <?php //echo $this->Paginator->counter(array('format' => '<span>%count%</span>')); ?> <?php //echo $title?>
            </div>
        </div>
   </div>
</div>
 <div id="main">
       <div id="produits">
        <?php echo $this->element('browser', array('datas' => $datas))?>
       </div>
</div>