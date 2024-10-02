<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="columns">
        <div class="column is-narrow is-mobile">
            <?= $this->include('partials/side_menu') ?>
        </div>
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <h3 class="title is-4">Profile</h3>

                    <div class="content">
                        <div class="columns">
                            <div class="column">
                                <table class="table-profile">
                                    <tbody>
                                        <tr>
                                            <th colspan="1"></th>
                                            <th colspan="2"></th>
                                        </tr>
                                        <tr>
                                            <td>First name:</td>
                                            <td><?= $result->firstname ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td><?= $result->lastname ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td><?= $result->phone_number ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><?= $result->email ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="buttons has-addons">
                                    <a href="/edit_profile" class="button is-link">Edit Profile</a>
                                    <a href="#" class="button is-link">Password Reset</a>
                                    <a href="#" class="button is-link">Delete Profile</a>

                                </div>
                            </div>
                            <div class="column">
                                <table class="table-profile">
                                    <tbody>
                                        <tr>
                                            <th colspan="1"></th>
                                            <th colspan="2"></th>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>



    
</section>

<?= $this->endSection() ?>