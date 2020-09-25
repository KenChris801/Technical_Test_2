<div class="container mt-5">
    <div class="card">
      <div class="card-header">
        List Covid Patient Records
      </div>
      <div class="card-body">
        <div class="mb-1">
            <a class="btn btn-success" href="<?= BASE_URL.'/main/create' ?>">Register</a>
        </div>
        <table class="table table-striped table-bordered" id="tbl_records">
             <thead>
                <tr>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Patient Number</th>
                    <th>Fullname</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>SIP Number</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records as $r) { ?>
                    <tr>
                        <td><a class="btn btn-primary" href="<?= BASE_URL.'/main/detail/'.base64_encode($r->cpr_id) ?>">Detail</a></br><a class="btn btn-info" href="<?= BASE_URL.'/main/update/'.base64_encode($r->cpr_id) ?>">Update</a>
                        </br><form method="POST" action="<?= BASE_URL.'/main/delete/'.base64_encode($r->cpr_id) ?>"><button type="submit" onclick="return confirm('Do you really want to delete the record?');" class="btn btn-danger">Delete</button></form></td> 
                        <td><?= $r->cps_name ?></td>
                        <td><?= $r->cp_id ?></td>
                        <td><?= $r->cp_fullname ?></td>
                        <td><?= $r->cp_dob ?></td>
                        <td><?= $r->cp_gender ?></td>
                        <td><?= $r->cpr_pic_sip_number ?></td>
                        <td><?= date('d M Y H:i:s',strtotime($r->cpr_check_in)) ?></td>
                        <td><?= ($r->cpr_check_out)?date('d M Y H:i:s',strtotime($r->cpr_check_out)):"-" ?></td>                
                    </tr>
                <?php }?>
            </tbody>
        </table>
      </div>
    </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#tbl_records').DataTable();
	});
</script>