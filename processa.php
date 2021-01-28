<?php
$cont = 0;
	include_once("conexao.php");
	
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);
	
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
				

				$matricula = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				echo "Matricula: $matricula <br>";

				$nome = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				echo "Nome: $nome <br>";
				
				$cpf = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				echo "CPF: $cpf <br>";

				$email = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				echo "E-mail: $email <br>";
				
				$idcurso = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				echo "Id do Curso: $idcurso <br>";
				
				$idsemestre = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				echo "Id do Semestre: $idsemestre <br>";

				echo "<hr>";
				
				//Inserir o usuário no BD
				$cont++;
				$result_usuario = "INSERT INTO aluno(matricula, nome, cpf, email, idcurso, idsemestre) VALUES ('$matricula', '$nome', '$cpf', '$email', '$idcurso','$idsemestre')";

				$resultado_usuario = mysqli_query($conn, $result_usuario);

			}
			$primeira_linha = false;
		}
	}
		echo $cont;
?>