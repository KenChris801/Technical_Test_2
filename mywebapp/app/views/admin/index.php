<div class="container mt-5">
    <div class="card">
      <div class="card-header">
        List User
      </div>
      <div class="card-body">
        <div class="mb-1">
            <a class="btn btn-success" href="<?= BASE_URL.'/admin/create' ?>">Create</a>
        </div>
        <table class="table table-striped table-bordered" id="tbl_admins">
             <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($admin as $a) { ?>
                    <tr>
                        <td><?= $a->u_name ?></td>
                        <td><?= $a->r_name ?></td>
                        <td><?= $a->u_email ?></td>
                        <td><?= ($a->u_status==1)? '<p class="text-success">Active</p>':'<p class="text-danger">Not Active</p>' ?></td>               
                    </tr>
                <?php }?>
            </tbody>
        </table>
      </div>
    </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#tbl_admins').DataTable();
	});
</script>