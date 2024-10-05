<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateEventParticipantsTable extends Migration
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
            "event_id" => [
                "type" => "INT",
                "unsigned" => true,
            ],
            "user_id" => [
                "type" => "INT",
                "unsigned" => true,
            ],
            "status" => [
                'type' => 'ENUM',
                "constraint" => ["invited", "confirmed", "attended", "canceled"],
            ],

        ]);

        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("event_id", "events", "id", "CASCADE");
        $this->forge->addForeignKey("user_id", "users", "id", "CASCADE");
        $this->forge->createTable('event_participants');
    }

    public function down()
    {
        $this->forge->dropTable('event_participants', true, true);
    }
}
