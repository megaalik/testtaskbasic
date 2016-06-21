<?php

use yii\db\Migration;

class m160512_123912_create_notification_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('notification', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'event_code' => $this->string(100)->notNull(),
            'from' => $this->string(255)->notNull(),
            'to' => $this->string(255)->notNull(),
            'subject' => $this->text()->notNull(),
            'text' => $this->text()->notNull(),
            'event_type' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
            'is_read' => $this->boolean()->defaultValue(0)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('notification');
    }
}
