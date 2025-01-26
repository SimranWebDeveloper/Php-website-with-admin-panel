<div class="py-5 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="footer-heading"><?=webSetting('title')?? 'Meta Desk' ?></h4>
                <hr>
                <p>
                    <?=webSetting('small_description')?? 'Meta Desk' ?>
                </p>
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