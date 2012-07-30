<?php

class BankModel extends Model{

function __construct()
	{
		parent::__construct();
	}

function getInstitutions()
	{
		$query = $this->db->get('financialinstitutions');
		return $query->result();
	}

function getLogic($id)
	{
		
		$sql = "Select begin,maintain,bounce,ssn,DomGovID,ForGovID,OtherID,legal,chex,dd,internet,transfer,Q7A from financialinstitutions where ID = ?";
		$query=$this->db->query($sql, array($id));
		return $query->result();
	}
}