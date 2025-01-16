<?php 
    require '../config/function.php';

    // create
    if (isset($_POST['saveUser'])) {

        $name=validate($_POST['name']);
        $phone=validate($_POST['phone']);
        $email=validate($_POST['email']);
        $password=validate($_POST['password']);
        $role=validate($_POST['role']);
        $is_ban=validate($_POST['is_ban'])==true ? 1: 0 ;
        echo $is_ban;
  

        if ($name !="" || $phone !="" ||  $email !="" ||   $password !="") {
            $query="INSERT INTO users (name,phone,email,password, is_ban,role) VALUES ('$name', '$phone', '$email', '$password', $is_ban, '$role')";

            $result=mysqli_query($conn,$query);
            if ($result) {
                redirect("users.php","User/ Admin Added Succesfully");
            }
            else{
                redirect('users-create.php',"Something Went Wrong");
            }
        }
        else{
            redirect('users-create.php',"Please fill the all the inputs!");
  
        }
    }
    
    
    // update
    if (isset($_POST['updateUser'])) {
        $name=validate($_POST['name']);
        $phone=validate($_POST['phone']);
        $email=validate($_POST['email']);
        $password=validate($_POST['password']);
        $role=validate($_POST['role']);
        $is_ban=validate($_POST['is_ban'])==true ? 1: 0 ;
        
        $userId=validate($_POST['userId']);
       

        $user=getById('users',$userId);

        // by cedvelde bu id-nin olub olmadigini yoxlayiriq
        if ($user['status'] !=200) {
            redirect('users-edit.php?id='.$userId,"Nu such id found");

        }
    
        if ($name !="" || $phone !="" ||  $email !="" ||   $password !="") {
            $query="UPDATE   users SET 
            name='$name',
            phone='$phone',
            email='$email',
            password='$password', 
            is_ban='$is_ban',
            role='$role'
            WHERE id='$userId'
            ";
    
            $result=mysqli_query($conn,$query);
            if ($result) {
                redirect('users-edit.php?id='.$userId,"User/ Admin Updated Succesfully");
            }
            else{
                redirect('users-create.php',"Something Went Wrong");
            }
        }
        else{
            redirect('users-create.php',"Please fill the all the inputs!");
    
        }
        
    }
?>