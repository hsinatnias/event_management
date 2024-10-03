<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateEventTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            "id"=> [
                "type"=> "INT",
                "constraint"=> 5,
                "unsigned"=> true,
                "auto_increment"=>true
            ],
            "event_name"=>[
                "type"=> "VARCHAR",
                "constraint"=> 255, 
            ],
            "description"=>[
                "type" =>"TEXT",               
            ],
            "start_date"=>[
                "type"=>"DATETIME",
            ],
            "end_date"=>[
                "type"=> "DATETIME",
            ],
            "location_id" =>[
                "type" => "INT",
                "unsigned"=> true,
            ],
            'created_by' => [
                'type'    => 'INT', 
                "unsigned"=> true,
            ],
            'status' => [
                'type'    => 'ENUM', 
                "constraint"=> ["draft", "active", "completed"],
            ],
            'created_at' => [
                "type"=> "DATETIME", 
            ],
            'updated_at' => [
                "type"=> "DATETIME", 
            ],

        ]);

        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("created_by", "users","id","CASCADE");
        $this->forge->addForeignKey("location_id", "location","id","CASCADE");
        $this->forge->createTable('events');
    }

    public function down()
    {
        $this->forge->dropTable('events', true, true);
    }
}
