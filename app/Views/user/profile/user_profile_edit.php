<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<main class="form-signin w-100 m-auto">
    <div class="row justify-content-md-center">
        <div class="col-3">

            <form class="row" action="<?= url_to('create_profile') ?>" method="post">

                <h3 class="has-text-centered">Edit User Profile <?= session()->get('username') ?></h3>

                <div class="col-12">
                    <label for="firstname" class="form-label">First Name</label>
                    <input class="form-control" type="text" name="firstname" placeholder="firstname"
                        value="<?= set_value('firstname') ?>" autofocus>
                </div>
                <div class="col-12">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastname" placeholder="lastname"
                        value="<?= set_value('lastname') ?>" autofocus>
                </div>

                <div class="col-12">
                    <label for="phone_number" class="form-label">Phone</label>
                    <input class="form-control" type="tel" name="phone_number" placeholder="phone_number"
                        value="<?= set_value('phone_number') ?>" autofocus>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Save profile</button>
                </div>



            </form>

            <?php if (isset($validation)): ?>
                <div class="alert alert-warning" role="alert">

                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>


        </div>
    </div>

    <?= $this->endSection() ?>