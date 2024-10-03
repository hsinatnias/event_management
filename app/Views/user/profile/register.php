<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="columns is-mobile is-centered">
    <div class="column is-narrow">
        <form class="box" action="<?= url_to('register') ?>" method="post">

            <h3 class="has-text-centered">Register User</h3>

            <div class="field">
                <label class="label">User Name</label>
                <div class="control">
                    <input class="input" type="text" name="username" placeholder="username" value="<?= set_value('username') ?>"  autofocus>
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="text" name="email" placeholder="Email" value="<?= set_value('email') ?>"  >
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="Password">
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="confirmpassword" placeholder="Confirm Password">
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Sign Up</button>
                </div>
            </div>

        </form>

        <?php if(isset($validation)):?>
        <div class="notification is-danger">
            <?= $validation->listErrors() ?>
        </div>
        <?php endif;?>


    </div>
</div>

<?= $this->endSection() ?>

<?= $this->endSection() ?>