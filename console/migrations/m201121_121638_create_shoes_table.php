<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shoe}}`.
 */
class m201121_121638_create_shoes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shoe}}', [
            'shoe_id' => $this->primaryKey(),
            'serial_number' => $this->integer(30)->notNull(),
            'shoe_name' => $this->string(512)->notNull(),
            'shoe_price' => $this->integer(11)->notNull(),
            'shoe_size' => $this->integer(11)->notNull(),
            'description' => $this->text(),
            'tags' => $this->string(512),
            'status' => $this->integer(1),
            'has_thumbnail' => $this->boolean(),
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shoe}}');
    }
}
