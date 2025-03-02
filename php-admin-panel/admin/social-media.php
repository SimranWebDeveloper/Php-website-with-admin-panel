<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                Social Media
                <a href="social-media-create.php" class="btn btn-primary float-end">Add Social Media</a>
            </h4>
        </div>
        <div class="card-body">
            <?= alertMessage() ?>
            <table id="myTable" class="table table-bordered table-striped    ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>                        
                        <th>URL</th>                        
                        <th>Status</th>                        
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                <?php 
                    $socialMedias=getAll('social_medias');

                    if ($socialMedias) {
                        
                        if (mysqli_num_rows($socialMedias)>0) {
                            foreach ($socialMedias as  $item) {  
                                ?> 
                                <!-- < ? php echo ?>   shothand  < ?=   ?>  -->
                                    <tr>
                                        <td> <?= $item['id']?> </td> 
                                        <td> <?= $item['name']?> </td> 
                                        <td> <?= $item['url']?> </td> 
                                        <td> <?= $item['status']==1? "Hidden":"Show" ?> </td> 
                                        <td>
                                        <a href="social-media-edit.php?id=<?= $item['id']?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="social-media-delete.php?id=<?= $item['id']?>" class="btn btn-danger btn-sm"
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
                            <th colspan="5">Something went wrong</th>
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