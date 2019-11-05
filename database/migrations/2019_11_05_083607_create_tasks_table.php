<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración para instalar la tabla para tareas
 * Nombre de la tabla: tasks
 * 
 * @category Migrations
 * @package  Database
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */
class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tasks', 
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 191);
                $table->dateTime('due_date');
                $table->text('description');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
