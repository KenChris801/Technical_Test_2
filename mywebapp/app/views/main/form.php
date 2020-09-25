<div class="container mt-5">
  <div class="card">
    <div class="card-header"><?= $form ?></div>
    <div class="card-body">
      <?php if(isset($server_error)){ ?>
          <p class="text-danger"><?= $server_error; ?></p>
      <?php } ?>
        <form method="POST" action="<?= $url ?>" >
          <div class="form-group">
            <label for="pid">Patient Number</label>
            <input type="text" class="form-control" id="pid" name="pid" value="<?=(isset($pid))?$pid:''?>">
            <?php if(isset($error)){if($error->input=="pid") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="fullname">Fullname</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?=(isset($fullname))?$fullname:''?>">
            <?php if(isset($error)){if($error->input=="fullname") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?=(isset($dob))?$dob:''?>">
            <?php if(isset($error)){if($error->input=="dob") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option></option>
                <option value="Male" <?php if(isset($gender)){if($gender=="Male"){ echo "selected"; }}?>>Male</option>
                <option value="Female" <?php if(isset($gender)){if($gender=="Female"){ echo "selected"; }}?>>Female</option>
            </select>
            <?php if(isset($error)){if($error->input=="gender") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?=(isset($address))?$address:''?>">
            <?php if(isset($error)){if($error->input=="address") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?=(isset($city))?$city:''?>">
            <?php if(isset($error)){if($error->input=="city") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?=(isset($phone))?$phone:''?>">
            <?php if(isset($error)){if($error->input=="phone") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="checkin">Check In</label>
            <div class="input-group date" id="checkin" data-target-input="nearest" style="overflow: visible">
              <div class="input-group-append" data-target="#checkin" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
              <input type="text" class="form-control datetimepicker-input" name="checkin" data-target="#checkin" placeholder="Check In"/>
            </div>
            <?php if(isset($error)){if($error->input=="checkin") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="sip">PIC (SIP Number)</label>
            <input type="text" class="form-control" id="sip" name="sip" value="<?=(isset($sip))?$sip:''?>">
            <?php if(isset($error)){if($error->input=="sip") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <?php if(isset($type)){ if($type == "Update") { ?>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                    <option></option>
                    <?php foreach($status_list as $s) { ?>
                      <option value="<?= base64_encode($s->cps_id) ?>" <?php if(isset($status)){if(base64_encode($s->cps_id)==$status){echo "selected";}}?>><?= $s->cps_name ?></option>
                    <?php } ?>
            </select>
            <?php if(isset($error)){if($error->input=="status") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <?php }} ?>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </br>
        </br>
        </br>
        </form>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript">
    $("#gender").select2({
        placeholder: "Select Gender",
        allowClear: true
    });

    $("#status").select2({
        placeholder: "Select Status",
        allowClear: true
    });

    $('#checkin').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        date: "<?= (isset($checkin))?$checkin:date('Y-m-d H:i:s') ?>",
        icons: {
            time: "fa fa-clock",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down",
            previous: "fa fa-chevron-left",
            next: "fa fa-chevron-right",
            today: "fa fa-clock-o",
            clear: "fa fa-trash-o"
        }
    });
</script>