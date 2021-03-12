<?php
	
	$host = 'locahost';
	$dbname = 'teste';
	$user = 'root';
	$pass = '';
	$charset = 'utf8';

	//PARA INFINITYFREE
	/*
	$user = 'epizy_xxxxx'; //usuário do infinytefree
	$pass = 'xxxxxx'; //senha do mysql/ftp pegar no Cpaniel databases
	$charset = 'utf8';
	*/

	try{
        $db = new PDO("mysql:dbhost=$host;dbname=$dbname;charset=$charset", "$user", "$pass");
		//PARA INFINITYFREE o código tem particularidades
		// não tem o db no host
		// tem que colocar direto o host e  dbname
		//$db = new PDO('mysql:host=sql112.epizy.com;dbname=epiz_27898352_teste;charset=utf8', $user, $pass);

        echo "Conexão com sucesso";
        //return $db;
	}catch( PDOException $e ){
        echo "Erro ao conectar banco de dados: ".$e->getMessage();
        exit();
	}