<?php

//criar a conexÃ£o com o banco

include "sql.php";



if(isset($_POST['done'])){

    

    $evento = $_POST['evento'];

    $dtevento = $_POST['dia']."-".$_POST['mes']."-".$_POST['ano'];

    $autor = $_POST['autor'];

	$hora = $_POST['hora'];

	$local = $_POST['local'];

    $conteudo = $_POST['conteudo'];



    

    if(empty($evento) || empty($dtevento) || empty($conteudo) || empty($local)){

        $erro = "Opa, você deve preencher todos os campos";

    }else{        

       $sql = mysqli_query($connection, "INSERT INTO `agenda`(`evento`, `dtevento`, `autor`, `hora`, `local`, `conteudo`) VALUES ('$evento', '$dtevento', '$autor', '$hora', '$local', '$conteudo')") or die(mysqli_error($connection));

            if($sql){

                $erro = "Dados cadastrados com sucesso!";

              } else{

                  $erro = "Não foi possivel cadastrar os dados";

              }

    }

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Agenda de Eventos by Gaspar</title>

<style type="text/css">

.campo{

width:400px;

}

</style>

</head>

<body>

<form name="form1" action="admin.php" method="POST" style="padding-top:40px;">

<?php

if(isset($erro)){

    print '<div style="width:80%; background:#ff6600; color:#fff; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';

}

?>

<table border="0" width="80%"  bgcolor="#f0f0f0" style="border:1px solid #ccc; margin:0 auto; position:relative;">

<thead>

<tr>

<th colspan="2">.:: Inserir Evento no Calendário ::.</th>

</tr>

</thead>

<tbody>

<tr>

<td width="20%">Evento:</td>

<td width="auto"><input type="text" name="evento" value="" class="campo" id="evento" /></td>

</tr>

<tr>

<td>Autor:</td>

<td><input name="autor" type="text" class="campo" id="autor" /></td>

</tr>

<tr>

<td>Data Evento:</td>

<td><select name="dia">
    

		<option>1</option>

        <option>2</option>

        <option>3</option>

        <option>4</option>

        <option>5</option>

        <option>6</option>

        <option>7</option>

        <option>8</option>

        <option>9</option>

        <option>10</option>

        <option>11</option>

        <option>12</option>

        <option>13</option>

        <option>14</option>

        <option>15</option>

        <option>16</option>

        <option>17</option>

        <option>18</option>

        <option>19</option>

        <option>20</option>

        <option>21</option>

        <option>22</option>

        <option>23</option>

        <option>24</option>

        <option>25</option>

        <option>26</option>

        <option>27</option>

        <option>28</option>

        <option>29</option>

        <option>30</option>

        <option>31</option>

</select>

  <select name="mes" >

  		<option>1</option>

        <option>2</option>

        <option>3</option>

        <option>4</option>

        <option>5</option>

        <option>6</option>

        <option>7</option>

        <option>8</option>

        <option>9</option>

        <option>10</option>

        <option>11</option>

        <option>12</option>

  </select>

  <select name="ano" > 
      <?php for($i=10;$i <=50; $i++) {
          # code...
        echo '<option>20'.$i.'</option>';
     } 
     ?>
  </select> 
  </td>

</tr>



<tr>

  <td>Hora:</td>

  <td><input name="hora" type="text" class="campo" id="hora">

    (hh:mm)</td>

</tr>

<tr>

<td>Local:</td>

<td><input name="local" type="text" class="campo" id="local"></td>

</tr>

<tr>

<td valign="top">Descricão:</td>

<td><textarea name="conteudo" rows="8" class="campo" >

</textarea></td>

</tr>

<tr>

<td></td>

<td><input type="submit" value="Cadastrar Evento" /><input type="hidden" name="done" value="" /></td>

</tr>

</tbody>

</table>

</form>

</body>

</html>