<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                Enquiries List
            </h4>
        </div>
        <div class="card-body">
            <?= alertMessage() ?>
            <table id="myTable" class="table table-bordered table-striped    ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>                        
                        <th>Phone</th>                                               
                        <th>Service</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                <?php 
                    $enquires=mysqli_query($conn,"SELECT * FROM enquires ORDER BY id desc");

                    if ($enquires) {
                        
                        if (mysqli_num_rows($enquires)>0) {
                            foreach ($enquires as  $item) {  
                                ?> 
                                <!-- < ? php echo ?>   shothand  < ?=   ?>  -->
                                    <tr>
                                        <td> <?= $item['id']?> </td> 
                                        <td> <?= $item['name']?> </td> 
                                        <td> <?= $item['phone']?> </td> 
                                        <td> <?= $item['service']?> </td> 
                                        <td> <?= $item['status']?> </td> 
                                        <td>
                                        <a href="enquires-view.php?id=<?= $item['id']?>" class="btn btn-success btn-sm" target="_blank">View</a>
                                        <a href="enquires-delete.php?id=<?= $item['id']?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to  delete this data')"
                                        >
                                            Delete
                                        </a>
                                    </tr>
                            </td>
                                <?php
                            }
                        }
                        else{
                            ?>
                                <tr>
                                    <th colspan="5">Not have any data</th>
                                </tr>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <tr>
                            <th colspan="4">Something went wrong</th>
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