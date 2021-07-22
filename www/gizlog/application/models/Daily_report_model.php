<?php
class Daily_report_model extends CI_Model {

    public function __construct()
    {
        $this->load->database('model');
    }

    public function save_input()
    {
        $today = date('Y-m-d H:i:s');

        $input = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'reporting_time' => $this->input->post('reporting_time'),
            'created_at' => $today,
            'update_at' => $today,
        ];

        return $this->db->insert('daily_reports', $input);
    }

    public function get_by_id($id)
    {
        $query = $this->db->get_where('daily_reports', ['id' => $id]);
        return $query->row_array();
    }

    public function delete_by_id($id)
    {
        $data = [
            'deleted_at' => date('Y-m-d H:i:s'),
        ];

        return $this->db->where('id', $id)->update('daily_reports', $data);
    }

    public function update($id)
    {
        $today = date('Y-m-d H:i:s');

        $input = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'reporting_time' => $this->input->post('reporting_time'),
            'update_at' => $today,
        ];

        return $this->db->where('id', $id)->update('daily_reports', $input);
    }
}