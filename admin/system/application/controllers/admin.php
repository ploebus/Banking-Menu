<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		$this->load->database();
		$this->load->model('BankModel');
		
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
		
		$data['institutions'] = $this->BankModel->getInstitutions();
		$this->load->view('header',array('title'=>'Update Attibutes'));
		$this->load->view('navigation');
		$this->load->view('records',$data);
	}
	
	function logic()
	{
			
			$id = $this->uri->segment(3);
			$data['logic'] = $this->BankModel->getLogic($id);
			$this->load->view('header',array('title'=>'Edit Logic'));
			$this->load->view('navigation');
			$this->load->view('logic',$data);
	}
	function update()
	{
			
			$data = array(
				'begin'=>$this->input->post('begin'),
				'maintain'=>$this->input->post('maintain'),
				'bounce'=>$this->input->post('bounce'),
				'transfer'=>$this->input->post('transfer'),
				'legal'=>$this->input->post('legal'),
				'chex'=>$this->input->post('chex'),
				'dd'=>$this->input->post('dd'),
				'internet'=>$this->input->post('internet'),
				'transfer'=>$this->input->post('transfer'),
				'productId'=>$this->input->post('productId'),
				'checks'=>$this->input->post('checks'),
				'Q7A'=>$this->input->post('Q7A'),
				);
			
			$this->BankModel->updateRecords($data);
			
			
	}
	function attributes()
	{
		
		$id = $this->uri->segment(3);
		$data['orgs'] = $this->BankModel->getOrgs();
		$data['attributes'] = $this->BankModel->getAttributes($id);
		$this->load->view('header',array('title'=>'Edit Attibutes'));
		$this->load->view('navigation');
		$this->load->view('attributes',$data);
	}
	
	function add(){
		$this->load->view('header',array('title'=>'Add new product'));
		$this->load->view('navigation');
		$this->load->view('add');
		
	}
	
	function addAttributes(){
		
		$arr = $this->input->post();
		print_r($this->input->post());
		$this->BankModel->addAttributes($arr);
	}
	function updateAttributes()
		{
			$this->BankModel->updateAttributes($this->input->post());
		}
}
