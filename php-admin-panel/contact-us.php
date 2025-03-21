<?php
$pageTitle="About us";
 include('includes/header.php')
?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">Contact Us</h4>
    </div>
</div>

<div class="py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <?=alertMessage();?>

                <div class="card card-body">
                    <form action="sendmail.php" method="POST">
                        <div class="mb-3">
                            <label >Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Phone Number</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Service</label>
                            <input type="text" name="service"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Message / Comment</label>
                            <textarea name="message" id="" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="contactSubmit" class="btn btn-primary w-100 ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="footer-heading">Contact Information</h4>
                <hr>
                <p>Address: <?=webSetting('address')?? ''; ?></p>
                <p>Email: <?=webSetting('email1')?? ''; ?>,<?=webSetting('email2')?? ''; ?> </p>
                <p>Phone No:<?=webSetting('phone1')?? ''; ?>, <?=webSetting('phone2')?? ''; ?></p>

            </div>
        </div>    
    
    </div>
</div>


<?php include('includes/footer.php')
?>