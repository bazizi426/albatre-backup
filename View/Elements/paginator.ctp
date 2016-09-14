<?php if($this->Paginator->hasNext() || $this->Paginator->hasPrev()) {?>
<div class="paginator">
    <div class="inner">
        <!--<span class="goto">Pages</span>-->
        <?php echo $this->Paginator->numbers( array('separator'=> '', 'model' => null)); ?>
    </div>
</div>
<?php } ?>