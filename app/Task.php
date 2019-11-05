<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelado de datos para las Tareas
 * 
 * @category Models
 * @package  App
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */
class Task extends Model
{
    protected $fillable = [
        'name', 'due_date', 'description'
    ];
}
