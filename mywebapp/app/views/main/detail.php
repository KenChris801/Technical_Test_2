<div class="container mt-5">
	<table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td colspan="2">Patient Information</td>
            </tr>
            <tr>
                <td>Patient Number</td>
                <td><?= $record->cp_id ?></td>
            </tr>
            <tr>
                <td>Fullname</td>
                <td><?= $record->cp_fullname ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?= $record->cp_dob ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?= $record->cp_gender ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?= $record->cp_address ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?= $record->cp_phone_number ?></td>
            </tr>
        </tbody>
	</table>
    </br>
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td colspan="2">Patient Records</td>
            </tr>
            <tr>
                <td>Patient Status</td>
                <td><?= $record->cps_name ?></td>
            </tr>
            <tr>
                <td>Check In</td>
                <td><?= $record->cpr_check_in ?></td>
            </tr>
            <tr>
                <td>Check Out</td>
                <td><?= $record->cpr_check_out ?></td>
            </tr>
            <tr>
                <td>PIC (SIP Number)</td>
                <td><?= $record->cpr_pic_sip_number ?></td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary" href="<?= BASE_URL ?>">Back</a>
</br>
</br>
</br>
</div>
