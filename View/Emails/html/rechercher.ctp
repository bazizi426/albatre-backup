<p>Je cherche un bien immobilier ...</p>
        <ul>
            <li>Nom & prénom ou raison social : <span><?php echo $data['Proposer']['name']?></span> </li>
            <li>Tél :  <span><?php echo $data['Proposer']['tel']?></span> </li>
            <li>Fax :  <span><?php echo $data['Proposer']['fax']?></span> </li>
            <li>email :  <span><?php echo $data['Proposer']['email']?></span> </li>
        </ul>
       
       <div style="margin-top:40px">
           <p>Description du bien :</p>

           <ul>
               <?php if(isset($data['Proposer']['trans'])) echo "<li>Type de transaction : {$data['Proposer']['trans']}</li>"?>
               <li>Nature du bien : <?php echo $data['Proposer']['nature']?></li>
               <li>Description : <?php echo $data['Proposer']['description'] ?></li>
               
           </ul>
       </div>
        