<?php

class DailyReports extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function create ()
    {
        $this->load->view('templates/footer');
    }
}