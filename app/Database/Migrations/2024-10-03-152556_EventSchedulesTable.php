<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventSchedulesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "event_schedule_id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "event_id" => [
                "type" => "INT",
                "unsigned" => true,
            ],
            "session_name" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "start_time" => [
                "type" => "DATETIME",
            ],
            "end_time" => [
                "type" => "DATETIME",
            ]

        ]);

        $this->forge->addKey("event_schedule_id", true);
        $this->forge->addForeignKey("event_id", "events", "event_id", "CASCADE");
        $this->forge->createTable('event_schedules');
    }

    public function down()
    {
        $this->forge->dropTable('event_schedules', true, true);
    }
}
