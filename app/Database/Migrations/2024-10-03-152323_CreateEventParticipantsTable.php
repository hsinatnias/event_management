<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateEventParticipantsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "event_participant_id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "event_f_id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
            ],
            "user_f_id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
            ],
            "status" => [
                'type' => 'ENUM',
                "constraint" => ["invited", "confirmed", "attended", "canceled"],
            ],

        ]);

        $this->forge->addKey("event_participant_id", true);
        $this->forge->addForeignKey("event_f_id", "events", "event_id", "CASCADE", "CASCADE");
        $this->forge->addForeignKey("user_f_id", "users", "user_id", "CASCADE", "CASCADE");
        $this->forge->createTable('event_participants');
    }

    public function down()
    {
        $this->forge->dropTable('event_participants', true, true);
    }
}
