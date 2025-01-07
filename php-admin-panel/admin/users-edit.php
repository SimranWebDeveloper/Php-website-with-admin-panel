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
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>                        
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Phone No.</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="">Select Role</label>
                            <select name="role"  class="form-select">
                                <option value="select" disabled selected>Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="">Select Role</label>
                            <br>
                            <input type="checkbox" name="is_ban" style="width:30px;height: 30px;">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-end">
                            <br>
                            <button type="submit" name="updateUser" class=" btn btn-primary">Update</button>
                        </div>

                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>