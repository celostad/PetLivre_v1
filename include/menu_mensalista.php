<link href="<?php echo $pontos;?>css/estilo.css" rel="stylesheet" type="text/css" />
<div class="ddoverlap">
<ul>
<li <?php if ($select ==1){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>mensalista/entrada_mensalista.php">Entrada</a></li>
<li <?php if ($select ==2){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>caixa/index_pag_mensalista.php">Pagamento</a></li>
<li <?php if ($select ==3){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>mensalista/index_mensalista.php">Visualizar</a></li>
<li <?php if ($select ==4){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>mensalista/index_relacao_mensalista.php">Relação</a></li>

</ul>
<br style="clear: left" />
</div>