<?php

class Main extends Controller
{
	public function __construct()
	{
		Controller::__construct();
		$this->model('Model_covid_patient');
		$this->library('Form');
	}

	public function index()
	{
		$this->data["title"] = "Covid-19 Patient Records";
		$this->data["content"] = "Home";
		$result = $this->Model_covid_patient->getCovidPatientRecords()->result();
		$this->data["records"] = $result;

		return $this->view('main/index');
	}

	public function detail($data)
	{
		$id = base64_decode($data[0]);
		$this->data["record"] = $this->Model_covid_patient->getCovidPatientRecordsById($id)->row();
		$this->data["title"] = $this->data["record"]->cp_fullname."'s Information";
		return $this->view('main/detail');
	}

	public function create()
	{
		$this->data["form"] = 'Register New Patient Information';
		$this->data["url"] = BASE_URL.'/main/create';
		$this->data["title"] = "Register New Patient";
		if($_POST)
		{
			$check = $this->Form->form_validation();
			if($check->status)
			{
				$this->input["session"] = $this->session->user_data('id');
				$check_record = $this->Model_covid_patient->checkRecord($this->input)->row();
				if(!isset($check_record->cpr_id)){
					$check_data = $this->Model_covid_patient->checkPatient($this->input)->row();
					if(!isset($check_data->cp_id))
					{
						$this->Model_covid_patient->createCovidPatient($this->input)->exec();
					}
					$this->Model_covid_patient->createCovidPatientRecord($this->input)->exec();
					try {
						header('Location: '.BASE_URL.'/main/index');
					}
					catch(Exception $e) {
					   return true;
					}
				}
				else
				{
					$this->data["server_error"] = "Insert Failed, Patient Record already exists";
					return $this->view('main/form');
				}
			}
			else
			{
				$this->data["error"] = $check->form;
				return $this->view('main/form');
			}	
		}
		else
		{
			return $this->view('main/form');
		}
	}

	public function update($data)
	{
		$id = base64_decode($data[0]);
		$result = $this->Model_covid_patient->getCovidPatientRecordsById($id)->row();
		$this->data['pid'] = $result->cp_id;
		$this->data["fullname"] = $result->cp_fullname;
		$this->data["dob"] = $result->cp_dob;
		$this->data["gender"] = $result->cp_gender;
		$this->data["address"] = $result->cp_address;
		$this->data["city"] = $result->cp_city;
		$this->data["phone"] = $result->cp_phone_number;
		$this->data["checkin"] = $result->cpr_check_in;
		$this->data["sip"] = $result->cpr_pic_sip_number;
		$this->data["status"] = base64_encode($result->cps_id);
		$this->data["status_list"] = $this->Model_covid_patient->getCovidPatientStatus()->result();
		$this->data["type"] = "Update";
		$this->data["form"] = 'Update Patient Information';
		$this->data["url"] = BASE_URL.'/main/update/'.$data[0];
		$this->data["title"] = "Update Patient Information";
		$this->input["session"] = $this->session->user_data('id');
		if($_POST)
		{
			$check = $this->Form->form_validation();
			if($check->status)
			{
				$this->Model_covid_patient->updateCovidPatientRecords($id,$this->input)->exec();
				$this->Model_covid_patient->updateCovidPatient($result->cp_id,$this->input)->exec();
				try {
					header('Location: '.BASE_URL.'/main/index');
				}
				catch(Exception $e) {
				   return true;
				}
			}
			else
			{
				$this->data["error"] = $check->form;
				return $this->view('main/form');
			}	
		}
		else
		{
			return $this->view('main/form');
		}
	}

	public function delete($data)
	{
		$id = base64_decode($data[0]);
		$this->input["session"] = $this->session->user_data('id');
		$this->Model_covid_patient->deleteCovidPatientRecords($id,$this->input)->exec();
		try {
			header('Location: '.BASE_URL.'/main/index');
		}
		catch(Exception $e) {
			return true;
		}
	}

	public function list()
	{
		$this->data["title"] = "List Covid-19 Patients";
		$this->data["content"] = "Patient";
		$result = $this->Model_covid_patient->getCovidPatients()->result();
		$this->data["lists"] = $result;

		return $this->view('main/list');
	}	
}
?>