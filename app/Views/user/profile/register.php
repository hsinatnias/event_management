<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<main class="form-signin w-100 m-auto">
    <div class="row justify-content-md-center">
        <div class="col-3">
            <form class="row" action="<?= url_to('register') ?>" method="post">



                <div class="col-12">
                    <label for="username" class="form-label">User Name</label>
                    <input class="form-control" type="text" name="username" placeholder="username"
                        value="<?= set_value('username') ?>" autofocus>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Email"
                        value="<?= set_value('email') ?>">
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>

                <div class="col-12">
                    <label for="confirmpassword" class="form-label">Password</label>
                    <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password">
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>

            </form>
        </div>
    </div>


</main>



<?php if (isset($validation)): ?>
    <div class="notification is-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>




<?= $this->endSection() ?>

<?= $this->endSection() ?>