<!DOCTYPE html>
<?php
list($produits, $labels) = $this->requestAction('/produits/seoLinks');
list($produits, $towns, $trans, $types) = $this->Produit->seo($produits, $labels);
list($biens, $villes, $chambres) = $this->requestAction('/produits/seOptions');
?>
<html lang="fr">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Régie immobilière à Casablanca, gestion locative et location d'appartement, maison, villa, bureau, meublé en zone résidentielle"/>
    <meta name="keywords" content="Agence, immobilier, immobilière, casablanca, location, appartement, villa, louer"/>
    <meta name="googlebot" content="index,follow" />
    <meta name="robots" content="index,follow" />
    <meta name="google-site-verification" content="esxYIFRaEJq1wCXI855eVWWDXM0Wt1Td8nY9vdvJTXY" />
    
    <title>Agence location immobilière Casablanca gestion locative appartement villa maison bureau</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <?php
       echo $this->Html->charset();
       echo $this->Html->meta('icon');
       echo $this->Html->css('/css/bootstrap.min');
       echo $this->Html->css('/css/ie10-viewport-bug-workaround');
       echo $this->Html->css('/css/main');
       echo $this->fetch('css');
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <section class="row contactez-nous-holder">
        <div class='container'>
          <div class="contactez-nous">
            <a href="#">
              <span class="glyphicon glyphicon-envelope"></span> <?php echo $this->Html->link("Contactez nous", '/contactez-nous', array('title' => 'Contactez nous'))?>
            </a>
          </div>
        </div>
      </section>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
              <?php echo $this->Html->link("Gestion locative", '/gestion-locative.html', array('title' => 'Gestion locative - Administration de biens'))?>
            </li>
            <li><a href="#about">ESTIMATION DU LOYER</a></li>
            <li><a href="#contact">INVERSTIRE POUR LOUER</a></li>
            <li><a href="#contact">RECHERCHE SP&Eacute;CIFIQUE</a></li>
            <li><?php echo $this->Html->link('MON ESPACE CLIENT', "http://client.albatre.com/albatre/client/panel")?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Start Banner -->
    <div class="row banner">
        <div class="col-xs-12 text-center banner-content">
          <h1>VOUS ÊTES CHEZ VOUS &Agrave; <span class="casablanca">CASABLANCA</span></h1>
          <h3>TROUVEZ UNE <strong><i>LOCATION</i></strong></h3>
        </div>
    </div>

    <!-- Start From -->
      <?php //echo $this->Form->create('Produit', array("url" => '/produits/browse',"action" => "browse", 'type' => 'get'))?>
      <form class="container main-search-form" action="/produits/browse" method="GET">
      <div class="col-xs-6 col-sm-3 col-md-1">
        <a href="#" class="btn btn-primary btn-achat search-button">ACHAT</a>
      </div>
      <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="#" class="btn btn-warning btn-location search-button">LOCATION</a>
      </div>
      <div class="col-xs-6 col-sm-3 col-md-2 visible-sm">
        <a href="#" class="btn btn-success btn-plus-de-details search-button plus-de-details"> <span class="glyphicon glyphicon-plus"></span>&nbsp;PLUS DE D&Eacute;TAILS</a>
      </div>
      <div class="col-xs-6 col-sm-3 col-md-1 visible-sm">
        <button type="button" class="btn btn-warning btn-search search-button pull-right">
          <span class="glyphicon glyphicon-search"></span>
        </button>
      </div>
      <div class="clearfix visible-sm"></div>
      <br class="visible-sm">
      <div class="select-holder">
        <div class="col-xs-12 col-sm-4 col-md-2">
          <select class="form-control search-select" name="ville">
            <?php foreach( $villes as $key => $ville) : ?>
              <option value="<?echo $key ?>"><?php echo $ville; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
          <select class="form-control search-select" name="produit">
            <?php foreach( $biens as $key => $bien) : ?>
              <option value="<?echo $key ?>"><?php echo $bien; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
          <select class="form-control search-select" name="chambres">
            <?php foreach( $chambres as $key => $chambre) : ?>
              <option value="<?echo $key ?>"><?php echo $chambre; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="clearfix visible-sm"></div>
      <div class="col-xs-6 col-sm-3 col-md-2 btns btns-first hidden-sm">
        <a href="#" class="btn btn-success btn-plus-de-details search-button plus-de-details"> <span class="glyphicon glyphicon-plus"></span>&nbsp;PLUS DE D&Eacute;TAILS</a>
      </div>
      <div class="col-xs-6 col-sm-3 col-md-1 btns btns-second hidden-sm">
        <button type="submit" class="btn btn-warning btn-search search-button pull-right">
          <span class="glyphicon glyphicon-search"></span>
        </button>
      </div>
    </form>
    <?php //echo $this->Form->end(); ?>
    <!-- End Form  -->

    <!-- End Banner -->
    <div class="container content-wrapper text-center">
      <section class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive img1" src="images/article-1.jpg" alt="">
                <div class="overlay">
                   <a class="info" href="#"><span class="glyphicon glyphicon-plus"></span> <br> Plus d'informations</a>
                </div>
            </div>
            <div class="center-block article-description">
              <!-- <br> -->
              <h3>titre h3 de grande taille</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              </p>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive img2" src="images/article-2.jpg" alt="">
                <div class="overlay">
                   <a class="info" href="#"><span class="glyphicon glyphicon-plus"></span> <br> Plus d'informations</a>
                </div>
            </div>
            <div class="center-block article-description article-description-orange">
              <h3>titre h3 de grande taille</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              </p>
            </div>
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive img3" src="images/article-3.jpg" alt="">
                <div class="overlay">
                   <a class="info" href="#"><span class="glyphicon glyphicon-plus"></span> <br> Plus d'informations</a>
                </div>
            </div>
            <div class="center-block article-description">
              <h3>titre h3 de grande taille</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              </p>
            </div>
        </div>
        <div class="clearfix visible-md visible-lg"></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive img4" src="images/article-4.jpg" alt="">
                <div class="overlay">
                   <a class="info" href="#"><span class="glyphicon glyphicon-plus"></span> <br> Plus d'informations</a>
                </div>
            </div>
            <div class="center-block article-description">
              <h3>titre h3 de grande taille</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              </p>
            </div>
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive img5" src="images/article-5.jpg" alt="">
                <div class="overlay">
                   <a class="info" href="#"><span class="glyphicon glyphicon-plus"></span> <br> Plus d'informations</a>
                </div>
            </div>
            <div class="center-block article-description article-description-green">
              <h3>titre h3 de grande taille</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              </p>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive img6" src="images/article-5.jpg" alt="">
                <div class="overlay">
                   <a class="info" href="#"><span class="glyphicon glyphicon-plus"></span> <br> Plus d'informations</a>
                </div>
            </div>
            <div class="center-block article-description">
              <h3>titre h3 de grande taille</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              </p>
            </div>
        </div>
      </section>

    </div><!-- /.container -->
    <!-- Start Footer menu -->
    <section class="footer-menu text-center">
      <div class="container">
        <div class="row">

          <div class="col-sm-3">
            <img src="images/accord-icon.png" alt="Accord" />
            <h4><span class="timer" data-from="0" data-to="1201"></span></h4>
            <p>
              Syndique de ce propriété à casablanca
            </p>
          </div>
          <div class="col-sm-3">
            <img src="images/users-icon.png" alt="Users" />
            <h4><span class="timer" data-from="0" data-to="3024"></span></h4>
            <p>
              Syndique de ce propriété à casablanca
            </p>
          </div>
          <div class="col-sm-3">
            <img src="images/rent-icon.png" alt="Louer à casablanca" />
            <h4><span class="timer" data-from="0" data-to="2038"></span></h4>
            <p>
              Syndique de ce propriété à casablanca
            </p>
          </div>
          <div class="col-sm-3">
            <img src="images/house.png" alt="Biens disponible" />
            <h4><span class="timer" data-from="0" data-to="1005"></span></h4>
            <p>
              Syndique de ce propriété à casablanca
            </p>
          </div>
        </div>
        <div class="row footer-copyright">
          <small>
            &copy; 2015 ALBATRE TOUTS LES DROITS R&Eacute;S&Eacute;RV&Eacute;
          </small>
        </div>
      </div>
    </section>
    <!-- End Footer menu -->

    <!-- Start Footer -->
    <footer class="text-center">
      <div class="container">
        <div class="row links">
          <div class="col-sm-3">
            <?php echo $this->Html->link("Location appartement à Casablanca", "/location-a-casablanca-appartement-non-meuble?produit=2&chambres=0", array('title' => "Location appartement à Casablanca")) ?>
          </div>
          <div class="col-sm-3">
            <?php echo $this->Html->link("Location meublée à Casablanca", "/location-a-casablanca-appartement-meuble?produit=3&chambres=0", array('title' => "Location meublée à Casablanca")) ?>
          </div>
          <div class="col-sm-3">
            <?php echo $this->Html->link("Location villa - maison à Casablanca", "/location-a-casablanca-villa-maison?produit=1&chambres=0", array('title' => "Location villa - maison à Casablanca")) ?>
          </div>
          <div class="col-sm-3">
            <?php echo $this->Html->link("Location bureau à Casablanca", "/location-a-casablanca-bureau?produit=4&chambres=0", array('title' => "Location bureaux à Casablanca")) ?> 
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <?php
       echo $this->Html->script('/js/jquery.min');
       echo $this->Html->script('/js/bootstrap.min');
       echo $this->Html->script('/js/ie10-viewport-bug-workaround');
       echo $this->Html->script('/js/jquery.countTo');
       echo $this->Html->script('/js/main');
       echo $this->fetch('script');
     ?>
  </body>
</html>
