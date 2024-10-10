<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="has-text-centered">
    <?php if ($authorised): ?>

    <h3>
        Wellcome <?= esc($name) ?>
        (<?= esc($email) ?>) to your profile
    </h3>

    <?php else : ?>

    <h3>Event Management Admin Dashboard V 1.0.0</h3>

    <?php endif ?>

</div>

<?= $this->endSection() ?>