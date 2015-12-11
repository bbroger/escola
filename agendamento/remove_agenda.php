<?php

	$nome="Felipe";
	$dia = isset($_POST["dia"]);
	$mes = isset($_POST["mes"]);
	$ambiente = isset($_POST["ambiente"]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo_teste.css">
	

	<link href='http://fonts.googleapis.com/css?family=Tienne' rel='stylesheet' type='text/css'>
	<title>Agendamento Ambientes e Laboratórios</title>
	<script type="text/javascript">
	function voltar(){
		alert("Voltando!");
		window.location.href=("index.php");
	}
	function direcionar(){
		window.location.href=("cad_agenda.php");
	}
	function sair(){
			window.location.href=("../");
		}
	</script>
</head>
<body bgcolor="#F6F5F3">

	<!--Corpo do Site-->
	<div class="container">
		<div class="row">
			<div class="col-xs-2 logo">
				<a href="../index.php"><img src="../img/ideallogo.png" width="150" height="150"></a>
			</div>
		<div class="col-xs-7 nome ">
			<h1>Sistema de Agendamento <br><small>Ambientes e Laboratórios | EEEP Antonio Rodrigues de Oliveira</small></h1>
		</div>

		<div class="col-xs-3 logout">
				Bem vindo ao  sistema <?php echo "$nome"?>!<br>
				<div class="btn btn-primary" onclick="sair()">Sair<span class="glyphicon glyphicon-arrow-right"></span></div>
			</div>
		</div>



		<div class="row">
			<div class="grid_12 espacoTopo">
				<hr>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-3  menu_esquerdo">
				<ul class="nav menu">
					<li><a href="cad_agenda.php"><span class="glyphicon glyphicon-plus"></span> Agendar Ambiente</a></li>
					<li><a href="atua_agenda.php"><span class="glyphicon glyphicon-ok-circle"></span> Visualizar Agenda</a></li>
				</ul>
			</div>
		 	
		 	<div class="col-xs-9">
			    <div class="row">
					<div class="grid_12 espaco">
					</div>
				</div>

			    <div class="row">
			    	<div class="col-xs-12">
			    		<table class="table table-hover">
				    	<thead>
				    		<tr>
				    			<th>#</th>
				    			<th>Ambiente</th>
				    			<th>Horário</th>
				    			<th>Professor</th>
				    			<th>Data</th>
				    		</tr>
				    	</thead>
				    	<tbody color = "red">
				    	 <?php 
					        $conecta = mysql_connect("localhost", "root", "felipe007") or print (mysql_error()); 
					        mysql_select_db("escola", $conecta) or print(mysql_error()); 
					        $sql = "SELECT id_ag, ambiente , horario , professor , dia, mes FROM tb_agendamento WHERE ambiente='$ambiente' OR (dia >= '$dia' AND mes >= '$mes') "; 
					        $result = mysql_query($sql, $conecta); 
					     	/* Escreve resultados até que não haja mais linhas na tabela */ 
					        while( $consulta = mysql_fetch_array($result)) {
					           print "<td>$consulta[id_ag]</td>";
					           print "<td>$consulta[ambiente]</td>"; 
					           print "<td>$consulta[horario]</td>";
					           print "<td>$consulta[professor]</td>"; 
					           print "<td>$consulta[dia] / $consulta[mes]</td>";
					           print "<td><a href='rem_agenda.php?id_ag=$consulta[id_ag]'><font color='red'><span color='red' class='glyphicon glyphicon-remove'></span></font></a></td>";
					           print "</tbody>";
					         } 
				    		print "</table>";
					        mysql_free_result($result); 
					        mysql_close($conecta); 
					     ?>
					    </div>
				</div>
			</div>
		</div>

		<!--Rodape do site. Ideal Empresa Junior-->
		<div class="row">
			<div class="col-xs-12 rodape">
				<footer>
					<a href="../idealjr.php">ideal Empresa Jr</a> - Todos os direitos reservados.
				</footer>
			</div>
		</div>
	</div>


	<script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
