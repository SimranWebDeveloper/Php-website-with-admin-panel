<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                Add Social Media
                <a href="social-media.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?= alertMessage() ?>
            <form action="code.php" method="POST">
                <div class="mb-3">
                    <label for="">Social Media Name</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Social Media URL/Link</label>
                    <input type="text" name="url" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <br>
                    <input type="checkbox" name="status"  style="width: 30px;height: 30px;">
                </div>
    
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary" name="saveSocialMedia">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>o