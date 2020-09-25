<div class="container mt-5">
    <div class="card">
      <div class="card-header">
        List Covid Patients
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered" id="tbl_lists">
             <thead>
                <tr>
                    <th>Patient Number</th>
                    <th>Fullname</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lists as $l) { ?>
                    <tr>
                        <td><?= $l->cp_id ?></td>
                        <td><?= $l->cp_fullname ?></td>
                        <td><?= $l->cp_dob ?></td>
                        <td><?= $l->cp_gender ?></td>
                        <td><?= $l->cp_address ?></td>
                        <td><?= $l->cp_city ?></td>
                        <td><?= $l->cp_phone_number?></td>                
                    </tr>
                <?php }?>
            </tbody>
        </table>
      </div>
    </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#tbl_lists').DataTable();
	});
</script>