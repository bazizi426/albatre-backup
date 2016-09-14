<div class="title">
    <h1>
        Honoraires <span>Mode edition</span>
    </h1>
</div>
<div id="page">
<?php echo $this->Form->create('', array('url' => '/honoraires.html/edit'))?>
<?php //echo $this->Tinymce->editor(array('theme' => 'advanced', 'mode' => 'textareas')); ?>
    <div class="section">
    <?php echo $this->Tinymce->input('Data.content', array(
            'label' => false,
            'value' => $data,
            'style' => " height:500px;width:100%"
            ),array(
                'language'=>'fr'
            ),
            'advanced'

        ); ?>
    </div>
<div class="formlinks" style="margin-top:20px">
                <?php echo $this->Html->link('Modifier', 'javascript:;', array('class'=>'submit'))?>
            </div>
<?php echo $this->Form->end()?>
</div>


<script type="text/javascript">
    $('.submit').click(function(){
        $(this).closest('form').submit();
    })


</script>
