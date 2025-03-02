<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h4>
                        Enquiries List
                    </h4>
                </div>
                <div class="col-md-7">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="date" required name="date"  value="<?=isset( $_GET['date'] )==true ?$_GET['date'] :""; ?>"class="form-control">
                            </div>
                            <div class="col-md-4">
                                <select name="status" required class="form-select">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="pending" 
                                        <?= isset( $_GET['status'] )==true ? ($_GET['status'] =='pending' ? 'selected':'') :"" ?>
                                    >Pending</option>
                                    <option value="completed" 
                                        <?= isset( $_GET['status'] )==true ? ($_GET['status'] =='completed' ? 'selected':'') :"" ?>
                                    >Completed</option>
                                    <option value="cancel"
                                        <?= isset( $_GET['status'] )==true ? ($_GET['status'] =='cancel' ? 'selected':'') :"" ?>
                                    >Cancel</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="enquiries.php" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= alertMessage() ?>
            <?php
                if ( isset($_GET['date']) && $_GET['date']!='' && isset($_GET['status']) && isset($_GET['status'])!=''   ) {
                    $date=validate($_GET['date']);
                    $status=validate($_GET['status']);
                    $enquires=mysqli_query($conn,"SELECT * FROM enquires WHERE create_at='$date' AND status='$status' ORDER BY id  DESC");
                }
                else{

                    $enquires = mysqli_query($conn, "SELECT * FROM enquires ORDER BY id desc");
                }

                if ($enquires) {

                    if (mysqli_num_rows($enquires) > 0) {
            ?>

                        <table id="myTable" class="table table-bordered table-striped    ">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Service</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>

                            <?php
                            foreach ($enquires as  $item) {
                    ?>
                                <!-- < ? php echo ?>   shothand  < ?=   ?>  -->
                                <tr>
                                    <td> <?= $item['id'] ?> </td>
                                    <td> <?= $item['name'] ?> </td>
                                    <td> <?= $item['phone'] ?> </td>
                                    <td> <?= $item['service'] ?> </td>
                                    <td> <?= $item['create_at'] ?> </td>
                                    <td> <?= $item['status'] ?> </td>
                                    <td>
                                        <a href="enquires-view.php?id=<?= $item['id'] ?>" class="btn btn-success btn-sm" target="_blank">View</a>
                                        <a href="enquires-delete.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to  delete this data')">
                                            Delete
                                        </a>
                                </tr>
                                </td>
                            <?php
                            }
                            ?>

                            </tbody>
                        </table>

                <?php
                    } else {
                        echo "<h5>Not Record Found</h5>";
                    }
                } else {
                    echo "<h5>Something went wrong</h5>";
                    
                }

                ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>