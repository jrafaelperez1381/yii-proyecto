<?php

use yii\db\Migration;

/**
 * Class m230602_013218_creacion_tablas_libros
 */
class m230602_013218_creacion_tablas_libros extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table_options = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=InnoDB';

        $this->createTable('libros', [
            'id_libro' => $this->primaryKey(),
            'Titulo' => $this->string(250),
            'Imagen' => $this->string(2500),
        ], $table_options);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%libros}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230602_013218_creacion_tablas_libros cannot be reverted.\n";

        return false;
    }
    */
}
