<?php

	require_once('TwitterOAuth/vendor/autoload.php');
	require_once('DiskTools.php');

	
	use TwitterOAuth\Auth\SingleUserAuth;
	use TwitterOAuth\Serializer\ArraySerializer;



	function getDataTweets($username){

		$auth = new SingleUserAuth(array(
			'consumer_key' 			=> '',
			'consumer_secret' 		=> '',
			'oauth_token' 			=> '',
			'oauth_token_secret' 	=> ''
		), new ArraySerializer());

		$params = array(
			'screen_name' => $username,
			'count' => 4 //numero de tweets que deseo obtener
		);

		$response = $auth->get('statuses/user_timeline', $params);
		return $response;
	}

	function getData($userName){
		$disk 		= new DiskTools();
		$fileName = 'twitter-'.$userName.'.json';

		/*
			verificamos si existe el archivo si no existe pidemos la data y la guardamos
			si ya existe vificamos cuando tiempo ha pasado si ya paso mas de x tiempo volvemos a pedir los datos si no pedimos el archivo.json
		*/
		if($disk->existFile($fileName)){
			/*mayor a 15 minutos*/
			if($disk->getLastModify($fileName) > 15){
				$data = getDataTweets($userName);
				$disk->save($fileName,$data);
				return $disk->getDataFile($fileName);
			}else{
				/* aun no pasan los 15 minutos mandamos a pedir el archivo json*/
				return $disk->getDataFile($fileName);
			}
		}else{
			/*no existe el archivo pedimos los datos y creamos el json*/
			$data = getDataTweets($userName);
			$disk->save($fileName,$data);
			return $disk->getDataFile($fileName);
		}
	}

?>
