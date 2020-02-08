<!DOCTYPE >
<?php
// Ligação à base de dados
$opcoes = "";
$pdo = new PDO('mysql:host=localhost;dbname=ia', 'root', 'root');
$stmt = $pdo->prepare("SELECT Conselho FROM Conselhos;");
$stmt->execute();
$data = $stmt->fetchAll();
$interacao = 0;
//Ao clicar em calcular
if (isset($_POST['cidade'])) {
$cidade = $_POST['cidade'];
//	if($cidade == 'Guarda'){
//		echo 'Não há caminho';
//	} else{
//  
//Raiz do Grafo
$grafo[] = array(
	'cidade' => $cidade,
	'dist_real' => 0,
	'dist_linha_reta' => DevolveDistReta($pdo, $cidade),
	'distancia_total' => DevolveDistReta($pdo, $cidade),
	'filhos' => DevolveFilhos($pdo, $cidade, 0, true),
	'pai' => null
);
$cidade = "xxx";
while ($cidade != "Guarda") {
	//Precorrer o Array $grafo[0...x][cidade] = Guarda
	//Procura o filho com menor custo
	$aux = 0;
	$menor = 9999999;
	$i_g = 0; //i guardado
	$j_g = 0; //j Guardado
	for ($i = 0; $i < count($grafo); $i++) {
		//Procura os filhos
		for ($j = 0; $j < count($grafo[$i][filhos][$j]); $j++) {
			if ($grafo[$i][filhos][$j]["expandida"] == false) { //só analiza os filhos que ainda não foram expandidos
				$aux = $grafo[$i][filhos][$j][distancia_total];
				if ($aux < $menor) {
					$menor = $aux;
					//Guarda coordenadas do Array com a distância_total mais pequena
					$i_g = $i;
					$j_g = $j;
					echo '<p>' . $menor . '</p>';
				}
			}
		}
		echo '<p> Mais Pequeno= ' . $menor . '</p>';
	}
	echo "count:" . count($grafo);
	//Depois de percorrer a arvore toda, seleciona a cidade com valor mais baixo expande-a e coloca o campo ["expandida"] = a true das coordenadas guardadas
	//guarda tambem o valor da distância real e cria um novo nó
	echo '-' . $menor . '-';
	$grafo[$i_g][filhos][$j_g][expandida] = true; //atualiza o filho a expandir
	//cria um novo nó com o filho expandido

	$cidade = $grafo[$i_g][filhos][$j_g][cidade];
	$distancia_reta = $grafo[$i_g][filhos][$j_g][dist_linha_reta];
	$grafo[] = array(
		'cidade' => $cidade,
		'dist_real' => $grafo[$i_g][filhos][$j_g][dist_real],
		'dist_linha_reta' => $grafo[$i_g][filhos][$j_g][dist_linha_reta],
		'distancia_total' => $grafo[$i_g][filhos][$j_g][distancia_total],
		'filhos' => DevolveFilhos($pdo, $grafo[$i_g][filhos][$j_g][cidade], $grafo[$i_g][filhos][$j_g][dist_real]),
		'pai' => $i_g
	);

	echo '<p>' . $cidade . '</p>';
}
//	$grafo[] = array(
//		'cidade' => $grafo[$i_g][filhos][$i_g][cidade],
//		'distancia_reta' => DevolveDistReta($pdo, $grafo[$i_g][filhos][$i_g][cidade]),
//		'filhos' => DevolveFilhos($pdo, $grafo[$i_g][filhos][$i_g][cidade], 0),
//		'pai' => $i_g //O pai refere-se ao nó para depois se poderem ir buscar as distâncias
//	);
//Depois de criar o nó vai percorrer novamente o array
//Arranjar forma de acumular distância anterior
echo '</br>';
echo 'I=' . $i_g . '</br>';
echo 'J=' . $j_g . '</br>';
echo 'Menor=' . $menor;
echo '<pre>';
var_dump($grafo);
echo '</pre>';
//	}
//Enquanto Grafo[x] []
}
//$distância2 = DevolveLigacoes($pdo, "Trancoso");
//echo'<pre>';
//var_dump($distância2);
//echo '</pre>';


/* Função que devolve distâncias em linha reta */
function DevolveDistReta($pdo, $Origem, $Destino = "Guarda") {
$stmt = $pdo->prepare("SELECT Distancia FROM DistanciaLinhaReta WHERE Origem = '" . $Origem . "'");
$stmt->execute();
$resultado = $stmt->fetch();
return $resultado["Distancia"];
}
/* Função que devolve distâncias reais */
function DevolveDistReal($pdo, $Origem, $Destino) {
//SELECT Distancia FROM Distancias WHERE (Destino='destino' AND Origem='Origem')OR(Origem='destino' AND Destino='origem')
$stmt = $pdo->prepare("SELECT Distancia "
		. "FROM Distancias "
		. "WHERE (Destino = '" . $Destino . "' AND Origem = '" . $Origem . "') "
		. "OR (Destino = '" . $Origem . "' AND Origem = '" . $Destino . "');");
$stmt->execute();
$resultado = $stmt->fetch();
return $resultado["Distancia"];
}
/* Função que devolve Ligações do ramo */
function DevolveFilhos($pdo, $no_ramo, $quantidade, $raiz = false) {
//SELECT Distancia FROM Distancias WHERE (Destino='destino' AND Origem='Origem')OR(Origem='destino' AND Destino='origem')
$stmt = $pdo->prepare("SELECT Origem, Destino FROM ia.Distancias "
		. "WHERE Origem='" . $no_ramo . "' OR Destino='" . $no_ramo . "';");
$stmt->execute();

while ($row = $stmt->fetch()) {
	//Quantidade Acumulada
	$distanciaReal = $quantidade + DevolveDistReal($pdo, $row["Origem"], $row["Destino"]);
	if ($no_ramo == $row["Origem"]) {
		$distanciaLinhaReta = DevolveDistReta($pdo, $row["Destino"]);
		$filhos[] = array(
			'cidade' => $row["Destino"],
			'dist_real' => $distanciaReal,
			'dist_linha_reta' => $distanciaLinhaReta,
			'distancia_total' => $distanciaReal + $distanciaLinhaReta,
			'expandida' => false
		);
	} else {
		$distanciaLinhaReta = DevolveDistReta($pdo, $row["Origem"]);
		$filhos[] = array(
			'cidade' => $row["Origem"],
			'dist_real' => $distanciaReal,
			'dist_linha_reta' => $distanciaLinhaReta,
			'distancia_total' => $distanciaReal + $distanciaLinhaReta,
			'expandida' => false
		);
	}
}
return $filhos;
}
//Função para calcular distância Acumulada
function CalculaDistanciaAcumulada($pdo, $i_g) {
$pai = $grafo[$i_g][pai];
$filho = $i_g;
$distancia_acumulada = 0;

while ($pai != 0) {
	$paiCidade = $grafo[$pai][cidade];
	$filhoCidade = $grafo[$filho][cidade];
	//Calcular a distância entre o pai e o filho
	$distancia_acumulada+=DevolveDistReal($pdo, $paiCidade, $filhoCidade);
	$filho = $pai;
	$pai = $grafo[$pai][pai];
}
return $distancia_acumulada;
}
?>
<html>
<head>
</head>
<body>
	<form method="post" action="">
		<table>
			<tr>
				<td>Origem:</td>
				<td>
					<select name="cidade">
<?php foreach ($data as $row): ?>
							<option value="<?= $row["Conselho"] ?>"><?= $row["Conselho"] ?></option>
<?php endforeach ?>
					</select>
				</td>
				<td>
					<input type="submit" value="Calcular">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>