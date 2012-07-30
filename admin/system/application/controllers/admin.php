<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		$this->load->database();

		
	}
	function index()
	{
		$this->load->view('welcome_message');
		
	}
	
	function usage()
	{
		//declarations
		$tempArr=array();
		$tempArr1=array();
		$this->load->library('javascripts');
		$this->load->model('response_model');
		
		
		//data for usage by time graph
		foreach($this->response_model->getUsagebyTime() as $row)
			{
				$tempArr[]=$row->count;
				$tempArr1[]=substr($row->time1,0,3);
			}
		
		$timeList=join($tempArr,",");
		$timeList1=join($tempArr1,"|");
				
		//data for usage by questions
		$data['monthList']=$timeList1;
		$data['timeList']=$timeList;
		$data['begin']=$this->response_model->getResultsbyQuestion();
		$data['usage']=$this->response_model->getUsagebyUser();
		$data['time']=$this->response_model->getUsagebyTime();
		$data['javascript']=$this->javascripts->get();
		
		//load view
		$this->load->view('usage',$data);
		
	}
	
	function updateRecords()
	{
		$this->load->model('BankModel');
		$data['institutions'] = $this->BankModel->getInstitutions();
		$this->load->view('records',$data);
	}
	function logic()
	{
			$this->load->model('BankModel');
			$id = $this->uri->segment(3);
			$data['logic'] = $this->BankModel->getLogic($id);
			$this->load->view('logic',$data);
	}
	function attributes()
	{
	}
	
}
