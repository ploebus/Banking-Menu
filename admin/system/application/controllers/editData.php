<?php
class editData extends Controller{
    function editData()
    {
        parent::Controller();
        $this->load->helper('url','form');
        $this->load->scaffolding('financialinstitutions');
    }
}
?>