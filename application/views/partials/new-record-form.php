
<form action="<?= base_url("records/create") ?>" method="POST">
    <p class="error"><?= $this->session->flashdata('distance-error') ?></p>
    <select name="distance">
        <option value="500-m">500 Meters</option>
        <option value="1-km">1 Kilometer</option>
        <!-- I have no idea what the standard distances are -->
    </select>

    <label for="record_time">Time:</label>
    <p class="error"><?= $this->session->flashdata('record_time-error') ?></p>
    <input type="number" name="record_time" value="<?= $this->session->flashdata('record_time-old') ?>" placeholder="Time">

    <label for="record_date">Date:</label>
    <p class="error"><?= $this->session->flashdata('record_date-error') ?></p>
    <input type="date" name="record_date" value="<?= $this->session->flashdata('record_date-old') ?>" placeholder="Date">

    <label for="boat_type">Boat Type:</label>
    <p class="error"><?= $this->session->flashdata('boat_type-error') ?></p>
    <input type="text" name="boat_type" value="<?= $this->session->flashdata('boat_type-old') ?>" placeholder="Boat Type">

    <label for="state">State:</label>
    <p class="error"><?= $this->session->flashdata('state-error') ?></p>
    <input type="text" name="state" value="<?= $this->session->flashdata('state-old') ?>" placeholder="State">
    <!-- We could later on use make a "select" for states -->

    <label for="city">City</label>
    <p class="error"><?= $this->session->flashdata('city-error') ?></p>
    <input type="text" name="city" value="<?= $this->session->flashdata('city-old') ?>" placeholder="City">
</form>
