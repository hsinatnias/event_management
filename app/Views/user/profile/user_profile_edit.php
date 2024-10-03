<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="columns is-mobile is-centered">
    <div class="column is-narrow">
        <form class="box" action="<?=  url_to('create_profile') ?>" method="post">

            <h3 class="has-text-centered">Edit User Profile <?= session()->get('username') ?></h3>

            <div class="field">
                <label class="label">First Name</label>
                <div class="control">
                    <input class="input" type="text" name="firstname" placeholder="firstname"
                        value="<?= set_value('firstname') ?>" autofocus>
                </div>
            </div>
            <div class="field">
                <label class="label">Last Name</label>
                <div class="control">
                    <input class="input" type="text" name="lastname" placeholder="lastname"
                        value="<?= set_value('lastname') ?>" autofocus>
                </div>
            </div>

            <div class="field">
                <label class="label">Phone</label>
                <div class="control">
                    <input class="input" type="tel" name="phone_number" placeholder="phone_number"
                        value="<?= set_value('phone_number') ?>" autofocus>
                </div>
            </div>

            

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Save Details</button>
                </div>
            </div>

        </form>

        <?php if (isset($validation)): ?>
            <div class="notification is-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>


    </div>
</div>

<?= $this->endSection() ?>