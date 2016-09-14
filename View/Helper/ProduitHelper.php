<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ProduitHelper extends AppHelper{

    public $helpers = array('Html','Ajax');

    
    function printOptions($options, $field, $label){
        $output = '';
        if(!empty($options)){
            foreach($options as $option)
                $output .= $option[$field].', ';

             $output = rtrim($output, ', ');
             echo $this->_View->element('optionsblock', array('options' => $output, 'label' => $label));
        }
    }

    function options($options){
        $output = array();
        foreach($options as $option){
            $keys = array_keys($option);
            $output["{$option[$keys[0]]['id']}"] = $option[$keys[1]]['label'] . " (<span>{$option[$keys[2]]['count']}</span>) ";
        }

        return $output;
    }

    function excerpt($str, $length = null, $parts = null){
         $strL = strlen($str);
         if($strL > $length && $length != null )
             $str = substr($str, 0, $length).' ...';
         if($parts){
             $half = floor($strL / 2);
             $par0 = utf8_encode(substr($str, 0, $half));
             $par1 = utf8_encode(substr($str, $half, $strL));
             return array($par0, $par1);
         }else


         return utf8_encode($str);
     }

/*
     function sendImage($pic, $format, $dir = 'orig'){

        //$src = $download ? 'orig' : 'home';
        //$format = array(850, '',false);
        $webImage = WWW_ROOT.'fotocenter'.DS.$dir.DS.$pic;

        $temp = WWW_ROOT.'img'.DS.$pic;
        list($width, $height, $type) = getimagesize($webImage, $iptc);
        list($newWidth, $newHeight) = $this->redim($width, $height, $format[0]);
        $image = imagecreatefromjpeg($webImage);

        if($format[2]){
            $mark = WWW_ROOT.'assets'.DS.'watermark.png';
            list($ww, $wh, $t) = getimagesize($mark);
            $wm = imagecreatefrompng($mark);
            imagealphablending($image, true);
            imagesavealpha($image, true);
            $x = round(($width-$ww)/2);
            $y = round(($height-$wh)/2);
            imagecopy($image, $wm, $x, $y, 0, 0, $ww, $wh);
        }

        $type = image_type_to_mime_type($type);

        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagejpeg($newImage, $temp, 80);

        $iptc = $this->getIPTCBlock($iptc);
        if($iptc){
            $data = iptcembed($iptc, $temp, 0);
            $dd = fopen($temp, 'wb');
            fwrite($dd, $data);
            fclose($dd);
        }

        $img = substr_replace(readfile($temp), pack('cnn',1,300,300),13,5);
        //@unlink($temp);

        header("Pragma: public");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Type: $type");
        echo $img;

        imagedestroy($newImage);
        imagedestroy($image);
        if($format[2]) imagedestroy($wm);
    }

*/
    //$this->Produit->printImage($img, $max, $id, $watermark);

    function printImage($pic, $maxW, $maxH, $id, $watermark, $remp = null){

        $folder =  IMGROOT . DS . $id . DS;
        $src = $folder . $pic;
        $temp = IMGROOT . DS . 'temp' . DS . $pic;
        if(!is_file("$src")) {
            $src = $folder . $remp;
            $temp = IMGROOT . DS . 'temp' . DS . $remp;
        }

        list($width, $height, $type) = getimagesize($src);

        list($newWidth, $newHeight) = $this->redim($width, $height, $maxW, $maxH);
        /*
        if($width < $maxW || $height < $maxH){
            $newWidth = $width;
            $newHeight = $height;
        }
         * */
        $image = imagecreatefromjpeg($src);

        if($watermark){
            $mark = WWW_ROOT.'assets'.DS.'watermark.png';
            list($ww, $wh, $t) = getimagesize($mark);
            $wm = imagecreatefrompng($mark);
            imagealphablending($image, true);
            imagesavealpha($image, true);
            $x = round(($width-$ww)/2);
            $x = $width-$ww-10;
            $y = round(($height-$wh)/2);
            $y = $height-$wh-10;
            imagecopy($image, $wm, $x, $y, 0, 0, $ww, $wh);
        }


        $type = image_type_to_mime_type($type);

        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagejpeg($newImage, $temp, 80);

        $img = substr_replace(readfile($temp), pack('cnn',1,300,300),13,5);

        header("Pragma: public");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Type: $type");
        echo $img;

        imagedestroy($newImage);
        imagedestroy($image);
    }

    function printPrice($prix, $tc, $trans, $taxe = null, $syndic = null){
        $nb = '';
        $dh = number_format($prix,0,',','.');
        $eur = number_format($prix/$tc,0,',','.');
        $ticket = $trans == 1 ? 'Prix de vente' : 'Loyer';
        if(!(empty($syndic))) $nb = "Charges de syndic";
        if(!(empty($taxe)))
          $nb .= !(empty($syndic))? " et taxe d'habitation incluses" : "Taxe d'habitation incluse";
          else if(!(empty($syndic))) $nb .= ' incluse';
          

        echo $this->_View->element('prix', array('ticket' =>$ticket, 'dh' => $dh, 'eur' => $eur, 'nb' => $nb));

    }

     function redim($width, $height, $maxW, $maxH){
        if($width >= $height){
            $newWidth = $maxW;
            $newHeight = $height * $newWidth / $width ;
            if($newHeight > $maxH){
                $newWidth =  $newWidth * $maxH / $newHeight ;
                $newHeight = $maxH;
            }
        }else{
            $newHeight = $maxH;
            $newWidth = $width * $newHeight / $height ;
            if($newWidth > $maxW){
                $newHeight = $newHeight * $maxW / $newWidth ;
                $newWidth = $maxW;
            }
        }
        return array($newWidth, $newHeight);

    }

/*
    function redim($width, $height, $format){
        if($width >= $height){
            $newWidth = $format;
            $newHeight = $height * $newWidth / $width ;
        }else{
            $newHeight = $format;
            $newWidth = $width * $newHeight / $height ;
        }
        return array($newWidth, $newHeight);

    }
*/
    function title($produit){
        return "{$produit['Ville']['ville']} {$produit['Quartier']['quartier']}, {$produit['TypeProduit']['type']} à  {$produit['Transaction']['keys']} : ". str_replace('&','&amp;',$produit['Produit']['titre']);
    }

    function spacenav($links, $url){
        $prev = $next = $page = null;
        if(!empty($links['prev']))
            $prev = $this->Ajax->link(
                'Produit précédent',
                'immobilier-maroc/Casablanca-Palmier/location-non-meublee/APPARTEMENT RECENT CENTRAL - VUE DÉGAGÉE - DERNIER ETAGE/1613',
                array('update' => 'details', 'class' => 'prev', 'title' => 'Produit précédent')
                );
        if(!empty($links['next']))
            $next = $this->Ajax->link(
                'Produit suivant',
                'immobilier-maroc/Casablanca-Palmier/location-non-meublee/APPARTEMENT RECENT CENTRAL - VUE DÉGAGÉE - DERNIER ETAGE/1613',
                array('update' => 'details', 'class' => 'next', 'title' => 'Produit suivant')
                );

        if(!empty($url))
            $page = $this->Html->link(
                'Retour',
                '/../'.$url,
                array('class' => 'results', 'title' => 'Résultats de votre recherche')
            );

        echo $this->_View->element('spacenav', array('prev' => $prev, 'next' => $next, 'page' => $page));
    }
    
    function services($data, $acc, $desc){
        $datas = array();
        $services = explode(';', $data);

        if(!empty($data)){
        foreach($services as $service)
            $datas[] = $acc[$service];
        }
        
        if(!empty($datas))
            echo $this->_View->element('accomodations', array('datas' => $datas));
            else
            echo $this->_View->element('description', array('desc' => $desc));
    }

    function meuble($trans, $meuble){
        if($trans == 1) return "<li>Vente</li>";
        else return $meuble == 1 ? '<li>Location non meublée</li>' : '<li>Location meublée</li>';
    }

    function seo($produits, $labels){
        $output = array();
        $towns = array();
        $trans = array();
        $types = array();
        foreach($labels as $label){
            if (!in_array($label['Ville']['label'], $towns)) $towns["{$label['Produit']['id']}"] = $label['Ville']['label'];
            if (!in_array($label['Transaction']['label'], $trans)) $trans["{$label['Produit']['id_trans']}"] = $label['Transaction']['label'] . " ({$label['Transaction']['keys']})" ;
            if (!in_array($label['TypeProduit']['label'], $types)) $types["{$label['Produit']['id_type']}"] = $label['TypeProduit']['label'];
            foreach($produits as $produit) 
                $output[$label['Ville']['label']]["{$label['Transaction']['label']} ({$label['Transaction']['keys']})"]["{$label['TypeProduit']['label']} à {$label['Transaction']['keys']}"][] = $produit;
        }
        return array($output, $towns, $trans, $types);
    }

    function slug($str = array()){
        $str = implode(' ', $str);
        return strtolower(Inflector::slug($str, '-'));
    }

    function printCh($chambre, $piece, $span = false){
        
        if($chambre <= 0 && $piece <=0) return "";

        $output = '<li>';
        switch($chambre){
            case 0 : $output .= "";
                break;
            case 1 : $output .= "Une chambre";
                break;
            default: $output .= "{$chambre} chambres";
        }
        switch($piece){
            case 0 : $output .= "";
                break;
            case 1 : $output .= " &nbsp;&nbsp;(Une pièce)";
                break;
            default : $output .= " &nbsp;&nbsp;({$piece} pièces)";
        }
        $output .= "</li>";

        return $output;
    }

    function pagetitle($data=null, $count = null){
        $title = '';
        $data = $data->query;
        $biens = array(
            array("bien immobilier", 'Biens immobiliers'),
            array("Villa - maison", 'Villas - Maisons'),
            array("Appartement non meublé", "Appartements non meublés"),
            array("Appartement meublé", "Appartements meublés"),
            array("Bureau", "Bureaux")
        );
        $chambres = array("", 'une chambre', 'deux chambres', 'trois chambres', 'quatre chambres', 'cinq chambres', 'six chambres et plus');
            if($count >= 1){
                if($count == 1){
                    $count = $data['produit'] == 1 ? "Une" : 'Un';
                    $title = "{$count} {$biens[$data['produit']][0]}";
                }else  $title = "{$count} {$biens[$data['produit']][1]}";
            }else{
                $count = $data['produit'] == 1 ? "Aucune" : 'Aucun';
                $title = "{$count} {$biens[$data['produit']][0]}";
            }

            if($data['chambres'] > 0) $title .= " avec {$chambres[$data['chambres']]}";
            
            $title .= " à Casablanca";

            echo $title;
    }
}

/*
<?php if(!empty($links['prev'])) echo $this->Ajax->link('<span>Image précédente</span>', 'details/'.$links['prev']['Photo']['id'], array('update' => 'photo', 'escape' => false))?>
            <?php if(!empty($links['next'])) echo $this->Ajax->link('<span>Image suivante</span>', 'details/'.$links['next']['Photo']['id'], array('update' => 'photo', 'escape' => false))?>
           <?php if(!empty($url)) echo $this->Html->link('Page des résultats', $url, array('class' => 'results')); ?>
*/