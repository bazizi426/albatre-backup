<?php
    $this->Paginator->options(array(
        'url' => explode('/',preg_replace('#page:[0-9]#', '', $this->request->url)),
        'update' => '#response',
        'evalScripts' => true,
        'before' => "loader(1)",
        'complete' => "loader(0)",
    ));
    $k = explode('/',preg_replace('#page:[0-9]#', '', $this->request->url));
    //$this->Paginator->options['url'][0] = 'appartement-meuble';
    $this->Paginator->options['url']['?'] = $_SERVER['QUERY_STRING'];

?>

<div class="inner">
            <div id="navprod">
            <?php echo $this->Html->link('Tri par loyer croissant', $url."&order=1", array('class' => "filter {$tri[1]}", 'tri' => 'plus'))?>
            <?php echo $this->Html->link('Tri par loyer décroissant', $url."&order=0", array('class' => "filter {$tri[0]}", 'tri' => 'moins'))?>
            </div>
    <div id="data">
    <?php foreach($datas as $key => $data) echo $this->element('produit', array('data' => $data, 'key' => $key));?>
    </div>
</div>

<?php echo $this->element('paginator');?>
<?php echo $this->Js->writeBuffer()?>