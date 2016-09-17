<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ProduitsController extends AppController{

    public $conds;
    public $newCond;

    public $uses = array('Produit', 'Euro', 'Service', 'Ville', 'Contact', 'ProduitVisite');
    public $helpers = array('Produit');

    public $components = array('Image', 'Email', 'Session');

    public $min_prix = 0;
    public $max_prix = 0;

    public function beforeFilter(){
        $this->min_prix = (int)isset($_GET['min_prix']) ? $_GET['min_prix'] : 0;
        $this->max_prix = (int)isset($_GET['max_prix']) ? $_GET['max_prix'] : 0;

        if( $this->min_prix >= 0 and $this->max_prix > 0 and $this->max_prix >= $this->min_prix) {
          $this->conds = array(
              'Produit.prix BETWEEN ? and ?'  => array($this->min_prix, $this->max_prix),
              'Produit.actif' => 1,
              'Produit.publie' => 1,
              'NOT' => array(
                      'Produit.statut' => array('louée', 'vendu')
              )
          );
        } else {
          $this->conds = array(
              'Produit.actif' => 1,
              'Produit.publie' => 1,
              'NOT' => array(
                      'Produit.statut' => array('louée', 'vendu')
              )
          );
        }
    }

    public function index(){
        $this->layout = false;
    }

    public function gestion(){
        $title_for_layout = 'Gestion locative Gestion de patrimoine immobilier à Casablanca Gérance immobilière';
        $keywords = "gestion locative, Casablanca, administrateur de biens, appartement, villa, bureau, immeuble";
        $desc = "Gestion locative et commerciale de patrimoines immobiliers d'institutionnels ou privés, avec suivi comptable et contractuel via internet, administration de biens";
        $conds = array('gestion' => 1);
        //$datas = $this->Produit->find('all', array('conditions' => $conds , 'limit' => 5, 'order' => 'RAND()'));
        $this->set(compact("title_for_layout", 'keywords', 'desc'));
    }

    function browse(){
        
        $filter = array();
        $tri = array("", "");
        
           $this->paginate = array(
               'limit' => 10,
               'order' => 'Produit.updated DESC',
           );

         
           $data = $this->params->query;
           
           if(empty($data)) $data =  $this->params->params;
           if(empty($data)){
                $data = array('produit' => 0, 'chambres' => 0);
               /**
                * Start
                * Ajouter le 15/09/2016
                * Filter les datas envoyés par le client
                */     
                $data['min_prix'] = 0;
                $data['max_prix'] = 0;
                $data['ascenseur'] = 0;
                $data['piscine'] = 0;
                $data['acces_handicape'] = 0;
                $data['concierge'] = 0;
                $data['garage'] = 0;
                $data['interphone'] = 0;
                $data['terrasse'] = 0;
                $data['nbre_pieces'] = 0;

                $nbre_pieces = 0;
                $ascenseur = 0;
                $piscine = 0;
                $acces_handicape = 0;
                $concierge = 0;
                $garage = 0;
                $interphone = 0;
                $terrasse = 0;
               /**
                * End 
                */
           }

           /**
            * Start
            * Ajouter le 15/09/2016
            * Filter les datas envoyés par le client
            */
            
            $nbre_pieces = 0;
            $ascenseur = 0;
            $piscine = 0;
            $acces_handicape = 0;
            $concierge = 0;
            $garage = 0;
            $interphone = 0;
            $terrasse = 0;
            if(!empty($data['nbre_pieces'])) { 
                $nbre_pieces = (int)$data['nbre_pieces'];
            }


            if(!empty($data['min_prix'])) $this->min_prix = $data['min_prix'];
            if(!empty($data['max_prix'])) $this->max_prix = $data['max_prix'];
            if(!empty($data['ascenseur'])) $ascenseur = 6;
            if(!empty($data['concierge'])) $concierge = 27;
            if(!empty($data['interphone'])) $interphone = 75;
            if(!empty($data['terrasse'])) $terrasse = 4;
            if(!empty($data['piscine'])) $piscine = array(1, 77, 47);
            if(!empty($data['garage'])) $garage = array(3, 10, 81);
            // if(!empty($data['acces_handicape'])) $acces_handicape = '';
            
            

           /**
            * End 
            */
           if(!empty($data['ville'])) $filter["Produit.id_ville"] = $data['ville'];
           if(!empty($data['produit'])) $filter["Produit.type_produit"] = $data['produit'];
           if(!empty($data['trans'])) $filter["Produit.type_utilisation"] = $data['trans'];
           if(!empty($data['chambres'])) $filter["Produit.nb_ch"] = $data['chambres'];
           $order = array_key_exists('order', $data) ? $data['order'] : 2;
           if(!array_key_exists('produit', $data) || $data['produit'] >= 4) unset($filter["Produit.nb_ch"]);
            
           
           if($order == 1){
               $this->paginate = array(
                        'limit' => 10,
                        'order' => 'Produit.prix ASC',
               );
               $tri =   array('', 'active');
           }elseif($order == 0){
               $this->paginate = array(
                   'limit' => 10,
                   'order' => 'Produit.prix DESC'
               );
               $tri = array('active', "");
           }

           if(array_key_exists('ar', $data) && !empty($data['ar'])){
               $filter['Produit.statut'] = $data['ar'] == 1 ? 'vendu' : "louée";
               $filter['actif'] = 1;
           }else
               $filter = array_merge($filter, $this->conds);


           $this->set('title_for_layout', $this->__pageTitle($data));
           if($data['produit'] == 2){
               $this->set('title_for_layout', "Location appartement - Louer à Casablanca");
               $this->set('desc', "Les appartements à louer par notre agence de location immobilière sont récents, entretenus, avec garage, situés en quartier résidentiel et souvent gérés par notre régie");
               $type = 'location-appartement-vide-casablanca';
           }elseif($data['produit'] == 3){
               $this->set('title_for_layout', "Location appartements meublés à Casablanca - Résidentiel à louer");
               $this->set('desc', "Agence régie immobilière de location et gestion locative (appartement, villa, maison, bureau, meublé) à Casablanca");
               $type = "location-appartement-meuble-casablanca";
       }elseif($data['produit'] == 4){
               $this->set('title_for_layout', "Location Casablanca ­ Bureaux modernes à louer");
               $this->set('desc', "Agence immobilière, gestion locative et location villa, maison, bureau, meublé à Casablanca, nous accompagnons les futures locataires dans leurs démarches");
               $type = "location-bureau-casablanca";
       }elseif($data['produit'] == 1){
               $this->set('title_for_layout', "Location - louer villa  maison à Casablanca");
               $this->set('desc', "Notre agence de location immobilière propose des maisons et villas à louer, avec ou sans piscine, situées en zone résidentielle et sécurisée, nombreuses étant gérées par notre régie");
               $type= "location-villa-maison-casablanca";
           }else{
               $type = "locations-villa-maison-bureau-appartement-vide-meuble-casablanca";
               $this->set('title_for_layout', 'Location: appartements vides ou meublés, villas, bureaux à Casablanca');
               $this->set('desc', "Agence immobilière, gestion locative et location villa, maison, bureau, meublé à Casablanca, nous accompagnons les futures locataires dans leurs démarches");
           }
           
           $datas = $this->paginate($this->Produit, $filter);
         
           // $nbre_pieces = isset($_GET['nbre_pieces']) and $_GET['nbre_pieces'] != 0 ? (int)$_GET['nbre_pieces'] : 0;
           $results = array();
           foreach($datas as &$data){

	            $nbre_pieces_last_part = (int) end(explode(' / ', $data['Produit']['nb_piece']));

				$data['Image'] = $this->Image->browse($data['Produit']['id_prod']);
				if(empty($data['Produit']['image_default'])) $data['Produit']['image_default'] = $data['Image'][0]['name'];
				$data['tc'] = $this->Euro->tc();

				

				if( $nbre_pieces == $nbre_pieces_last_part ) {		
					$results[] = $data;
				} else if ( $nbre_pieces == 0 ) {
					$results[] = $data;
				} else if ($nbre_pieces == '' ) {
					$results[] = $data;
				}
           }

			$this->set('datas', $results);
			$this->set('data', $this->params);
           
           // if( empty($results) ) {
           // 	header('Location: http://albatre.com/beta2-test/');
           // 	exit;
           // }

            if($this->RequestHandler->isAjax()){
                $this->render('/Elements/browser', 'ajax');
                return;
            }

            $url = explode('&order',preg_replace('#/page:[0-9]#', '', $_SERVER['REQUEST_URI']));

            if(count($datas) <=0 ) $this->render('/Elements/nodata');
            $this->set('url', $url[0]);
            $this->set(compact('tri'));
            
    }

    function details($id){
        $data = $this->Produit->findByIdProd($id);
        $links = array();
        $data['Image'] = $this->Image->browse($id);
        //list($filter, $url) = $this->Application->searchParams();
        $this->setVisit($id);
        $data['tc'] = $this->Euro->tc();
        //$links = $this->_getNav($id, $filter);
        $services = $this->Service->find('list', array('fields' => array('id', 'acc')));
        //$conds = array_merge($this->conds, array('gestion' => 1));
        //$sim = $this->Produit->find('all', array('conditions' => $conds , 'limit' => 4, 'order' => 'RAND()'));
        $this->set('title_for_layout',$this->__pageTitle(array(
                'ville' =>$data['Produit']['id_ville'],
                'produit' => $data['Produit']['type_produit'],
                'trans' => $data['Produit']['type_utilisation'],
                ), $data['Produit']['ref'], true, strtolower($data['Produit']['titre'])
            ));
        $url = $this->Session->read('urli');
        $this->set(compact('data', 'links', 'url', 'services'));
    }
    public function setVisit($id){
    date_default_timezone_set('UTC');
    $this->ProduitVisite->save(
                    array(
      'date' => date('Y-m-d H:i:s'),
      'ip' => $_SERVER['REMOTE_ADDR'],
      'request' => json_encode($_SERVER),
      'id_prod' => $id
      )
    );
  }

    function agrandir(){
        if($this->RequestHandler->isAjax()){
            $id = $this->params['pass'][0];
            $type = $this->params['pass'][1];
            $width = $this->params['data']['width'] - 262;
            $height = ceil(($width/3) * 2);
            $data = $this->Produit->findByIdProd($id);
            $data['Image'] = $this->Image->browse($id);
            $data['tc'] = $this->Euro->tc();
            $services = $this->Service->find('list', array('fields' => array('id', 'acc')));
            $this->set(compact('data', 'width', 'height', 'services'));

            if($type == 'more')
                $this->render('/Elements/agrandi', 'ajax');
                else
                $this->render('/Elements/produit', 'ajax');
        }

    }

    function photos($id){
        $data = $this->Produit->findByIdProd($id);
        $data['Image'] = $this->Image->browse($id);
        $this->set(compact('data'));
    }

    function slides(){
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()){
           $nwidth = $this->params->query['width'];
           $width = ceil($nwidth/5) * 4;
           $height = ceil($width/3 * 2)-10;
           $id = $this->params->query['id'];
           $data = $this->Image->browse($id);
           $padding = ceil(($nwidth - $width)/4)+10;
           $this->set(compact('data', 'width', 'height', 'id', 'padding'));
           $this->render('/Elements/imageslide', 'ajax');
        }
    }

    public function seOptions(){
        $villes = $options = array('0' => 'Ou &nbsp;(Ville)');
        $biens = array('0' => 'Quoi &nbsp;(Type de bien)');

        $actvilles = $this->Produit->find('all',array('fields' => array('Ville.id AS id','Ville.ville AS ville'), 'conditions' => $this->conds, 'group' => array('Ville.id')));
        $actbiens = $this->Produit->find('all',array('fields' => array('TypeProduit.id AS id','TypeProduit.type as type'), 'conditions' => $this->conds, 'group' => array('TypeProduit.id')));

         foreach($actvilles as $key => $data)
            $villes["{$data['Ville']['id']}"] = $data['Ville']['ville'];

            foreach($actbiens as $key => $data)
            $biens["{$data['TypeProduit']['id']}"] = $data['TypeProduit']['type'];


        //$options = $this->Application->getSearchEngineOptions();
        //if(!$options){

           // $villes = $this->Produit->Ville->options();
           // $biens = $this->Produit->TypeProduit->options();
           $chambres = $this->Produit->Chambre->options();


            $this->Application->setSearchEngineOptions($biens, $villes, $chambres);
            return array($biens, $villes, $chambres);
        //}else
        return $options;
    }

    function filter(){
        $this->autoRender = false;
        $options = array();
        $clicked = false;
        if(!empty($this->params['pass'])) $clicked = $this->params['pass'][0];

        $data = empty($this->data)? array() : $this->data;
        $vars = array('count', 'options');
        $this->newCond = $this->__buildQuery($data);
        $count = $this->Produit->find('count', array('conditions' => $this->newCond));
        $this->__loadBiens($options);
        $this->__loadVilles($options, $data ,$clicked);
        $this->__loadTrans($options, $data, $clicked);
        $this->__loadChambres($options, $data, $clicked);
        $this->set(compact($vars));
        $this->render('/Elements/finetuning', 'ajax');
    }

    function __buildQuery($data, $clicked = false){
        $conds = $this->conds;
        $cond = array();

        if($clicked){
            if($clicked == 'produit'){
                unset($data['ville']);
                unset($data['trans']);
            }
            if($clicked == 'ville')
                unset($data['trans']);
        }

        if(array_key_exists('produit', $data) && !empty($data['produit'])){
                $ids = $data['produit'];
                $cond['type_produit']['AND'][]['OR'][] = array('Produit.type_produit' => $ids);
        }

        if($clicked != 'ville')
            if(array_key_exists('ville', $data) && !empty($data['ville'])){
                $ids = $data['ville'];
                $cond['id_ville']['AND'][]['OR'][] = array('Produit.id_ville' => $ids) ;
            }

        if($clicked != 'trans')
            if(array_key_exists('trans', $data) && !empty($data['trans'])){
                $ids = $data['trans'];
                $cond['type_utilisation']['AND'][]['OR'][] = array('Produit.type_utilisation' => $ids) ;
            }

        return array_merge($conds, array_values($cond));
    }

    function __loadBiens(&$options){
        $count = $this->Produit->find('all',array('fields' => array('Produit.type_produit AS id','TypeProduit.type AS label', 'COUNT(Produit.id_prod) AS count'), 'conditions' => $this->conds, 'group' => array('TypeProduit.id')));
        $options['bien'] = $count;
    }

    function __loadVilles(&$options, $data ,$clicked){
        $cond = $this->__buildQuery($data, $clicked);
        $count = $this->Produit->find('all',array('fields' => array('Produit.id_ville AS id','Ville.ville AS label', 'COUNT(Produit.id_ville) AS count'), 'conditions' => $cond, 'group' => array('Ville.id')));
        $options['ville'] = $count;
    }

    function __loadTrans(&$options, $data ,$clicked){
        $cond = $this->__buildQuery($data, $clicked);
        $count = $this->Produit->find('all',array('fields' => array('Produit.type_utilisation AS id','Transaction.type AS label', 'COUNT(Produit.id_prod) AS count'), 'conditions' => $cond, 'group' => array('Transaction.id')));
        $options['trans'] = $count;
    }

    function __loadChambres(&$options, $data ,$clicked){
        $cond = $this->__buildQuery($data, $clicked);
        $count = $this->Produit->find('all',array('fields' => array('Produit.nb_ch AS id','Chambre.chambre AS label', 'COUNT(Produit.id_prod) AS count'), 'conditions' => $cond, 'group' => array('Chambre.id')));
        $options['chambres'] = $count;
    }

    function output($img, $id, $maxW, $maxH, $watermark, $remp = null){
        $this->layout = false;
        //$format = $formats[$format];
        $this->set(compact('img', 'maxW', 'maxH', 'id', 'watermark', 'remp'));
    }

    function _getNav($id, $filter){

        $datas = $this->Produit->find('all', array('conditions' => $filter, 'order' => 'Produit.id_prod DESC'));

        $links = array();
        $t = null;
        foreach($datas as $key => $data)
            if($data['Produit']['id_prod'] == $id){
                $t = $key;
                break;
            }

        $links['next']  = array_key_exists($t+1, $datas) ? $datas[$t+1] : null;
        $links['prev']  = array_key_exists($t-1, $datas) ? $datas[$t-1] : null;

        return $links;
    }

    function seoLinks(){
        $labels = $this->Produit->find('all',array('fields' => array('Produit.id_ville AS id', 'Produit.type_utilisation AS id_trans', 'Produit.type_produit AS id_type','Ville.ville AS label', 'Transaction.type AS label', 'Transaction.keys AS keys', 'Transaction.keys AS keys', 'TypeProduit.type as label'), 'conditions' => $this->conds, 'group' => array('Ville.id', 'Transaction.id', 'TypeProduit.id')));
        $produits = $this->Produit->find('all', array('conditions' => $this->conds, 'order' => array('id_ville, type_utilisation, type_produit')));
        return array($produits, $labels);
    }

    function seoMime(){
        $villes = $this->Produit->find('all',array('fields' => array('Ville.ville'), 'conditions' => $this->cond, 'group' => array('Ville.id')));
        return array($villes, array(), array());
    }

    function proposer(){

    }

    function imagesSlide(){

    }

    /*function __getTitle($data){
        $title = '';
            if(array_key_exists('ville', $data) && !empty($data['ville'])){
                $ville = $this->Produit->Ville->findById($data['ville']);
                $title .= empty($title) ?  "<span>{$ville['Ville']['ville']}, </span> " : "{$ville['Ville']['ville']}, ";
            }

            if(array_key_exists('produit', $data) && !empty($data['produit'])){
                $types = $this->Produit->TypeProduit->findById($data['produit']);
                $title .= empty($title) ?  "<span>{$types['TypeProduit']['type']}</span> à la vente ou à la location " : "{$types['TypeProduit']['type']} ";
            }
            if(array_key_exists('trans', $data) && !empty($data['trans'])){
                $types = $this->Produit->Transaction->findById($data['trans']);
                $title .= empty($title) ?  "Appartement, villas, maisons, bureaux , terrains ... <span> à {$types['Transaction']['keys']}</span>" : " à {$types['Transaction']['keys']} ";
            }
        return $title;

    }*/
        function __getTitle($data){
        $title = '';
        if($data['chambres'] > 0);
        /*
            if(array_key_exists('ville', $data) && !empty($data['ville'])){
                $ville = $this->Produit->Ville->findById($data['ville']);
                $title .= empty($title) ?  "<span>{$ville['Ville']['ville']}, </span> " : "{$ville['Ville']['ville']}, ";
            }*/

            if(array_key_exists('produit', $data) && !empty($data['produit'])){
                $types = $this->Produit->TypeProduit->findById($data['produit']);
                $title .= "{$types['TypeProduit']['type']}";
                //{$types['TypeProduit']['type']}
                //$title .= empty($title) ?  "<span>{$types['TypeProduit']['type']}</span> à la vente ou à la location " : "{$types['TypeProduit']['type']} ";
            }else $title .= ' biens trouvés';
            if(array_key_exists('chambres', $data) && !empty($data['chambres'])){
                if($data['chambres'] > 0){
                    $nbr = array("", "Une", 'Deux', 'Tois', 'Quatre', 'Cinq', 'Six chambres et plus');
                    if($data['chambres'] == 1) $title .= ' avec une chambre';

                    else $title .= " avec {$nbr[$data['chambres']]} chambres";
                }
            }
            $title .= ' à Casablanca';

          /*

            if(array_key_exists('trans', $data) && !empty($data['trans'])){
                $types = $this->Produit->Transaction->findById($data['trans']);
                $title .= empty($title) ?  "Appartement, villas, maisons, bureaux , terrains ... <span> à {$types['Transaction']['keys']}</span>" : " à {$types['Transaction']['keys']} ";
            }*/
        return $title;

    }



        public function contact($ref = null, $id=null, $title = null){
            
            $email = false;
            $email_not_valid = null;
            $fields_required = array();

            if( !empty($this->data) ) {
                foreach( $this->data['Contact'] as $key => $value) {
                    if( $value == '' ) {
                        $fields_required[$key] = $value;            
                    }
                }
                $email = filter_var($this->data['Contact']['Email'], FILTER_VALIDATE_EMAIL);
                if( $email == false ) {
                    $email_not_valid = 'Veuillez saisir un E-mail valide !';
                } 
            } 
            if(!empty($this->data) and empty($fields_required) and $email !== false ){
                
                $data = $this->data;
                $to = 'info@albatre.com';
                $from = 'info@albatre.com';

                $this->Email->reset();
                $this->Email->template = 'contact';
                $this->Email->sendAs = 'both';
                $this->Email->replyTo = 'info@albatre.com';
                $this->Email->from = $from;
                $this->Email->charset = 'utf-8';
                $this->Email->to = $to;

                $this->Email->subject = !array_key_exists('id',$data['Contact']) ? 'albatre.com : nouveau contact' : "Albatre.com : Produit réf {$data['Contact']['ref']} - nouveau contact";

                if(array_key_exists('id',$data['Contact'])){
                    $tc = $this->Euro->tc();
                    $produit = $this->Produit->findByIdProd($data['Contact']['id']);
                    $this->set('produit', $produit);
                    $this->set('tc', $tc);
                }

                $this->set('data', $data);
                if(@$this->Email->send()) {
                  $this->render('/Elements/reply');
                }else {
                  $this->render('/Elements/reply');
                }

            }
            if(!empty($ref)) $this->set(compact('ref', 'id', 'title'));

            $this->set(compact('errors', 'email_not_valid', 'fields_required'));
        }

