<?php

class Dashboard extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->model('Model_report');
		$this->library('Statistic');
		$this->library('Global_function');
	}

	public function index()
	{
		$this->data["title"] = "Dashboard";
		$this->data["content"] = "Dashboard";
		$this->data["c_admit"] = $this->Model_report->countPatient(1,date("Y-m-d"))->row();
		$this->data["c_disc"] = $this->Model_report->countPatient(2,date("Y-m-d"))->row();
		$stats = $this->Model_report->getTimeTreatment()->toArray('time');
		$this->data["date"] = date("Y-m-d");
		$this->data["avg"] = $this->Global_function->secondsToTime($this->Statistic->average($stats));
		$this->data["med"] = $this->Global_function->secondsToTime($this->Statistic->median($stats));
		$this->data["prct10"] = $this->Global_function->secondsToTime($this->Statistic->percentile(10,$stats));
		$this->data["prct90"] = $this->Global_function->secondsToTime($this->Statistic->percentile(90,$stats));
		return $this->view('main/dashboard');
	}

	public function getCountPatient()
	{
		$date = $this->input['date'];
		$admit = $this->Model_report->countPatient(1,$date)->row();
		$disc = $this->Model_report->countPatient(2,$date)->row();
		echo json_encode(array(
			"admit"=>$admit,
			"disc"=>$disc
		));
	}
}
?>