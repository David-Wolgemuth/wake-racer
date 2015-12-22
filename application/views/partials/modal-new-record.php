<!-- load form using:  $this->load->view('partials/new-record'); -->

<div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="postLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="postLabel">Add new record</h4>
      </div>
        <form  action="<?= base_url("records/create") ?>" method="POST">
      <div class="modal-body">
          <!-- distance -->
        <div class="form-group">
          <label>Distance</label>
          <select  name="distance" class="form-control">
            <option value="200m">200m</option>
            <option value="500m">500m</option>
            <option value="1000m">1000m</option>
            <option value="5000m">5000m</option>
          </select>
        </div>
          <!-- time -->
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Hours</label>
              <input type="number" min="0" max="99" name="hours" class="form-control" value="0" placeholder="Hours">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Mins</label>
              <input type="number" min="0" max="59" name="mins" class="form-control" value="0" placeholder="Mins">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Seconds</label>
              <input type="number" min="0" max="59" name="seconds" class="form-control" value="0" placeholder="Seconds">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Mili Seconds</label>
              <input type="number" min="0" max="99" name="mili" class="form-control" value="0" placeholder="Mili Seconds">
            </div>
          </div>
        </div>
          <!-- end of time -->
          <!-- boat type -->
        <div class="form-group">
          <label>Boat Type</label>
          <select name="boat_type" class="form-control">
            <option disabled selected>Boat class</option>
            <option value="canoe">Canoe</option>
            <option value="kayak">Kayak</option>
          </select>
        </div>
        <!-- location -->
        <div  class="row divider">
          <div class="col-md-6">
            <div class="form-group">
              <label>State</label>
              <input type="text" name="state" class="form-control" placeholder="State">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control" placeholder="City">
            </div>
          </div>
        </div>
          <!-- weather -->
          <!-- <div class="form-group">
            <div class="checkbox">
                  <label class="col-md-2 col-md-offset-1"><input  type="checkbox" value="Sun">Sun</label>
                  <label class="col-md-2"><input type="checkbox" value="Rain">Rain</label>
                  <label class="col-md-2"><input type="checkbox" value="Wind">Wind</label>
                  <label class="col-md-2"><input type="checkbox" value="Snow">Snow</label>
                  <label class="col-md-2"><input type="checkbox" value="Hail">Hail</label>
            </div>
          </div> -->
        <div class="form-group">
          <label>Date:</label>
          <input type="date" name="record_date" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input  type="submit" class="btn btn-primary" value="Post record">
      </div>
      </form>
    </div>
  </div>
</div>

