<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<?php if (!empty($events)): ?>

    <?php foreach ($events as $event): ?>
       <?=  $event['event_name'] ?>
    <?php endforeach ?>

<?php else: ?>
    <a href="<?= url_to('create-event')?>">Create Event</a> 
<?php endif ?>
<?= $this->endSection() ?>