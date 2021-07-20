<?php

class DailyReports extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function create ()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('templates/header');
        $this->load->view('daily_reports/create');
        $this->load->view('templates/footer');
    }
}