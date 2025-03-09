<?php
require '../config/function.php';


// create
if (isset($_POST['saveUser'])) {

    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;



    if ($name != "" || $phone != "" ||  $email != "" ||   $password != "") {
        
         $hashedPassword=password_hash($password,PASSWORD_BCRYPT);

         $data=[
            'name'=> $name,
            'phone'=> $phone,
            'email'=> $email,
            'password'=> $hashedPassword,
            'role'=> $role,
            'is_ban'=> $is_ban,
         ];

         $result=insert('users',$data);

        // $query = "INSERT INTO users (name,phone,email,password, is_ban,role) VALUES ('$name', '$phone', '$email', '$hashedPassword', $is_ban, '$role')";

        // $result = mysqli_query($conn, $query);

        if ($result) {
            redirect("users.php", "User/ Admin Added Succesfully");
        } 
        else {
            redirect('users-create.php', "Something Went Wrong");
        }
    } 
    else {
        redirect('users-create.php', "Please fill the all the inputs!");
    }
}


// update
if (isset($_POST['updateUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;

    $userId = validate($_POST['userId']);


    $user = getById('users', $userId);

    // by cedvelde bu id-nin olub olmadigini yoxlayiriq
    if ($user['status'] != 200) {
        redirect('users-edit.php?id=' . $userId, "Nu such id found");
    }

    if ($name != "" || $phone != "" ||  $email != "" ||   $password != "") {

        $hashedPassword=password_hash($password,PASSWORD_BCRYPT);

        $data=[
            'name'=> $name,
            'phone'=> $phone,
            'email'=> $email,
            'password'=> $hashedPassword,
            'role'=> $role,
            'is_ban'=> $is_ban,
         ];

         // $query = "UPDATE   users SET 
         //     name='$name',
         //     phone='$phone',
         //     email='$email',
         //     password='$hashedPassword', 
         //     is_ban='$is_ban',
         //     role='$role'
         //     WHERE id='$userId'
         //     ";
 
         // $result = mysqli_query($conn, $query);

         
         $result=update('users',$userId,$data);


        if ($result) {
            redirect('users-edit.php?id=' . $userId, "User/ Admin Updated Succesfully");
        } 
        else {
            redirect('users-create.php', "Something Went Wrong");
        }
    } 
    else {
        redirect('users-create.php', "Please fill the all the inputs!");
    }
}

//settings
if (isset($_POST['saveSetting'])) {

    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);
    $small_description = validate($_POST['small_description']);

    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);

    $settingId = validate($_POST['settingId']);


    if ($settingId == 'insert') {
        $query = "INSERT INTO settings (title, slug, small_description, meta_description,	meta_keyword, email1, email2, phone1, phone2,address)VALUES('$title', '$slug', '$small_description', '$meta_description',	'$meta_keyword', '$email1', '$email2', '$phone1', '$phone2','$address')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect("settings.php", "Settings Saved");
        } else {
            redirect("settings.php", "Something went wrong");
        }
    }

    //if come numeric coun(1,2,..) it will be UPDATED
    if (is_numeric($settingId)) {
        $query = "UPDATE settings SET
            title='$title',
            slug='$slug',
            small_description='$small_description',
            meta_description='$meta_description',
            meta_keyword='$meta_keyword',
            email1='$email1',
            email2='$email2',
            phone1='$phone1',
            phone2='$phone2',
            address='$address'
            WHERE id='$settingId'
            ";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect("settings.php", "Settings Updated");
        } else {
            redirect("settings.php", "Something Went Wrong");
        }
    }
}

// Social Media   create
if (isset($_POST['saveSocialMedia'])) {

    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) == true ? 1 : 0;


    if ($name != "" || $url != "") {
        $query = "INSERT INTO social_medias (name,url,status) VALUES ('$name', '$url', '$status')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect("social-media.php", "Social Media Added Succesfully");
        } else {
            redirect('social-media-create.php', "Something Went Wrong");
        }
    } else {
        redirect('social-media-create.php', "Please fill the all the inputs!");
    }
}

// Social Media Update
if (isset($_POST['updateSocialMedia'])) {

    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) == true ? 1 : 0;

    $socialMediaId = validate($_POST['socialMedialId']);


    if ($name != "" || $url != "") {
        $query = "UPDATE   social_medias SET 
            name='$name',
            url='$url',
            status='$status'
            WHERE id='$socialMediaId'
            LIMIT 1
            ";

        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('social-media.php', "Social Media Updated Succesfully");
        } else {
            redirect('social-media-edit.php?id=' . $socialMediaId, "Something Went Wrong");
        }
    } else {
        redirect('social-media-edit.php?id=' . $socialMediaId, "Please fill the all the inputs!");
    }
}


