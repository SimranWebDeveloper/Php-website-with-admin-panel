<?php 

if (isset($_SESSION['auth'])) {
   
    if (isset($_SESSION['loggedInUserRole'])) {
        
        $role=validate($_SESSION['loggedInUserRole']);
        $email=validate($_SESSION['loggedInUser']['email']);

        $query="SELECT * FORM users WHERE email='$email' AND role='$role' LIMIT 1 ";
        $result=mysqli_query($conn,$query);

        if ($result) {
            
            if (mysqli_num_rows($result)==0) {

                logoutSession();
                redirect('../login.php','Access Denied');
            }
        }else{

            logoutSession();
            redirect('../login.php','Something Went Wrong!');

        }
    }
}else{
    redirect('../login.php','Login to Continiue...');
}


?>