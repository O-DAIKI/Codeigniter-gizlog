<?php
class Migration_Create_daily_reports_table extends CI_Migration {

    public function __construct()
    {
        parent::__construct();
    }

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'reporting_time' => [
                'type' => 'DATETIME',
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'content' => [
                'type' => 'TEXT',
                'constraint' => '1000',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'update_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('daily_reports');
    }

    public function down()
    {
        $this->dbforge->drop_table('daily_reports');
    }
}