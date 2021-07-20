<?php

class DailyReports extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dailyReportModel');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function create()
    {
        $this->load->helper('form');

        $this->load->view('templates/header');
        $this->load->view('users/daily_reports/create');
        $this->load->view('templates/footer');
    }

    public function _check_input_date($date)
    {
        $today = date("Y/m/d");
        if ($today < $date | isset($date)) {
           return TRUE;
        }

        $this->form_validation->set_message('_check_input_date', '今日以前の日付を選択してください。');
        return FALSE;
    }

    public function store()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('reporting_time', 'date', 'required|callback__check_input_date',
            [
                'max_length' => '%s文字以内で入力してください。',
                'required' => '入力必須の項目です。',
            ]);
        $this->form_validation->set_rules('title', '255', 'required|max_length[255]',
            [
                'max_length' => '%s文字以内で入力してください。',
                'required' => '入力必須の項目です。',
            ]);
        $this->form_validation->set_rules('content', '1000', 'required|max_length[1000]',
            [
                'max_length[1000]' => '%s文字以内で入力してください。',
                'required' => '入力必須の項目です。',
            ]);

        if (!$this->form_validation->run()) {
            $this->create();
        } else {
            $this->dailyReportModel->saveInput();
            redirect('news');
        }
    }
}