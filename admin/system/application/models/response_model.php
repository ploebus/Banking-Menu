<?php

class response_model extends Model{

function Responsemodel()
	{
		parent::Model;
		
	}

function getUsagebyUser()
	{
		$data[]='';
		$query=$this->db->query("Select user,count(user) as count from fp_data where user<>'john' and user<>'usc@accan' group by user order by count desc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		
	}
function getUsagebyTime()
	{
		
		$query=$this->db->query("select monthname(time) as time1,time,count(user) as count from fp_data where user<>'john'  and user<>'usc@accan' group by Month(time) order by time asc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	
function getResultsbyQuestion()
	{
		//require("surveyVO.php");
		
		//$obj=new SurveyVO();
		
		$query=$this->db->query("SELECT * FROM fp_responses");
		if($query->num_rows()>0)
			{
				$obj=$query->result();
				//foreach($query->result() as $row)
					//{
						//obj->begin[$row->begin]=obj->begin[$row->begin]+1;
					//}
			return $obj;
			}
	}

}

