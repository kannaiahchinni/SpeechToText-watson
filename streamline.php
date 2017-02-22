<?php


	 $type = $_GET['type'];

	/**
	* 
	*/
	class SpeechUtil 
	{

		var $method = 'GET';
		
		// Speech to Text configuration.... 

		var $sttServiceUrl  = 'https://stream.watsonplatform.net/authorization/api/v1/token?url=https://stream.watsonplatform.net/speech-to-text/api';
		var $sttUserName = '65f9c5a5-1acb-46d2-bf72-1d03bf90b227';
		var $sttPassword = 'zYoPJwjNszJZ';

		var $ttsServiceUrl = 'https://stream.watsonplatform.net/authorization/api/v1/token?url=https://stream.watsonplatform.net/text-to-speech/api';
		var $ttsUserName ='6297332b-1ea7-4d5e-b2d4-69d09a2ea775';
		var $ttsPassword = '4NHFfvSKFrf2';
		
		

		function getTTSToken(){

			return $this->getToken($this->ttsServiceUrl,$this->ttsUserName,$this->ttsPassword);

		}

		function getSTTToken(){
			 return $this->getToken($this->sttServiceUrl,$this->sttUserName,$this->sttPassword);
		}


		function getToken($url,$username,$password){

			  $baseString = base64_encode($username.':'.$password);
			      $curl = curl_init();

   					 curl_setopt_array($curl, array(
   					 CURLOPT_URL => $url,
 					 CURLOPT_RETURNTRANSFER => true,
 					 CURLOPT_SSL_VERIFYHOST => false,
 					 CURLOPT_SSL_VERIFYPEER => false,
 					 CURLOPT_ENCODING => "",
 					 CURLOPT_MAXREDIRS => 10,
 					 CURLOPT_TIMEOUT => 30,
  					 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  					 CURLOPT_CUSTOMREQUEST => $this->method,
  						CURLOPT_HTTPHEADER => array(
      					"authorization: Basic ".$baseString,
      					"cache-control: no-cache",
      				 	),
     				 ));
      			$response = curl_exec($curl);
     			 $err = curl_error($curl);

 			 curl_close($curl);

  			if ($err) {
     			   return "cURL Error #:" . $err;
     		 } else {
     			  return $response;
    		 }


			return '';
		}
	}


     $object  = new SpeechUtil;

     if($type === "stt"){

     	echo $object->getSTTToken();

     	

     }else if($type === "tts"){

     	echo $object->getTTSToken();

     }else{

     	echo "not a vaid request... Please pass valid parameter... oooppssss";
     }




 ?>