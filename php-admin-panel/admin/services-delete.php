<?php 
require "../config/function.php";

// Burdaki id-ni biz social-media.php sehivesinde 'delete' duymesine basanda gonderirik 
// ve checkParamId icerisinde onu isset($_GET[$paramType]) tuturuq
$paramResult=checkParamId('id');

if (is_numeric($paramResult)) {
    $serviceId=validate($paramResult);


    $service=getById('services',$serviceId);
    if ($service['status']==200) {
       
        $serviceDeleteRes=deleteQuery('services',$serviceId);
        if ($serviceDeleteRes) {
            $deleteImage=$service['data']['image'];

            if (file_exists($deleteImage)){
                unlink($deleteImage);
            } 

            redirect('services.php',"social Media deleted Successfuly");
        }else{
            
            redirect('services.php',"Something went wrong");
        }

    }else{
        redirect('services.php',$service['message']);
        
    }


}else{
    redirect('services.php',$paramResult);
    
}

?>