<?php
class Model_report extends Model
{
	public function countPatient($status,$date)
	{
		if($status==1)//in treatment
		{
			$query = "
				SELECT count(distinct cpr_cp_id) count
				FROM `covid_patient_record`
				where Date(cpr_check_in) = '$date'
			";
		}
		else if($status==2) //discharge
		{
			$query = "
				SELECT count(distinct cpr_cp_id) count
				FROM `covid_patient_record`
				where Date(cpr_check_out) = '$date'
			";
		}

		$this->db->query($query);
		return $this->db;
	}

	public function getTimeTreatment()
	{
		$query = "
			SELECT Round(Unix_timestamp(coalesce(cpr_check_out,Now()))-Unix_timestamp(cpr_check_in),0) as time
			FROM `covid_patient_record`
		";

		$this->db->query($query);
		return $this->db;
	}
}
?>