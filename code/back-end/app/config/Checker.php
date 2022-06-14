<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Checker {
    static public function check($jwt)
    {
        if(isset($jwt)){
            try{
                $secret_key = "msbToken";
                $decoded_data = JWT::decode($jwt,new Key($secret_key,'HS256'));
                http_response_code(200);
                $idCheck = $decoded_data->data->id; 
                return $idCheck;
            }catch(Exception $ex){
                http_response_code(500);
                echo json_encode(array(
                    "status"=>0,
                    "message"=>$ex->getMessage()
                ));
            }
        }
    }
}