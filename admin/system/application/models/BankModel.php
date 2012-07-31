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
function getOrgs()
	{
		$query = $this->db->query("Select Distinct F1 from financialinstitutions");
		return $query->result();
	}
function getLogic($id)
	{
		
		$sql = "Select * from financialinstitutions where ID = ?";
		$query=$this->db->query($sql, array($id));
		return $query->result();
	}
function getAttributes($id)
	{
		
		$sql = "Select * from financialinstitutions where ID = ?";
		$query=$this->db->query($sql, array($id));
		return $query->result();
	}
function updateRecords($data)
	{
		
		$sql = "UPDATE financialinstitutions set begin=?,maintain=?,bounce=?,legal=?,chex=?,dd=?,internet=?,transfer=?,Q7A = ? where ID = ?";
		$query=$this->db->query($sql, array($data['begin'],$data['maintain'],$data['bounce'],$data['legal'],$data['chex'],$data['dd'],$data['internet'],$data['transfer'],$data['Q7A'],$data['productId']));
		
	}
function updateAttributes($data)
	{
	
	
	}
	
function addAttributes($data)
	{
			echo gettype($data);
			print_r($data);
			$keyArray = array();
			$valueArray = array();
			while (list($key, $val) = each($data)) {
				$keyArray.push($key);
				$valueArray.push($value);
			}
			
			$sql = "INSERT INTO financialinstitutions (" . implode(',',$keyArray) . ") VALUES (". implode(',',$valueArray) . ");";
			$query=$this->db->query($sql);
			return $query->result();
			
	}
}