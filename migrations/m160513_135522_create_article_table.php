<?php

use yii\db\Migration;

class m160513_135522_create_article_table extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200)->notNull()->unique(),
            'anons' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'author_id' => $this->integer()->notNull()->unsigned(),
            'status' => $this->string(20)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('article');
    }
}
