<?php 

if (isset($_SESSION['auth'])) {
   
    if (isset($_SESSION['loggedInUserRole'])) {
        
        $role=validate($_SESSION['loggedInUserRole']);
        $email=validate($_SESSION['loggedInUser']['email']);

        $query="SELECT * FROM users WHERE email='$email' AND role='$role' LIMIT 1";
        $result=mysqli_query($conn,$query);
        // eger bu adda istifadeci varsa($result gelen array)
        if ($result) {
            //eger bos bir obyekdirse yeniki hec bir netice gelmeyibse
            if (mysqli_num_rows($result)==0) {

                logoutSession();
                redirect('../login.php','Access Denied');
            }
            // eger heminki isdifadecinin email ve pass heqiqeten duzdur ve uygun netice donubse
            else{
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

                // eger rolu admin deyilse - yeniki user-ler admin panele gire bilmeyecek
                if ($row['role']!='admin') {
                    logoutSession();
                    redirect('../login.php','Access Denied');
                }

                //eger  ban(1) edilibse
                if ($row['is_ban']==1) {
                    logoutSession();
                    redirect('../login.php','Your account has been banned. Please contact  admin');
                }
            }
        }
        // eger bu adda istifadeci yoxdursa
        else{

            logoutSession();
            redirect('../login.php','Something Went Wrong!');

        }
    }
}
// eger isdifadeci helem login olmayibsa
else{
    redirect('../login.php','Login to Continiue...');
}


?>