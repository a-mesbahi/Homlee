<?php


class ProductsController{

    public function findAllProducts()
    {
        
        $products = new Products();
        $results = $products->get();
        if($results){
            $array = array();
            $array['data'] = array();

            while($row = $results->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                
                $products = array(
                    'id'=>$id,
                    'name'=>$name,
                    'price'=>$price,
                    'category'=>$category,
                    'quantity'=>$quantity,
                    'sales'=>$sales,
                    'status'=>$status,
                    'img'=>$img,
                    
                );
                array_push($array['data'],$products);
            }
        echo json_encode($array);
        }else
        {
            echo json_encode(
                array('message'=>'no data is here')
            );
        }
    }  
    
    public function getBestsProducts()
    {
        $products = new Products();
        $results = $products->getTwenty();
        if($results){
            $array = array();
            $array['data'] = array();

            while($row = $results->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                
                $products = array(
                    'id'=>$id,
                    'name'=>$name,
                    'price'=>$price,
                    'category'=>$category,
                    'quantity'=>$quantity,
                    'sales'=>$sales,
                    'status'=>$status,
                    'img'=>$img,
                    
                );
                array_push($array['data'],$products);
            }
        echo json_encode($array);
        }else
        {
            echo json_encode(
                array('message'=>'no data is here')
            );
        }
    }
    public function saveProduct()
    {
        
        $data =json_decode(file_get_contents("php://input"));
        if(isset($data->name) && isset($data->price) && isset($data->category) && isset($data->quantity)&& isset($data->img)&& isset($data->description)){
            $name = $data->name;
            $category = $data->category;
            $price = $data->price;
            $quantity  = $data->quantity;
            $description  = $data->description;
            $img  = $data->img;
        }else{
            echo "Your infos are empty";
        }


        if(isset($name) && isset($category) && isset($price) && isset($quantity) && isset($img)&& isset($description) )
        {
            $client = new Products();
            if($id = $client->addProduct($name, $category, $price, $quantity,$img,$description)){
                echo json_encode(
                    array("id"=>$id)
                );
            }else
            {
                echo json_encode(
                    array("message"=>"Client Account not created")
                );
            }
        }
    }

    public function findOneProduct($id)
    {
        $product = new Products();
        $data = [];
        $data['data'] = [];
        if($result= $product->single($id)){
            extract($result);

            $array=array(
                'id'=>$id,
                'name'=>$name,
                'price'=>$price,
                'category'=>$category,
                'quantity'=>$quantity,
                'sales'=>$sales,
                'status'=>$status,
                'img'=>$img,
                'description'=>$description,
            );
            array_push($data['data'],$array);
        }
        echo json_encode($data);
    }

    public function updateProduct()
    {
        
        $data =json_decode(file_get_contents("php://input"));
        if($data){
            $id = $data->id;
            $name = $data->name;
            $category = $data->category;
            $price = $data->price;
            $quantity = $data->quantity;
            $img = $data->img;
            $description = $data->description;
            if($quantity==0){
                $status = "Not available";
            }else{
                $status = "Available";
            }
        }else{
            echo "Your infos are empty";
        }
            $product = new Products();
            if($product->update($id,$name,$price,$category,$status,$quantity,$img,$description)){
                echo json_encode(
                    array("update"=>"Success")
                );
            }else
            {
                echo json_encode(
                    array("message"=>"Client Account not created")
                );
            }
    
    }

    

}