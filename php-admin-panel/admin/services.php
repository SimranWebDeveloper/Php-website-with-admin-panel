<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                Services
                <a href="services-create.php" class="btn btn-primary float-end">Add Services</a>
            </h4>
        </div>
        <div class="card-body">
            <?= alertMessage() ?>
            <table class="table table-bordered table-striped    ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>                        
                        <th>Status</th>                                               
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>