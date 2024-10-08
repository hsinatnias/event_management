<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<main class="form-signin w-100 m-auto">
    <div class="row justify-content-md-center">
        <div class="col-3">
            <form class="row needs-validation" action="<?= url_to('register') ?>" method="post">



                <div class="col-12">
                    <label for="username" class="form-label">User Name</label>
                    <input class="form-control <?= (isset($validation) && $validation->hasError('username'))? 'is-invalid': '' ?>" type="text" name="username" placeholder="username"
                        value="<?= set_value('username') ?>" autofocus  aria-describedby="username_feedback">
                        <?php if (isset($validation) && $validation->hasError('username')): ?>
                        <div id="username_feedback" class="invalid-feedback">
                            <?= $validation->getError('username') ?>
                        </div>
                    <?php endif ?>

                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control <?= (isset($validation) && $validation->hasError('email'))? 'is-invalid': '' ?>" type="text" name="email" placeholder="Email"
                        value="<?= set_value('email') ?>" aria-describedby="email_feedback">
                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                        <div id="email_feedback" class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="col-12">
                    <label for="password" class="form-label <?= (isset($validation) && $validation->hasError('password'))? 'is-invalid': '' ?>">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" aria-describedby="password_feedback">
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <div id="password_feedback" class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="col-12">
                    <label for="confirmpassword" class="form-label">Password</label>
                    <input class="form-control <?= (isset($validation) && $validation->hasError('confirmpassword'))? 'is-invalid': '' ?>" type="password" name="confirmpassword" placeholder="Confirm Password" aria-describedby="passwordconfirm_feedback">
                    <?php if (isset($validation) && $validation->hasError('confirmpassword')): ?>
                        <div id="passwordconfirm_feedback" class="invalid-feedback">
                            <?= $validation->getError('confirmpassword') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>

            </form>
        </div>
    </div>


</main>






<?= $this->endSection() ?>

<?= $this->endSection() ?>