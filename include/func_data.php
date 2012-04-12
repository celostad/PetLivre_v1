<?
$h = getdate(); //variavel recebe a data
//$ha=date("H");
//$date =date("$ha:i");

$h_H=date("H");
$h_H = $h_H+2;

if ($h_H == 24){$h_H = 00;}
if ($h_H == 25){$h_H = 01;}
if ($h_H == 26){$h_H = 02;}

$date =date("$h_H:i");

$data_atual2 = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];


function Convert_Data_Port_Ingl($entradata){
    $conv1 = explode("/",$entradata);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

function Convert_Data_Ingl_Port($entradata){
    $conv1 = explode("-",$entradata);
    $conv2 = array_reverse($conv1);
    $saidata = implode("/",$conv2);
    return $saidata;
}




function diasemana() {
		$hoje = time();
		$ref = localtime($hoje, 1);
		$dia = $ref[tm_wday];

	//$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($dia) {
		case"0": $diasemana = "Domingo";       break;
		case"1": $diasemana = "Segunda-Feira"; break;
		case"2": $diasemana = "Terça-Feira";   break;
		case"3": $diasemana = "Quarta-Feira";  break;
		case"4": $diasemana = "Quinta-Feira";  break;
		case"5": $diasemana = "Sexta-Feira";   break;
		case"6": $diasemana = "Sábado";        break;
	}

	return $diasemana;
}

function diasemana2($data) {
	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana) {
		case"0": $diasemana = "Domingo";       break;
		case"1": $diasemana = "Segunda-Feira"; break;
		case"2": $diasemana = "Terça-Feira";   break;
		case"3": $diasemana = "Quarta-Feira";  break;
		case"4": $diasemana = "Quinta-Feira";  break;
		case"5": $diasemana = "Sexta-Feira";   break;
		case"6": $diasemana = "Sábado";        break;
	}

	return $diasemana;

	//echo "$diasemana";
}

function SubtrairData($data, $dias, $meses, $ano)
{
//passe a data no formato dd-mm-yyyy 
$data = explode("-", $data);
$newData = date("d-m-Y", mktime(0, 0, 0, $data[1] - $meses,
$data[0] - $dias, $data[2] + $ano) );
return $newData;

//Exemplo de como usar:
//echo SomarData("04/04/2007", 1, 2, 1);
// SOMAR DIAS = SomarData($data_atual2, DIAS, 0, 0);

}


function SomarData($data, $dias, $meses, $ano)
{
//passe a data no formato dd-mm-yyyy 
$data = explode("-", $data);
$newData = date("d-m-Y", mktime(0, 0, 0, $data[1] + $meses,
$data[0] + $dias, $data[2] + $ano) );
return $newData;

//Exemplo de como usar:
//echo SomarData("04/04/2007", 1, 2, 1);
// SOMAR DIAS = SomarData($data_atual2, DIAS, 0, 0);

}

?>
