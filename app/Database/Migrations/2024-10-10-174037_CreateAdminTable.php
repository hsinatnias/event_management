<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'admin_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'unique'     => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'unique'     => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'firstname' =>[
                'type'=> 'VARCHAR',
                'constraint' => '100',
            ],
            'lastname' =>[
                'type'=> 'VARCHAR',
                'constraint' => '100',
            ],
            'role' =>[
                'type'=> 'ENUM',
                 "constraint"=> ['superadmin', 'admin', 'moderator']                
            ],
            
            'last_login' => [
                'type'    => 'TIMESTAMP',                
            ],
            'reset_token' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',               
            ],
            'reset_token_expiry' => [
                'type'    => 'TIMESTAMP',                
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',                
            ],

        ]);
        $this->forge->addPrimaryKey('admin_id');
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
