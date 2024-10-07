<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateEventsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            "event_id"=> [
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
            "location_address1" =>[
                "type" => "VARCHAR",
                "constraint" => 100,
            ],
            "location_address2" =>[
                "type" => "VARCHAR",
                "constraint" => 100,
                "null" => true
            ],
            "location_street" =>[
                "type" => "VARCHAR",
                "constraint" => 100,
                "null"=> true
            ],
            "location_city" =>[
                "type" => "VARCHAR",
                "constraint" => 50,
                "null"=> true
            ],
            "location_state" =>[
                "type" => "VARCHAR",
                "constraint" => 50,
            ],
            "location_country" =>[
                "type" => "VARCHAR",
                "constraint" => 50,
            ],
            "location_zip" =>[
                "type" => "INT",
                "constraint" => 10,
                "null"=> true,
            ],
            'created_by' => [
                'type'    => 'INT', 
                'constraint'     => 5,
                "unsigned"=> true,
            ],
            'status' => [
                'type'    => 'ENUM', 
                "constraint"=> ["draft", "active", "completed"],
                "default" => "draft"
            ],
            'created_at' => [
                "type"=> "DATETIME", 
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                "type"=> "DATETIME", 
            ],
            'event_type_id' =>[
                "type" => "INT",
                'constraint'     => 5,
                "unsigned"=> true,

            ]

        ]);

        $this->forge->addKey("event_id", true);        
        $this->forge->addForeignKey("created_by", "users","user_id","CASCADE");
        $this->forge->addForeignKey("event_type_id", "event_types","event_type_id");
        
        $this->forge->createTable('events');
    }

    public function down()
    {
        $this->forge->dropTable('events', true, true);
    }
}
