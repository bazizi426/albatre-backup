<table>
    <tr>
        <td>

            <div class="loginform">
                <?php echo $this->Form->create(null, array('action'=>'login'));?>
                <div id="body">
                    <p><?php echo $message ?></p>

                 <div><?php echo $this->Form->input('login', array('label' =>__('Login', true), 'div' => false)); ?></div>
                 <div class="password"><?php echo $this->Form->input('pass', array('type' => 'password', 'value' => '','label'=>__('Mot de passe', true), 'div' => false))?></div>
                </div>
                <div id="footer">
                    <div class="submit">
                    <?php echo $this->Html->link(__('<span>Se connecter</span>', true), "javascript:document.forms[0].submit()", array( 'class'=>'submit',  'escape' => false))?>
                    </div>
                </div>
                <?php echo $this->Form->end()?>

            </div>

        </td>
    </tr>
</table>