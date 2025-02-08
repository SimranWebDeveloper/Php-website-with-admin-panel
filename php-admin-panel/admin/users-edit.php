<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                Edit User
                <a href="users.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
        <?= alertMessage() ?>
        
            <form action="code.php" method="POST">

                <?php 
            
                    $paramResult= checkParamId('id');
                    
                    if (!is_numeric($paramResult)) {
                        echo "<h5>.$paramResult</h5>";
                        return false;
                    }

                    $user=getById("users",checkParamId("id"));

                    if ($user['status']==200) {
                        ?>
                        
                        <input type="hidden" value="<?= $user['data']['id'] ?>" name="userId" >

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input value="<?= $user['data']['name'] ?>" type="text" name="name" required class="form-control">
                                    </div>                        
                                </div>
            
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Phone No.</label>
                                        <input value="<?= $user['data']['phone'] ?>" type="number" name="phone" required class="form-control">
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input value="<?= $user['data']['email'] ?>" type="email" name="email" required class="form-control">
                                    </div>
            
                                </div>
            
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Password</label>
                                        <input value="<?= $user['data']['password'] ?>" type="password" name="password" required class="form-control">
                                    </div>
            
                                </div>
            
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="">Select Role</label>
                                        <select name="role"  required class="form-select">
                                            <option value="select" disabled >Select Role</option>
                                            <option value="admin" <?= $user['data']['role']=='admin'? "selected" : "" ?>>Admin</option>
                                            <option value="user" <?= $user['data']['role']=='user' ? "selected":"" ?>>User</option>
                                        </select>
                                    </div>
            
                                </div>
            
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="">Is Ban</label>
                                        <br>
                                        <input  <?= $user['data']['is_ban']==1? "checked" :""  ?> type="checkbox" name="is_ban" style="width:30px;height: 30px;">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 text-end">
                                        <br>
                                        <button type="submit" name="updateUser" class=" btn btn-primary">Update</button>
                                    </div>
            
                                </div>
                            </div>

                        <?php
                        
                    }else{
                        echo  '<h5>'.$user['message'].'</h5>';
                    }

                ?>
                
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>