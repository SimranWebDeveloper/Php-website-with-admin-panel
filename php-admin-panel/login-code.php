<?php 
require 'config/function.php';

    if (isset($_POST['loginBtn'])) {
        
        $emailInput=validate($_POST['email']);
        $passwordInput=validate($_POST['password']);

        $email=filter_var($emailInput,FILTER_SANITIZE_EMAIL);
        $password=filter_var($passwordInput,FILTER_SANITIZE_STRING);

        if ($email!='' && $password!='') {
            $query="SELECT * FROM users WHERE email='$email' && password='$password' LIMIT 1";
            $result=mysqli_query($conn,$query);

            if ($result) {
                if (mysqli_num_rows($result)==1) {
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    if ($row['role']=='admin') {

                        //eger banlanibsa (deyeri 1-dirse)
                        if ($row['is_ban'] == 1) {
                           
                            redirect('login.php','Your acount has been banned.Please contact with admin');
                        }

                        $_SESSION['auth']=true;
                        $_SESSION['loggedInUserRole']=$row['role'];
                        $_SESSION['loggedInUser']=[
                            'name'=>$row['name'],
                            'email'=>$row['email'],
                        ];
                        redirect('admin/index.php','Loged In Successfully');
                    }else{
                        if ($row['is_ban'] == 1) {
                           
                            redirect('login.php','Your acount has been banned.Please contact with admin');
                        }

                        $_SESSION['auth']=true;
                        $_SESSION['loggedInUserRole']=$row['role'];
                        $_SESSION['loggedInUser']=[
                            'name'=>$row['name'],
                            'email'=>$row['email'],
                        ];
                        redirect('index.php','Loged In Successfully');
                    }

                }else{

                    redirect('login.php','Invalid email or password');
                }
            }else{
                redirect('login.php','Something went wrong');
            }

            
        }else{
            redirect('login.php',"All Fields are mandatory");
        }
    }
?>