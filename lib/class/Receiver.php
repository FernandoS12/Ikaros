<?php

	/**
	* ==============================
	* Receiver
	* ==============================
	*/

	class Receiver {

		public static function receive($method){
			$keys = explode(",", $keys);
			$array = array();

			$method = ($method == "post" || $method == "POST") ? $_POST : $_GET;

			foreach($keys as $value){
				if(isset($method[$value])){

					if(!$allowEmpty && empty($method[$value])){
						return null;
					}

					$array[$value] = $allowHTML ? $method[$value] : strip_tags($method[$value]);

				}elseif(isset($_FILES[$value])){

					if(!$allowEmpty && empty($_FILES[$value])){
						return null;
					}

					$array[$value] = $_FILES[$value];

				}else{
					return null;
				}
			}
			return $array;
		}
	}
?>