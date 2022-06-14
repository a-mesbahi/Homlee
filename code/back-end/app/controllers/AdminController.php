<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;



class AdminController extends Checker{
    // private $jwt="";

    
    public function getAds()
    {
        $admin = new Admin();
        $ad = $admin->getAd();

        $array = array();
        $array['data'] = array();

        if($ad){
            extract($ad);
            $array['data']=array(
                'id'=>$id,
                'img'=>$img_url
            );
        }
        echo json_encode($array);
    }

    public function getOrders()
    {
        $orders = new Orders();

        $results = $orders->get();
        if($results){
            $array = array();
            $array['data'] = array();

            while($row = $results->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $orders = array(
                    'id'=>$id,
                    'clientName'=>$fullname,
                    'orderAddress'=>$address,
                    'order_date'=>$order_date,
                    'product_category'=>$category,
                    'product_name'=>$name,
                    'completed'=>$completed,
                    'img'=>$img
                );

                array_push($array['data'],$orders);
            }
        echo json_encode($array);
        }else
        {
            echo json_encode(
                array('message'=>'no data is here')
            );
        }
    }

    public function login()
    {
        $data =json_decode(file_get_contents("php://input"));
        if(isset($data->email) && isset($data->password)){
            $emailCheck = $data->email;
            $passwordCheck = $data->password;
        }
        if(isset($emailCheck) && isset($passwordCheck))
        {
            $data =[];
            $data['data'] =[];
            $admin = new Admin();
            if($result = $admin->login()){
                $result = extract($result);
                if(password_verify($passwordCheck,$password)){
                    $iat = time();
                    $payload_info = array(
                        "iss"=>"localhost",
                        "iat"=>$iat ,
                        "nbf"=>$iat+10,
                        "exp"=>$iat+86400,
                        "aud"=>"myusers",
                        "data"=>array(
                            "id"=>$id
                        ),
                    );
                    $secret_key = "msbToken";
                    session_start();
                    $_SESSION['jwt'] = JWT::encode($payload_info,$secret_key,'HS256');
                    $data['data'] = array(
                        "status"=>1,
                        "id"=>$id
                    );
                    echo json_encode($data);
                }else{
                    $data['data'] = array(
                        'error'=>true,
                        'message'=>'Invalid login details'
                    );
                    echo json_encode($data);
                }
                
            }else{
                $data['data'] = array(
                    'error'=>true,
                    'message'=>'user not found'
                );
                echo json_encode($data);
            }
        }

    }

    public function sendEmail()
    {
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;
        session_start();
        $jwt = $_SESSION['jwt']; 
        $data =json_decode(file_get_contents("php://input"));
        $result = parent::check($jwt,$id);
        if($result){
            $name = $data->name;
            $body = $data->body;
            $email = $data->email;
            $subject = $data->subject;

            $emailSend = new SendEmail();
            $result = $emailSend->admin($subject,$body,$name,$email);
            if($result){
                echo json_encode(
                    array("message"=>"Your email has been sent")
                );
            }else
            {
                echo json_encode(
                    array("message"=>"your email was not sent")
                );
            }
        }else{
            http_response_code(500);
        }

    }



}


