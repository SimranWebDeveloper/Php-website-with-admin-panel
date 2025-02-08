<?php 
require "../config/function.php";

// Burdaki id-ni biz social-media.php sehivesinde 'delete' duymesine basanda gonderirik 
// ve checkParamId icerisinde onu isset($_GET[$paramType]) tuturuq
$paramResult=checkParamId('id');

if (is_numeric($paramResult)) {
    $socialMediaId=validate($paramResult);


    $socialMedia=getById('social_medias',$socialMediaId);
    if ($socialMedia['status']==200) {
       
        $socialMediaDeleteRes=deleteQuery('social_medias',$socialMediaId);
        if ($socialMediaDeleteRes) {
            
            redirect('social-media.php',"social Media deleted Successfuly");
        }else{
            
            redirect('social-media.php',"Something went wrong");
        }

    }else{
        redirect('social-media.php',$socialMedia['message']);
        
    }


}else{
    redirect('social-media.php',$paramResult);
    
}

?>