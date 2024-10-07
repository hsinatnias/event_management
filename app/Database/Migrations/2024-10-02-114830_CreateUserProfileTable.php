<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateUserProfileTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            "userprofile_id"=> [
                "type"=> "INT",
                "constraint"=> 5,
                "unsigned"=> true,
                "auto_increment"=>true
            ],
            "user_id"=>[
                "type"=> "INT",
                "unsigned"=>true
            ],
            "firstname"=>[
                "type" =>"VARCHAR",
                "constraint"=> 150,                
            ],
            "lastname"=>[
                "type"=>"VARCHAR",
                "constraint"=> 150
            ],
            "status"=>[
                "type"=> "ENUM",
                "constraint"=> ["active", "dormant", "preaproved"],
                "default"=> "preaproved"
            ],
            "phone_number" =>[
                "type" => "VARCHAR",
                "constraint" => 50
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addKey("userprofile_id", true);
        $this->forge->addForeignKey("user_id", "users","user_id","CASCADE");
        $this->forge->createTable('userprofiles');
    }

    public function down()
    {
        $this->forge->dropTable('userprofiles', true, true);
    }
}
