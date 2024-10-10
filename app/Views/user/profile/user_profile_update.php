<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<main class="form-signin w-100 m-auto">
    <div class="row justify-content-md-center">
        <div class="col-3">
            <form class="row" action="<?= url_to('edit-profile') ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="user_id" id="user_id" value="<?php if (set_value('user_id'))
                    echo set_value('user_id');
                else
                    echo $userdata['user_id']; ?>">

                <h3 class="has-text-centered">Edit User Profile <?= session()->get('username') ?></h3>


                <div class="col-12">
                    <label for="firstname" class="form-label">First Name</label>

                    <input
                        class="form-control <?= (isset($validation) && $validation->hasError('firstname')) ? 'is-invalid' : '' ?>"
                        type="text" name="firstname" placeholder="firstname" value="<?php if (set_value('firstname'))
                            echo set_value('firstname');
                        else
                            echo $userdata['firstname'] ?>" autofocus>
                    <?php if (isset($validation) && $validation->hasError('firstname')): ?>
                        <div id="username_feedback" class="invalid-feedback">
                            <?= $validation->getError('firstname') ?>
                        </div>
                    <?php endif ?>

                </div>
                <div class="col-12">
                    <label for="lastname" class="form-label">Last Name</label>

                    <input
                        class="form-control <?= (isset($validation) && $validation->hasError('lastname')) ? 'is-invalid' : '' ?>"
                        type="text" name="lastname" placeholder="lastname" value="<?php if (set_value('lastname'))
                            echo set_value('lastname');
                        else
                            echo $userdata['lastname']; ?>" autofocus>
                    <?php if (isset($validation) && $validation->hasError('lastname')): ?>
                        <div id="username_feedback" class="invalid-feedback">
                            <?= $validation->getError('lastname') ?>
                        </div>
                    <?php endif ?>

                </div>

                <div class="col-12">
                    <label for="phone_number" class="form-label">Phone</label>

                    <input
                        class="form-control <?= (isset($validation) && $validation->hasError('phone_number')) ? 'is-invalid' : '' ?>"
                        type="tel" name="phone_number" placeholder="phone_number" value="<?php if (set_value('phone_number'))
                            echo set_value('phone_number');
                        else
                            echo $userdata['phone_number']; ?>" autofocus>
                    <?php if (isset($validation) && $validation->hasError('phone_number')): ?>
                        <div id="username_feedback" class="invalid-feedback">
                            <?= $validation->getError('phone_number') ?>
                        </div>
                    <?php endif ?>

                </div>

                <div class="col-12">
                    <label for="email" class="form-label">E-Mail</label>

                    <input
                        class="form-control <?= (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '' ?>"
                        type="email" name="email" placeholder="email" value="<?php if (set_value('email'))
                            echo set_value('email');
                        else
                            echo session()->get('email'); ?>" autofocus>
                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                        <div id="username_feedback" class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    <?php endif ?>

                </div>
                <div class="col-12">
                    <label for="avatar" class="form-label">Profile Image</label>

                    <input
                        class="form-control <?= (isset($validation) && $validation->hasError('avatar')) ? 'is-invalid' : '' ?>"
                        type="file" name="avatar" id="avatar">
                    <?php if (isset($validation) && $validation->hasError('avatar')): ?>
                        <div id="username_feedback" class="invalid-feedback">
                            <?= $validation->getError('avatar') ?>
                        </div>
                    <?php endif ?>

                </div>





                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Update Profile</button>
                </div>

            </form>

            

        </div>
    </div>
    </div>

    <?= $this->endSection() ?>