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


}