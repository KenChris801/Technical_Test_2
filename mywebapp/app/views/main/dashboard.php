<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Daily Analytic Covid Patients</div>
				<div class="card-body">
					<div class="col-md-6">
						<div class="form-group">
				            <label for="date">Filter Date :</label>
				            <input type="date" class="form-control" id="date" name="date" value="<?=(isset($date))?$date:''?>">
				        </div>
					</div>
					<p class="text-danger">Total Admitted Covid Patient : <div id="txt_admit"><span style="font-size:35px;" class="text-danger text-center"><?= $c_admit->count ?></span></div></p>
					<p class="text-success">Total Discharge Covid Patient : <div id="txt_disc"><span style="font-size:35px;" class="text-success text-center"><?= $c_disc->count ?></span></div></p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Analytic Long Treatment Time Covid Patients</div>
				<div class="card-body">
					<p>Average Treatment Time : <span style="font-size:15px;" class="text-center"><?= $avg ?></span></p>
					<p>Median Treatment Time : <span style="font-size:15px;" class="text-center"><?= $med ?></span></p>
					<p>10% Percentile Treatment Time : <span style="font-size:15px;" class="text-center"><?= $prct10 ?></span></p>
					<p>90% Percentile Treatment Time : <span style="font-size:15px;" class="text-center"><?= $prct90 ?></span></p>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#date').change(function(){
		$.ajax({
                type:'POST',
                url:'<?php echo BASE_URL . '/request/get_count_patient'; ?>',
                data:{date:$(this).val()},
                success:function(response)
                {
                    var json = JSON.parse(response);
                   	$('#txt_admit').html('<span style="font-size:35px;" class="text-danger text-center">'+json.admit.count+'</span>');
                   	$('#txt_disc').html('<span style="font-size:35px;" class="text-success text-center">'+json.disc.count+'</span>');
                }
        }); 
	});
</script>