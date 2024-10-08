<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<main class="form-signin w-100 m-auto">
    <div class="row justify-content-md-center">
        <div class="col-3">
            <form class="row" action="<?= url_to('edit-profile') ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_method" value="PATCH">

                <h3 class="has-text-centered">Edit User Profile <?= session()->get('username') ?></h3>

                <div  class="col-12">
                    <label for="firstname" class="form-label">First Name</label>

                    <input class="form-control" type="text" name="firstname" placeholder="firstname" value="<?php if (set_value('firstname'))
                        echo set_value('firstname');
                    else
                        echo $userdata['firstname'] ?>" autofocus>

                    </div>
                    <div class="col-12">
                        <label for="lastname" class="form-label">Last Name</label>

                        <input class="form-control" type="text" name="lastname" placeholder="lastname" value="<?php if (set_value('lastname'))
                        echo set_value('lastname');
                    else
                        echo $userdata['lastname']; ?>" autofocus>

                </div>

                <div class="col-12">
                    <label for="phone_number" class="form-label">Phone</label>

                    <input class="form-control" type="tel" name="phone_number" placeholder="phone_number" value="<?php if (set_value('phone_number'))
                        echo set_value('phone_number');
                    else
                        echo $userdata['phone_number']; ?>" autofocus>

                </div>

                <div class="col-12">
                    <label for="email" class="form-label">E-Mail</label>

                    <input class="form-control" type="email" name="email" placeholder="email" value="<?php if (set_value('email'))
                        echo set_value('email');
                    else
                        echo session()->get('email'); ?>" autofocus>

                </div>
                <div class="col-12">
                    <label for="avatar" class="form-label">Profile Image</label>

                    <input class="form-control" type="file" name="avatar" id="avatar">

                </div>



                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Update Profile</button>
                </div>

            </form>

            <?php if (isset($validation)): ?>
                <div class="alert alert-warning" role="alert">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    </div>

    <?= $this->endSection() ?>