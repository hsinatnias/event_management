<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<main class="form-signin w-100 m-auto">
    <div class="row justify-content-md-center">
        <div class="col-3">

            <form class="row" action="<?= url_to('create-profile') ?>" method="post" enctype="multipart/form-data">

                <h3 class="has-text-centered">Edit User Profile <?= session()->get('username') ?></h3>

                <div class="col-12">
                    <label for="firstname" class="form-label">First Name</label>
                    <input
                        class="form-control <?= (isset($validation) && $validation->hasError('firstname')) ? 'is-invalid' : '' ?>"
                        type="text" name="firstname" placeholder="firstname" value="<?= set_value('firstname') ?>"
                        autofocus>
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
                        type="text" name="lastname" placeholder="lastname" value="<?= set_value('lastname') ?>"
                        autofocus>
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
                        type="tel" name="phone_number" placeholder="phone_number"
                        value="<?= set_value('phone_number') ?>" autofocus>
                    <?php if (isset($validation) && $validation->hasError('phone_number')): ?>
                        <div id="username_feedback" class="invalid-feedback">
                            <?= $validation->getError('phone_number') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="col-12">
                    <label for="avatar" class="form-label">Select profile photo</label>
                    <input
                        class="form-control form-control-lg <?= (isset($validation) && $validation->hasError('avatar')) ? 'is-invalid' : '' ?>"
                        id="avatar" name="avatar" type="file">
                    <?php if (isset($validation) && $validation->hasError('avatar')): ?>
                        <div id="username_feedback" class="invalid-feedback">
                            <?= $validation->getError('avatar') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Save profile</button>
                </div>



            </form>
        </div>
    </div>

    <?= $this->endSection() ?>