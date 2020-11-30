<?php

use yii\db\Migration;

/**
 * Class m201125_065443_create_fulltext_index_on_shoe
 */
class m201125_065443_create_fulltext_index_on_shoe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE {{%shoe}} ADD FULLTEXT(shoe_name, description, tags)");
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201125_065443_create_fulltext_index_on_shoe cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201125_065443_create_fulltext_index_on_shoe cannot be reverted.\n";

        return false;
    }
    */
}
