<?php

class GalleryController{

    public function get()
    {
        $pictures = new Gallery();
        $results = $pictures->get();
        if($results){
            $array = array();
            $array['data'] = array();

            while($row = $results->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                
                $pictures = array(
                    'id'=>$id,
                    'url'=>$url,
                    'description'=>$description,
                    'date_creation'=>$date_creation,
                    'title'=>$title
                );

                array_push($array['data'],$pictures);
            }
        echo json_encode($array);
        }else
        {
            echo json_encode(
                array('message'=>'no data is here')
            );
        }
    }


    public function getForAdmin()
    {
        $pictures = new Gallery();
        $results = $pictures->three();
        if($results){
            $array = array();
            $array['data'] = array();

            while($row = $results->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                
                $pictures = array(
                    'id'=>$id,
                    'url'=>$url,
                    'description'=>$description,
                    'date_creation'=>$date_creation,
                    'title'=>$title
                );

                array_push($array['data'],$pictures);
            }
        echo json_encode($array);
        }else
        {
            echo json_encode(
                array('message'=>'no data is here')
            );
        }
    }

    public function add()
    {
        $data =json_decode(file_get_contents("php://input"));

        if(isset($data->url) && isset($data->title) && isset($data->description)){
            $url = $data->url;
            $title = $data->title;
            $description = $data->description;
        }else{
            echo "Your infos are empty";
        }


        if(isset($url) && isset($title) && isset($description) )
        {
            $gallery = new Gallery();
            if($gallery->insert($title,$url,$description)){
                http_response_code(200);
                echo json_encode(
                    array("message"=>"Your account have been created")
                );
            }else
            {
                http_response_code(400);
                echo json_encode(
                    array("message"=>"Client Account not created")
                );
            }
        }
    }

}