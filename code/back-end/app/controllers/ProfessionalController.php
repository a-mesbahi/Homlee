<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../vendor/autoload.php';
session_start();

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ProfessionalController extends Checker{


    public function findAllProfessionals()
    {
        $professionals = new Professional();
        $results = $professionals->get();
        if($results){
            $array = array();
            $array['data'] = array();

            while($row = $results->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                
                $professionals = array(
                    'id'=>$id,
                    'business_name'=>$business_name,
                    'professional_category'=>$professional_category,
                    'phone_number'=>$phone_number,
                    'name'=>$name,
                    'address'=>$address,
                    'business_site'=>$business_site,
                    'email'=>$email,
                    'business_img'=>$business_img,
                    
                );
                array_push($array['data'],$professionals);
            }
        echo json_encode($array);
        }else
        {
            echo json_encode(
                array('message'=>'no data is here')
            );
        }
    }   


    public function addProfessional()
    {
        $data =json_decode(file_get_contents("php://input"));

        if(isset($data->business_name) && isset($data->professional_category) && isset($data->phone_number)&& isset($data->name) && isset($data->password) && isset($data->address) && isset($data->business_site) && isset($data->email) && isset($data->business_img)){
            $business_name = $data->business_name;
            $business_site = $data->business_site;
            $phone_number = $data->phone_number;
            $professional_category = $data->professional_category;
            $name = $data->name;
            $email = $data->email;
            $address = $data->address;
            $business_img = $data->business_img;
            $password  = password_hash($data->password, PASSWORD_DEFAULT);
        }else{
            echo "Your infos are empty ";
        }

        if(isset($business_name) && isset($professional_category) && isset($phone_number)&& isset($name) && isset($password) && isset($address) && isset($business_site) && isset($email) && isset($business_img))
        {
            $professional = new Professional();
            if($id = $professional->insert($business_name, $professional_category, $phone_number, $name, $address,$business_site,$email ,$password,$business_img)){
                echo json_encode(
                    array(
                        "message"=>"Your account have been created",
                        "id"=>$id
                    )
                );
            }else
            {
                echo json_encode(
                    array("message"=>"Client Account not created")
                );
            }
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
            $client = new Professional();
            if($result = $client->getProfessional($emailCheck)){
                $result = extract($result);
                if(password_verify($passwordCheck,$password)){
                    $iat = time();
                    $payload_info = array(
                        "iss"=>"localhost",
                        "iat"=>$iat ,
                        "nbf"=>$iat,
                        "exp"=>$iat+86400,
                        "aud"=>"myusers",
                        "data"=>array(
                            "id"=>$id
                        ),
                    );
                    $secret_key = "msbToken";
                    $jwt = JWT::encode($payload_info,$secret_key,'HS256');
                    $data['data'] = array(
                        'error'=>false,
                        'token'=>$jwt,
                        'business_name'=>$business_name,
                        'professional_category'=>$professional_category,
                        'phone_number'=>$phone_number,
                        'name'=>$name,
                        'address'=>$address,
                        'business_site'=>$business_site,
                        'email'=>$email,
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

    public function addProject()
    {
        $data =json_decode(file_get_contents("php://input"));
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $result = parent::check($token);
        if($result){
            if(isset($data->img) && isset($data->title) && isset($data->tags) && isset($data->date) && isset($data->description)){
                $idProfessional = $result;
                $img = $data->img;
                $title = $data->title;
                $description = $data->description;
                $tags = json_encode($data->tags);
                $date = $data->date;
            }else{
                echo "Your infos are empty";
            }
    
            if(isset($idProfessional) && isset($title) && isset($tags)&& isset($img) && isset($date) && isset($description) )
            {
                $professional = new Projects();
                if($idProject = $professional->insert($idProfessional,$title,$description,$tags,$img,$date)){
                    echo json_encode(
                        array(
                            "message"=>"Your project have been created",
                            "id"=>$idProject
                        )
                    );
                }else
                {
                    echo json_encode(
                        array("message"=>"Professional project not created")
                    );
                }
            }
        }else{
            http_response_code(500);
        }
    }

    public function editProfile()
    {
        $data =json_decode(file_get_contents("php://input"));
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $result = parent::check($token);
        if($result && $data){
            $id = $result;
            $business_name = $data->business_name;
            $business_site = $data->business_site;
            $phone_number = $data->phone_number;
            $professional_category = $data->professional_category;
            $name = $data->name;
            $email = $data->email;
            $address = $data->address;
        }else{
            echo "Your infos are empty";
        }
            $product = new Professional();
            if($product->update($id,$business_name,$professional_category,$phone_number,$name,$address,$business_site,$email)){
                echo json_encode(
                    array("update"=>"Success")
                );
            }else
            {
                echo json_encode(
                    array("message"=>"your profile has not been modified")
                );
            }
    }

    public function getOnePro()
    {
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $id = parent::check($token);
        $product = new Professional();
        $data = [];
        $data['data'] = [];
        if($result= $product->single($id)){
            extract($result);
            $array=array(
                'id'=>$id,
                'business_name'=>$business_name,
                'business_site'=>$business_site,
                'phone_number'=>$phone_number,
                'name'=>$name,
                'address'=>$address,
                'city'=>$city,
                'professional_category'=>$professional_category,
                'email'=>$email,
            );
            array_push($data['data'],$array);
        }
        echo json_encode($data);
    }

    public function changePassword()
    {
        $data =json_decode(file_get_contents("php://input")); 
        $oldPassword = $data->oldPassword;
        $newPassword = $data->newPassword;
        $id = $data->id;
        if($oldPassword && $newPassword && $id){
            $professionalModel = new Professional();
            $professional = $professionalModel->single($id);
            if($professional){
                extract($professional);
                if(password_verify($oldPassword,$password)){
                    $newPassword  = password_hash($newPassword, PASSWORD_DEFAULT);
                    if($professionalModel->changePassword($newPassword,$id)){
                        echo json_encode(array(
                            "message"=>"your password has been modified"
                        ));
                    }
                }
            }
            
        }
    }
    
    public function getProjects()
    {   
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $id = parent::check($token);
        $projects = new Projects();
        $results = $projects->getProfProjects($id);
        if($results){
            $array = array();
            $array['data'] = array();

            while($row = $results->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $projects = array(
                    'id'=>$id,
                    'idProfessional'=>$idProfessional,
                    'title'=>$title,
                    'description'=>$description,
                    'tags'=>json_decode($tags),
                    'img'=>$img,
                    'date'=>$date
                );

                array_push($array['data'],$projects);
            }
        echo json_encode($array);
        }else
        {
            echo json_encode(
                array('message'=>'no data is here')
            );
        }   
    }

    public function getSingleProjct($id)
    {
        $data =json_decode(file_get_contents("php://input"));
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $result = parent::check($token);
        $data = [];
        $data['data'] = [];
        if($result){
            $projects = new Projects();
            $project = $projects->getSingle($id);
            extract($project); 
            if($result==$idProfessional)  {
                $array=array(
                    'id'=>$id,
                    'idProfessional'=>$idProfessional,
                    'title'=>$title,
                    'description'=>$description,
                    'tags'=>json_decode($tags),
                    'img'=>$img,
                    'date'=>$date,
                );
                array_push($data['data'],$array);
                echo json_encode($data);
            }else{
                http_response_code(400);
            }
        }
    }

    public function updateProject()
    {
        $data =json_decode(file_get_contents("php://input"));
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $id = parent::check($token);
        if($data  && $id){
            $id = $data->id;
            $title = $data->title;
            $description = $data->description;
            $tags = json_encode($data->tags);
            $img = $data->img;
            $projects = new Projects();
            $results = $projects->update($id,$title,$description,$tags,$img);
            if($projects->update($id,$title,$description,$tags,$img)){
                echo json_encode(
                    array("update"=>"Success")
                );
            }else
            {
                echo json_encode(
                    array("message"=>"Porduct  not updated")
                );
            }    
        }else{
            echo "Your infos are empty";
        }
    }

    public function deleteProject($id)
    {   
        $data =json_decode(file_get_contents("php://input"));
        $headers = getallheaders();
        $token = $headers["Authorization"];
        $result  = parent::check($token);
        $product = new Projects();
        if($result){
            if($product->delete($id)){
                echo json_encode(
                    array("message"=>"Product deleted")
                );
            }else
            {
                echo json_encode(
                    array("message"=>"Product not deleted")
                );
            
            }
        }
    }
}