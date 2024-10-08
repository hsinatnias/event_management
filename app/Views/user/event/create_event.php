<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<script>
    $(function () {

        $('#startdate').datepicker({ minDate: new Date(), dateFormat: 'yy-mm-dd' });
        $('#enddate').datepicker({ minDate: new Date(), dateFormat: 'yy-mm-dd' });
    })
</script>
<form class="row" action="/event/create" method="POST">
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-3">Event Details</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label for="startdate" class="form-label">Starte Date</label>
            <input class="form-control" type="text" name="startdate" id="startdate">
        </div>
        <div class="col-md-2">
            <label for="enddate" class="form-label">End Date</label>
            <input class="form-control" type="text" name="enddate" id="enddate" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="eventname" class="form-label">Event Name</label>
            <input class="form-control" type="text" name="eventname" placeholder="Event Name"
                value="<?= set_value('eventname') ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="description" class="form-label">Event Description</label>
            <textarea class="form-control" name="description" id="description"><?= set_value('eventname') ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label for="event_type">Event Type</label>
            <select id="event_type" name="event_type" class="form-control">
                <option selected>Choose...</option>
                <?php foreach($event_types as $event_type): ?>
                <option value="<?= $event_type['event_type_id'] ?>"><?= $event_type['event_type'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr class="mt-5">
            <h5 class="mb-3">Location Details</h5>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="event_address1" class="form-label">Address 1</label>
            <input type="text" name="event_address1" id="event_address1" class="form-control" placeholder="Address 1">
        </div>
        <div class="col-md-6">
            <label for="event_address2" class="form-label">Address line 2</label>
            <input type="text" name="event_address2" id="event_address2" class="form-control" placeholder="Address 2">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="event_street" class="form-label">Street</label>
            <input type="text" name="event_street" id="event_street" class="form-control" placeholder="Street">
        </div>
        <div class="col-md-6">
            <label for="event_city" class="form-label">City</label>
            <input type="text" name="event_city" id="event_city" class="form-control" placeholder="City">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="event_state" class="form-label">State</label>
            <input type="text" name="event_state" id="event_state" class="form-control" placeholder="State">
        </div>
        <div class="col-md-6">
            <label for="event_country" class="form-label">Country</label>
            <input type="text" name="event_country" id="event_country" class="form-control" placeholder="Country">
        </div>
    </div>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Create Event</button>
    </div>
</form>
<script>
    const startDate = $("#startdate")
    const endDate = $("#enddate")
    startDate.on("change", () => {
        endDate.prop('disabled', false)

    })
</script>
<?= $this->endSection() ?>