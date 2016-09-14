<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>
            <?php echo Configure::read('infos.usename') .' :: '. $title_for_layout; ?>
        </title>
        <?php
            echo $html->charset();
            echo $html->meta('icon');
            echo $html->css('/css/login');
            echo $html->script('/js/jquery-1.6.2.min');
            echo $scripts_for_layout;

        ?>
    </head>
    <body>
            <?php echo $content_for_layout; ?>
    </body>
    <?php echo $this->Js->writeBuffer(); ?>
</html>