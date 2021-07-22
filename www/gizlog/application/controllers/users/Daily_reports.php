<?php

class Daily_reports extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('daily_report_model');
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('users/daily_reports/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
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
            $this->daily_report_model->save_input();
            redirect('news'); // 仮置きのURL
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

    public function show($id)
    {
        $data['daily_report'] = $this->daily_report_model->get_by_id($id);
        $this->has_deleted_at($data['daily_report']);
        $data['action']['delete'] = 'reports/' . $id;
        $data['action']['edit'] = 'reports/' . $id . '/edit';

        $this->load->view('templates/header');
        $this->load->view('users/daily_reports/show', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->daily_report_model->delete_by_id($id);

        redirect('news'); // 仮置きのURL
    }

    public function has_deleted_at($daily_report)
    {
        if (isset($daily_report['deleted_at'])) {
            redirect('news'); // 仮置きのURL
        }
    }

    public function edit($id)
    {
        $data['action'] = 'reports/' . $id . '/edit';

        $this->load->view('templates/header');
        $this->load->view('users/daily_reports/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
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
            $this->edit($id);
        } else {
            $this->daily_report_model->update($id);
            redirect('news'); // 仮置きのURL
        }
    }
}