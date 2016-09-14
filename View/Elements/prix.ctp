<!--
<ul class="prix">
    <li class="ticket"><?php echo $ticket?> <span><?php echo $nb?></span></li>
    <li><span><?php echo $dh?><span class="small"> Dhs</span></span></li>
    <li><span><?php echo $eur?><span class="small"> &#8364; (env)</span></span></li>
</ul>
-->

<div class="price">
    <?php echo $dh?><span class="devise"> Dhs</span>
    <span class="eur"><?php echo $eur?><span class="devise"> &#8364; (env)</span></span>
    <span class="nb"><?php echo $nb?></span>
</div>