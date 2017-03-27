<?php

include "sql.php";
if(isset($_POST['done'])){

    $id = $_POST['id']; 
    $evento = $_POST['evento'];
    $dtevento = $_POST['dtevento'];
	$autor = $_POST['autor'];
    $hora = $_POST['hora'];	 
	$local = $_POST['local'];   
    $conteudo = $_POST['desc'];

    
    if(empty($evento) || empty($dtevento) || empty($conteudo) || empty($local)){
        $erro = "Opa, vocÃª deve preencher todos os campos";
    }else{
        
       $sql = mysqli_query($connection, "UPDATE agenda SET evento='$evento', dtevento='$dtevento', conteudo='$conteudo', hora='$hora', local='$local', autor='$autor' WHERE id='$id'")or die(mysqli_error($connection));
	   $linha = mysql_affected_rows();
            if($linha == 1){
                $erro = "Dados alterados com sucesso!";
              } else{
                  $erro = "Não foi possivel alterar os dados";
              }
    }
}
$id = $_GET['id'];
$sql = mysqli_query($connection, "SELECT * FROM agenda WHERE id = '$id'");
$evento = @mysql_result($sql, 0, "evento");
$dtevento = @mysql_result($sql, 0, "dtevento");
$hora = @mysql_result($sql, 0, "hora");
$autor = @mysql_result($sql, 0, "autor");
$local = @mysql_result($sql, 0, "local");
$desc = @mysql_result($sql, 0, "conteudo");
$id = @mysql_result($sql, 0, "id");

?>

<style type="text/css">
.campo{
width:400px;
}
</style>
<form name="form1" action="atualagenda.php" method="POST" style="padding-top:40px;">
<?php
if(isset($erro)){
    print '<div style="width:80%; background:#ff6600; color:#fff; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
}
?>
<table border="0" width="80%"  bgcolor="#f0f0f0" style="border:1px solid #ccc; margin:0 auto; position:relative;">
<thead>
<tr>
<th colspan="2">.:: Atualizar Agenda ::.</th>
</tr>
</thead>
<tbody>
<tr>
<td width="14%">Evento:</td>
<td width="86%"><input type="text" name="evento" value="<?php echo $evento; ?>" class="campo" /></td>
</tr>
<tr>
<td>Data:</td>
<td><input type="text" name="dtevento" value="<?php echo $dtevento; ?>"  class="campo"/>
dd-mm-aaaa</td>
</tr>
<tr>
<td>Hora:</td>
<td>
   <input type="text" name="hora" value="<?php echo $hora; ?>"  class="campo"/>
   hh:mm</td>
</tr>
<tr>
  <td>Local:</td>
  <td><input name="local" type="text" class="campo" id="local" value="<?php echo $local; ?>"></td>
</tr>
<tr>
<td>Autor:</td>
<td><input name="autor" type="text" class="campo" id="autor" value="<?php echo $autor; ?>"></td>
</tr>
<tr>
<td valign="top">Descrição:</td>
<td><textarea name="desc" rows="8" cols="20" class="campo"><?php echo $desc; ?></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Atualizar Agenda" />
  <input type="button" name="button" id="button" onclick="javascript:location.href='listagenda.php';" value="Cancelar" />
  <input type="hidden" name="done" value="" /><input name="id" type="hidden" value="<?php echo $id; ?>" /></td>
</tr>
</tbody>
</table>
</form>