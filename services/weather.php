<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set('error_log','../cloubank.log');

    function getWeatherUpdate(){
        $endpoint = "https://weatherdbi.herokuapp.com/data/weather/ibadan";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        try{
            $responseData = curl_exec($curl);
            if($responseData == false){
                throw new Exception(curl_error($curl));
            }
            curl_close($curl);
            return json_decode($responseData);
        }
        catch(Exception $e){
            error_log($e->getMessage(), 3, '../cloubank.log');
        }
        

        
    }
    $weather = getWeatherUpdate();

?>