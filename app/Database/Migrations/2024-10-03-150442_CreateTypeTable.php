<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTypeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "event_type_id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "event_type" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ]

        ]);

        $this->forge->addKey("event_type_id", true);
        $this->forge->createTable('event_types');
    }

    public function down()
    {
        $this->forge->dropTable('event_types', true, true);
    }
}
