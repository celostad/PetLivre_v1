<link href="<?php echo $pontos;?>css/estilo.css" rel="stylesheet" type="text/css" />
<div class="ddoverlap">
<ul>
<li <?php if ($select ==1){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>caixa/index_caixa.php">Visualizar</a></li>
<li <?php if ($select ==2){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>caixa/entrada_caixa.php">Lançar Entrada</a></li>
<li <?php if ($select ==3){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>caixa/index_caixa_saida.php">Lançar Saída</a></li>
<li <?php if ($select ==5){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>caixa/pendentes/index_pendentes.php">Pendentes</a></li>
<li <?php if ($select ==4){echo "class='selected'";}?>><a href="<?php echo $pt_lk_pg; ?>caixa/index_fechamento.php">Fechamento</a></li>
</ul>
<br style="clear: left" />
</div>
