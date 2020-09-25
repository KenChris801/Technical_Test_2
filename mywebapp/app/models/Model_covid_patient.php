<?php
class Model_covid_patient extends Model
{
	public function getCovidPatientRecords()
	{
		$query = '
			SELECT cpr_id,cps_id,cps_name,cp_id,cp_fullname,cp_dob,cp_gender,cpr_pic_sip_number,cpr_check_in,cpr_check_out 
			FROM `covid_patient_record` 
			inner join covid_patient on cpr_cp_id = cp_id
			inner join covid_patient_status on cps_id = cpr_status
			where cpr_is_active = 1
		';

		$this->db->query($query);
		return $this->db;
	}

	public function getCovidPatients()
	{
		$query = '
			SELECT cp_id,cp_fullname,cp_dob,cp_gender,cp_address,cp_city,cp_phone_number 
			FROM `covid_patient` 
		';

		$this->db->query($query);
		return $this->db;
	}

	public function getCovidPatientRecordsById($id)
	{
		$query = "
			SELECT cp_id,cpr_id,cps_id,cps_name,cp_fullname,cp_dob,cp_gender,cp_address,cp_city,cp_phone_number,cpr_pic_sip_number,cpr_check_in,cpr_check_out 
			FROM `covid_patient_record` 
			inner join covid_patient on cpr_cp_id = cp_id
			inner join covid_patient_status on cps_id = cpr_status
			where cpr_id = '$id' and cpr_is_active = 1
		";

		$this->db->query($query);
		return $this->db;
	}

	public function getCovidPatientStatus()
	{
		$query = "
			SELECT cps_id,cps_name
			FROM `covid_patient_status` 
			Where cps_status = 1
		";

		$this->db->query($query);
		return $this->db;		
	}

	public function createCovidPatient($data)
	{
		$query = "
			Insert Into covid_patient (cp_id,cp_fullname,cp_dob,cp_gender,cp_address,cp_city,cp_phone_number,cp_status,cp_created_at,cp_created_by)
			Values ('".$data["pid"]."','".$data['fullname']."','".$data['dob']."','".$data["gender"]."','".$data["address"]."','".$data["city"]."','".$data["phone"]."',1,Now(),'".$data["session"]."')
		";

		$this->db->query($query);
		return $this->db;
	}

	public function createCovidPatientRecord($data)
	{
		$query = "
			Insert Into covid_patient_record (cpr_cp_id,cpr_pic_sip_number,cpr_check_in,cpr_status,cpr_created_at,cpr_created_by,cpr_is_active)
			Values ('".$data["pid"]."','".$data['sip']."','".$data['checkin']."',1,Now(),'".$data["session"].",1')
		";

		$this->db->query($query);
		return $this->db;
	}

	public function updateCovidPatient($id,$data)
	{
		$query = "
			UPDATE covid_patient
			SET 
			cp_id = '".$data["pid"]."',
			cp_fullname = '".$data["fullname"]."',
			cp_dob = '".$data["dob"]."',
			cp_gender = '".$data["gender"]."',
			cp_updated_by = '".$data["session"]."',
			cp_updated_at = Now()
			WHERE cp_id = '$id'
		";
		$this->db->query($query);
		return $this->db;
	}

	public function updateCovidPatientRecords($id,$data)
	{
		$status = base64_decode($data["status"]);
		if($status==2)
		{
			$query = "
				UPDATE covid_patient_record
				SET
				cpr_check_in = '".$data["checkin"]."',
				cpr_cp_id = '".$data["pid"]."', 
				cpr_check_out = Now(),
				cpr_pic_sip_number  = '".$data["sip"]."',
				cpr_status = '".$status."',
				cpr_updated_by = '".$data["session"]."',
				cpr_updated_at = Now()				
				Where cpr_id = '$id'
			";
		}
		else
		{
			$query = "
				UPDATE covid_patient_record
				SET
				cpr_cp_id = '".$data["pid"]."',
				cpr_check_in = '".$data["checkin"]."', 
				cpr_check_out = NULL,
				cpr_pic_sip_number  = '".$data["sip"]."',
				cpr_status = '".$status."',
				cpr_updated_by = '".$data["session"]."',
				cpr_updated_at = Now()
				Where cpr_id = '$id'
			";
		}

		$this->db->query($query);
		return $this->db;
	}

	public function deleteCovidPatientRecords($id,$data)
	{
		$query = "
			Update covid_patient_record
			SET cpr_is_active = 0, cpr_updated_at = Now(), cpr_updated_by = '".$data["session"]."'
			where cpr_id = '$id';
		";

		$this->db->query($query);
		return $this->db;
	}

	public function checkPatient($data)
	{
		$query = "
			Select cp_id
			from covid_patient
			where cp_id = '".$data["pid"]."'
		";

		$this->db->query($query);
		return $this->db;
	}

	public function checkRecord($data)
	{
		$query = "
			Select cpr_id
			from covid_patient_record
			where cpr_cp_id = '".$data["pid"]."' and cpr_check_out = '' and cpr_is_active = 1
		";

		$this->db->query($query);
		return $this->db;
	}
}
?>