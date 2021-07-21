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
        $this->load->library('form_validation');

        $this->load->view('templates/header');
        $this->load->view('users/daily_reports/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('reporting_time', '作成日時', 'required|callback_check_input_date',
            [
                'required' => '%sは入力必須の項目です。',
            ]);
        $this->form_validation->set_rules('title', 'タイトル', 'required|max_length[255]',
            [
                'required' => '%sは入力必須の項目です。',
                'max_length' => '{param}文字以内で入力してください。',
            ]);
        $this->form_validation->set_rules('content', '本文', 'required|max_length[1000]',
            [
                'required' => '%sは入力必須の項目です。',
                'max_length' => '{param}文字以内で入力してください。',
            ]);

        if (!$this->form_validation->run()) {
            $this->create();
        } else {
            $this->dailyReportModel->saveInput();
            redirect('news');
        }
    }

    public function check_input_date($date)
    {
        $today = date("Y-m-d");
        if ($date <= $today) {
            return TRUE;
        }

        $this->form_validation->set_message('check_input_date', '今日以前の日付を選択してください。');
        return FALSE;
    }
}