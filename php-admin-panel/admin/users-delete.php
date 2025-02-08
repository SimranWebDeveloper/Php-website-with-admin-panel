<?php 
require "../config/function.php";

//yoxluyuruq o id-nin yuxaridaki url-de heqiqeten olub olmadigini
// yoxdursa users.php sehivesine getsin ve SESSIONA $paramResult yazdirsin
$paramResult=checkParamId('id');

if (is_numeric($paramResult)) {
    $userId=validate($paramResult);


    $user=getById('users',$userId);
    if ($user['status']==200) {
       
        $userDeleteRes=deleteQuery('users',$userId);
        if ($userDeleteRes) {
            
            redirect('users.php',"User deleted Successfuly");
        }else{
            
            redirect('users.php',"Something Went wrong");
        }

    }else{
        redirect('users.php',$user['message']);
        
    }


}else{
    redirect('users.php',$paramResult);
    
}

?>