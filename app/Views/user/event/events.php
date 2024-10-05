<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<?php if (!empty($events)): ?>

    <?php foreach ($events as $event): ?>
        <?= $event['event_name'] ?>
    <?php endforeach ?>

<?php else: ?>

    <div class="alert alert-warning" role="alert">
        No events found <a href="<?= url_to('create-event') ?>" class="alert-link">Create one</a>!
    </div>
    
<?php endif ?>
<?= $this->endSection() ?>