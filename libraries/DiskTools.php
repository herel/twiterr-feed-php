<?php

	class DiskTools {
		const FOLDER_DATA = __DIR__.'../../data/';

		public function existFile($fileName){
			/*esta funcion nos permite verificar si existe o no el archivo*/
			return file_exists(self::FOLDER_DATA.$fileName);
		}

		public function  getLastModify($fileName){
			$time = filemtime(self::FOLDER_DATA.$fileName);
			$diff = time()-$time;
			$minutes = round($diff/60); 
			return $minutes;
			/*retorna el numero de minutos que han
			pasado desde la ultima modificación:*/
		}

		public function getDataFile($fileName){
			return json_decode(trim(file_get_contents(self::FOLDER_DATA.$fileName)));
			/* Abre el archivo json y convierte la data en un arreglo*/
		}

		public function save($fileName,$data){
			return file_put_contents(self::FOLDER_DATA.$fileName,json_encode($data), LOCK_EX);
			/*
				guardar los datos en el archivo .json
				LOCK_EX se usa para que no se escriba al mismo tiempo el archivo, 
				si llegan dos request y al mismo tiempo intenta escribir solo el que entro primero escribre el archivo.	
			*/
		}
	}
?>