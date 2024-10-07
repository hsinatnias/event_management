<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<?php if (!empty($events)): ?>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Event Name</th>
                <th scope="col">Event Start date</th>
                <th scope="col">Event End date</th>
                <th scope="col">Event City</th>
                <th scope="col">Event Type</th>
                <th scope="col">Event Owner</th>
                <th scope="col">Update/Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= $event['event_name']; ?></td>
                    <td><?= $event['start_date']; ?></td>
                    <td><?= $event['end_date']; ?></td>
                    <td><?= $event['location_city']; ?></td>
                    <td><?= $event['event_type']; ?></td>
                    <td><?= $event['created_by']; ?></td>
                    <td>
                        <div class="row">
                            <div class="col gap-2">
                                <a href="<?= site_url('/event/edit/') . $event['event_id'] ?> " class=" btn btn-sm btn-secondary">Update
                                    Event</a>
                                <a href="<?= site_url('/event/delete/') . $event['event_id'] ?> " class=" btn btn-sm btn-secondary" >Delete
                                    Event</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
        
<?php else: ?>

    <div class="alert alert-warning" role="alert">
        No events found !
    </div>

<?php endif ?>
<div class="row">
    <div class="col">
        <a href="<?= url_to('create-event') ?> " class=" btn btn-secondary">Create Event</a>
    </div>

</div>
<?= $this->endSection() ?>