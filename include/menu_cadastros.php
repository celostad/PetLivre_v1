<link href="<?php echo $pontos;?>css/estilo.css" rel="stylesheet" type="text/css" />
<div class="ddoverlap">
<ul>
<li <?php if ($select ==1){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>cadastros/clie/index_cad_clie.php">Clientes</a></li>
<li <?php if ($select ==2){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>cadastros/pet/index_cad_pet.php">Pet</a></li>
<li <?php if ($select ==3){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>cadastros/forne/index_cad_forne.php">Fornecedor</a></li>
</ul>
<br style="clear: left" />
</div>