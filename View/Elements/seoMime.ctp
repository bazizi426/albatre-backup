<?php
list($produits, $labels) = $this->requestAction('/produits/seoLinks');
list($bytown, $towns, $trans, $types) = $this->Produit->seo($produits, $labels);