// Services create
if (isset($_POST['saveServices'])) {
    $name = validate($_POST['name']);
    $slug = str_replace(' ', '-', strtolower($name));

    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);

    // $_FILES['image'] massivindəki size (ölçü) dəyəri 0-dan böyükdürsə, demək ki, istifadəçi bir fayl yükləyib. Əgər fayl yüklənməyibsə, bu blok işə düşməyəcək.
    if ($_FILES['image']['size'] > 0) {

        // Yüklənmiş faylın orijinal adı $image dəyişəninə təyin edilir.
        $image = $_FILES['image']['name'];


        // pathinfo() funksiyası fayl adından uzantını çıxarır (məsələn, "JPG", "JPEG" və ya "PNG").
        // strtolower() funksiyası isə uzantını kiçik hərflərə çevirir 
        $imageFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        if ($imageFileTypes != 'jpg' && $imageFileTypes != 'jpeg' && $imageFileTypes != 'png') {
            redirect("services.php", "Sorry, JPG, JPEG, PNG images only");
        }
        $path = "assets/uploads/services";

        // Faylın uzantısını yenidən almaq:
        $imgExt = pathinfo($image, PATHINFO_EXTENSION);

        // Unikal fayl adı yaratmaq:
        $filename = time() . '.' . $imgExt;
        //time() funksiyası cari Unix zaman damğasını qaytarır və bu, fayl adının unikal olmasına kömək edir.
        // Nəticədə, timestamp.uzantı formatında yeni fayl adı yaradılır (məsələn, 1675876543.jpg).

        $finalImage = "assets/uploads/services" . $filename;
    } else {
        $finalImage = NULL;
    }



    $meta_title = validate($_POST['meta_title']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $status = validate($_POST['status']) == true ? 1 : 0;

    $query = "INSERT INTO services(name,slug,small_description,long_description,image,meta_title,meta_description,meta_keyword,status) 
        VALUES ('$name','$slug','$small_description','$long_description','$finalImage','$meta_title','$meta_description','$meta_keyword','$status')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($_FILES['image']['size'] > 0) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . $filename);
        }
        redirect("services.php", "Service Added Succesfully");
    } else {
        redirect('services-create.php', "Something Went Wrong");
    }
} 

// Services update
if (isset($_POST['updateService'])) {

    // (serviceId,long_description,...) - Bunlar Services-edit.php sehivesindeki inputlari name-leridir
    $serviceId=validate($_POST['serviceId']);

    $name = validate($_POST['name']);
    $slug = str_replace(' ', '-', strtolower($name));

    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);


    $service=getById('services',$serviceId);
    
    if ($_FILES['image']['size'] > 0) {

        $image = $_FILES['image']['name'];


        $imageFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        if ($imageFileTypes != 'jpg' && $imageFileTypes != 'jpeg' && $imageFileTypes != 'png') {
            redirect("services.php", "Sorry, JPG, JPEG, PNG images only");
        }
        $path = "assets/uploads/services/";

        $deleteImage=$service['data']['image'];

        if (file_exists($deleteImage)){
            unlink($deleteImage);
        }  

        $imgExt = pathinfo($image, PATHINFO_EXTENSION);

        $filename = time() . '.' . $imgExt;

        $finalImage = "assets/uploads/services/" . $filename;
    } else {
        $finalImage = $service['data']['image'];
    }



    $meta_title = validate($_POST['meta_title']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $status = validate($_POST['status']) == true ? 1 : 0;

    $query = "UPDATE services SET 
    name='$name',
    slug='$slug',
    small_description='$small_description',
    long_description='$long_description',
    image='$finalImage',
    meta_title='$meta_title',
    meta_description='$meta_description',
    meta_keyword='$meta_keyword',
    status='$status'
    WHERE id='$serviceId' LIMIT 1";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($_FILES['image']['size'] > 0) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . $filename);
        }
        redirect("services-edit.php?id=".$serviceId, "Service Updated Succesfully");
    } else {
        redirect('services-edit.php?id='.$serviceId, "Something Went Wrong");
    }

    
}


// Enquiry update
if (isset($_POST['updateEnquiryStatus'])) {
    // (enquiryId,status,...) - Bunlar enquires-view.php sehivesindeki inputlari name-leridir
    $enquiryId=validate($_POST['enquiryId']);
    $status = validate($_POST['status']);




    $enquires=getById('enquires',$enquiryId);


    $query = "UPDATE enquires SET   status='$status' WHERE id='$enquiryId' LIMIT 1";

    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect("enquires-view.php?id=".$enquiryId, "Enquiries Status Updated Succesfully");
    } else {
        redirect('enquiries-view.php?id='.$enquiryId, "Something Went Wrong");
    }

    
}


 









