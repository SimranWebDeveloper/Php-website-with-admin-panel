<?php 
session_start();

    require 'dbcon.php';

    // This helps prevent SQL injection attacks
    function validate($inputData)  {
        global $conn;
        $validateData= mysqli_real_escape_string($conn,$inputData);
        return trim($validateData);
    }

    // client terefde headerde dinamik yazdirma
    function webSetting($columnName)  {
        $setting=getById('settings',1);
        if ($setting['status']==200) {
            return $setting['data'][$columnName];
        }
    }

    function logoutSession() {
        unset($_SESSION['auth']);
        unset($_SESSION['loggedInUserRole']);
        unset($_SESSION['loggedInUser']);
    }

    // bizi $url sehivesine gonderir ve $_SESSION statusuna $status yazir
    function redirect($url,$status)  {
        $_SESSION['status']=$status;
        header('Location: '.$url);
        exit(0);
    }

    function getCount($tableName) {
        global $conn;
        $table=validate($tableName);
        $query="SELECT * FROM $table";
        $result=mysqli_query($conn,$query);
        $totalCount=mysqli_num_rows($result);
        return $totalCount;
    }

    function alertMessage()  {

        if (isset($_SESSION['status'])) {
            echo '<div class="alert alert-success">
                <h5>'.$_SESSION['status'].'</h5>
            </div>';
            unset($_SESSION['status']);
        }

    }

    
    
    // update ucun id-nin olub olmadigini yoxlayir
    function checkParamId($paramType) {
        
        if (isset($_GET[$paramType])) {
            if ($_GET[$paramType]!=null) {
                return $_GET[$paramType];
            }else{
                return "No Id found";
            }
        }else{
            return "No Id given";
        }
    }



    
    function getAll($tablename)  {
        global $conn;
        $table=validate($tablename);
        $query="SELECT * FROM $table";
        $result=mysqli_query($conn,$query);

        return $result;
    }


    // yoxlayir eger cedvelde bu id-de data varsa bize obyekt icerisinde heminki setri dondurur
    function getById($tableName,$id)  {
        global $conn;

        $table=validate($tableName);
        $id=validate($id);

        $query="SELECT * FROM $table WHERE id='$id' LIMIT 1";
        $result=mysqli_query($conn,$query);

        if ($result) {
            if (mysqli_num_rows($result)==1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

                $response=[
                    'status'=>200,
                    'message'=>'success -Fetched Data',
                    'data'=>$row,
                ];
                return $response;
            }else{
                $response=[
                    'status'=>404,
                    'message'=>'No Data Record',
                ];
                return $response;
            }
        }else{
            $response=[
                'status'=>500,
                'message'=>'Something went wrong',
            ];

            return $response;
        }
    }


    function deleteQuery($tableName,$id)  {
        global $conn;

        $table=validate($tableName);
        $id=validate($id);

        $query="DELETE FROM $table WHERE id='$id' LIMIT 1 ";
        $result=mysqli_query($conn,$query);

        return $result;
    }
    ?>