<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="columns is-mobile is-centered">
    <div class="column is-narrow">
        <form class="box" action="<?= url_to('edit_profile') ?>" method="post">

            <input type="hidden" name="_method" value="PATCH">

            <h3 class="has-text-centered">Edit User Profile <?= session()->get('username') ?></h3>
            
            <div class="field">
                <label class="label">First Name</label>
                <div class="control">
                    <input class="input" type="text" name="firstname" placeholder="firstname"
                        value="<?php if(set_value('firstname')) echo set_value('firstname'); else echo $userdata['firstname'] ?>" autofocus>
                </div>
            </div>
            <div class="field">
                <label class="label">Last Name</label>
                <div class="control">
                    <input class="input" type="text" name="lastname" placeholder="lastname"
                        value="<?php if(set_value('lastname')) echo set_value('lastname'); else echo $userdata['lastname']; ?>" autofocus>
                </div>
            </div>

            <div class="field">
                <label class="label">Phone</label>
                <div class="control">
                    <input class="input" type="tel" name="phone_number" placeholder="phone_number"
                        value="<?php if(set_value('phone_number')) echo set_value('phone_number'); else echo $userdata['phone_number'];?>" autofocus>
                </div>
            </div>

            <div class="field">
                <label class="label">E-Mail</label>
                <div class="control">
                    <input class="input" type="email" name="email" placeholder="email"
                        value="<?php if(set_value('email')) echo set_value('email'); else echo session()->get('email');?>" autofocus>
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