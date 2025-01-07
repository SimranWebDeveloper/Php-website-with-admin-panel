<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                User Lists
                <a href="users-create.php" class="btn btn-primary float-end">Add Users</a>
            </h4>
        </div>
        <div class="card-body">
            <?= alertMessage() ?>
            <table class="table table-bordered table-striped    ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Is Ban</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                <?php 
                    $users=getAll('users');

                    if (mysqli_num_rows($users)>0) {
                        foreach ($users as  $userItem) {  
                            ?> 
                            <!-- < ? php echo ?>   shothand  < ?=   ?>  -->
                                <tr>
                                    <td> <?= $userItem['id']?> </td> 
                                    <td> <?= $userItem['name']?> </td> 
                                    <td> <?php echo $userItem['email']?> </td> 
                                    <td> <?= $userItem['phone']?> </td> 
                                    <td> <?= $userItem['is_ban']==1? "Banned":"Active" ?> </td> 
                                    <td> <?= $userItem['role']?> </td> 
                                    <td>
                                    <a href="users-edit.php/id=<?= $userItem['id']?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="users-delete.php/id=<?= $userItem['id']?>" class="btn btn-danger btn-sm">Delete</a>
                                </tr>
                        </td>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <tr>
                                <th colspan="7">Not have any data</th>
                            </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>