<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Repositorio perteneciente al modelo Task
 * 
 * @category Repositories
 * @package  App
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */
class TaskRepository implements TaskRepositoryInterface
{
    protected $model;

    /**
     * TaskRepository constructor.
     *
     * @param Task $task Modelo Task que utilizará el repositorio
     */
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    /**
     * Devuelve todos los modelos Task de la base de datos
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->orderBy('due_date', 'DESC')->get();
    }

    /**
     * Persiste en la base de datos un modelo Task
     *
     * @param array $data Datos que contendrá el modelo
     * 
     * @return App\Task
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Modifica los 
     *
     * @param array $data Datos que modificarán a los existentes en el array
     * @param int   $id   Identificador del Task a actualizar
     * 
     * @return App\Task
     */
    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    /**
     * Elimina de la BD un modelo
     *
     * @param int $id Identificador del modelo
     * 
     * @return void
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Busca en BD un modelo Task según su id
     *
     * @param int $id Identificador único a buscar
     * 
     * @return App\Task
     */
    public function find($id)
    {
        $task = $this->model->find($id);
        if (null == $task) {
            throw new ModelNotFoundException("Task not found");
        }

        return $task;
    }
}