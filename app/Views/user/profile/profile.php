<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="columns is-mobile is-centered">
    <div class="column is-narrow box">
        <h2>Profile</h2>
        <p>
            <?= esc(session()->get('name')) ?>
        </p>
        <p>
            <?= esc(session()->get('email')) ?>
        </p>
    </div>
</div>

<?= $this->endSection() ?>