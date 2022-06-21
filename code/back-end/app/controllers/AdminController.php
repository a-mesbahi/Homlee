<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;



class AdminController extends Checker{
    

    //function to get ads 
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

    //function for get orders for admin 
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

    //admin login function
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
                extract($result);
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
                    $jwt= JWT::encode($payload_info,$secret_key,'HS256');
                    $data['data'] = array(
                        "status"=>1,
                        "token"=>$jwt
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


    //send email function
    public function sendEmail()
    {
        $data = json_decode(file_get_contents("php://input"));
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $id = parent::check($token);
        if($id){
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

    public function complateOrder($id)
    {
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $result = parent::check($token);
        if($result){
            $orders = new Orders();
            if($orders->complate($id)){
                echo json_encode(
                    array(
                        "status"=>1,
                        "message"=>"order complated"
                    )
                );
            }
        }else{
            http_response_code(500);
        }
    }

}


