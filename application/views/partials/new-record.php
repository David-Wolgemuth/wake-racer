<!-- load form using:  $this->load->view('partials/new-record'); -->

<div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="postLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="postLabel">Add new record</h4>
      </div>
      <div class="modal-body">
        <form>
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
                <input type="text" name="hours" class="form-control" placeholder="Hours">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Mins</label>
                <input type="text" name="hours" class="form-control" placeholder="Mins">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Seconds</label>
                <input type="text" name="hours" class="form-control" placeholder="Seconds">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Mili Seconds</label>
                <input type="text" name="hours" class="form-control" placeholder="Mili Seconds">
              </div>
            </div>
          </div>
          <!-- end of time -->
          <!-- boat type -->
          <div class="form-group">
            <label>Boat Type</label>
            <select class="form-control">
              <option disabled selected>Boat class</option>
              <option vlaue="canoe">Canoe</option>
              <option vlaue="kayak">Kayak</option>
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
          <div class="form-group">
            <div class="checkbox">
                  <label class="col-md-2 col-md-offset-1"><input  type="checkbox" value="Sun">Sun</label>
                  <label class="col-md-2"><input type="checkbox" value="Rain">Rain</label>
                  <label class="col-md-2"><input type="checkbox" value="Wind">Wind</label>
                  <label class="col-md-2"><input type="checkbox" value="Snow">Snow</label>
                  <label class="col-md-2"><input type="checkbox" value="Hail">Hail</label>
            </div>
          </div>
            <div class="form-group">
              <label>Date:</label>
              <input type="date" name="date" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Post Record</button>
      </div>
    </div>
  </div>
</div>
