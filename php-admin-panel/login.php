<?php 
$pageTitle="Login";
include('includes/header.php');

//eger bir defe login olubsa
if (isset($_SESSION['auth'])) {
    redirect('index.php',"You are already loggin");
}
?>
<div class="py-4 bg-secondary text-center">
    <h4 class="text-white">Login</h4>
</div>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <!-- mesaji $_SESSION['status'] goturur -->
                        <?=alertMessage();  ?>
                        <form action="login-code.php" method="POST">
                            <div class="mb-3">
                                <label >Email Adress</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Passowrd</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="loginBtn" class="btn btn-primary w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php')
?>