/*
        public function contact($ref = null, $id=null, $title = null){
        
        if(!empty($this->data)){
            $this->Contact->set($this->data);
            if($this->Contact->validates()){
                $data = $this->data;
                $to = 'info@albatre.com';
                $to = 'n.sanbi@gmail.com';
                $from = 'info@albatre.com';
                    
                    print_r($data);
                   // $this->Email->reset();
                    //$this->Email->template = 'contact';
                    //$this->Email->sendAs = 'both';
                    //$this->Email->replyTo = 'info@albatre.com';
                    //$this->Email->from = $from;
                    //$this->Email->charset = 'utf-8';
                    //$this->Email->to = $to;
                    
                    
                    //$this->Email->subject = !array_key_exists('id',$data['Contact']) ? 'albatre.com : nouveau contact' : "Albatre.com : Produit réf {$data['Contact']['ref']} - nouveau contact";
                    /*
                    if(array_key_exists('id',$data['Contact'])){
                        $produit = $this->Produit->findByIdProd($data['Contact']['id']);
                        $this->set('produit', $produit);
                    }

                    //$this->set('data', $data);



                    //if(@$this->Email->send())
                      //  $this->render('/Elements/reply');
                        //else
                        //$this->render('/Elements/reply');
                        //return;
                 

            }else{
                $errors = $this->Contact->invalidFields();
            }

        }

        if(!empty($ref)) $this->set(compact('ref', 'id', 'title'));
        $this->set(compact('errors'));
    }
    */

    function __pageTitle($data, $ref = null, $order = false, $title = null){
        $output = '';

        $ville = array_key_exists('ville', $data) ? $data['ville'] : null;
        $produit = array_key_exists('produit', $data) ? $data['produit'] : null;
        $trans = array_key_exists('trans', $data) ? $data['trans'] : null;

        $keys = $order ? array('ville' => '', 'trans' => '', 'produit' => '') : array('trans' => '', 'produit' => '', 'ville' => '');





        if(empty($trans)) $keys['trans'] = 'location, meublée, achat/vente';
        else{
            if($produit == 3 && $trans == 2)
                $keys['trans'] = 'Location meublée';
                elseif($trans == 2)
                $keys['trans'] = 'Location non meublée';
                else{
                $trans = $this->Produit->Transaction->findById($trans);
                $keys['trans'] = " {$trans['Transaction']['type']}";
                }
        }

         if(empty($produit)) $keys['produit'] = ' appartement, villa, maison ';
        else{
            if($produit == 2 || $produit == 3)  $keys['produit'] = ' appartement ';
            else{
            $produit = $this->Produit->TypeProduit->findById($produit);
            $keys['produit'] = " {$produit['TypeProduit']['type']} ";
            }

        }


        if(empty($ville)) $keys['ville'] = 'Maroc ';
        else{
            $ville = $this->Produit->Ville->findById($ville);
            $keys['ville'] = "{$ville['Ville']['ville']} ";
        }


        $output = implode($keys);

        if(!empty($title)) $output .= "{$title}";

        return $output;

    }
}
