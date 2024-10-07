<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-3">
        <?= $this->include('partials/side_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
            <img src="<?= base_url('images/showImage/' . $result->uploaded_fileinfo) ?>" alt="Image">
            
            </div>
            <div class="col-md-9">


                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title"><?= $result->firstname." ". $result->lastname  ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $result->email ?></h6>
                        <p class="card-text">Phone: <?= $result->phone_number ?></p>
                        <p class="card-text">Phone: <?= $result->phone_number ?></p>
                        <p class="card-text">Phone: <?= $result->phone_number ?></p>
                        <a href="/edit-profile" class="card-link">Edit Profile</a>
                        <a href="#" class="link-danger px-3">Delete Profile</a>
                    </div>
                </div>
                


            </div>
        </div>
    </div>
</div>







<?= $this->endSection() ?>