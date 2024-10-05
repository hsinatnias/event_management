<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLocationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "name" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "address" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "city" => [
                "type" => "VARCHAR",
                "constraint" => 100,
            ],
            "state" => [
                "type" => "VARCHAR",
                "constraint" => 100,
            ],
            "country" => [
                "type" => "VARCHAR",
                "constraint" => 100,
            ],

        ]);

        $this->forge->addKey("id", true);
        $this->forge->createTable('locations');
    }

    public function down()
    {
        $this->forge->dropTable('locations', true, true);
    }
}
