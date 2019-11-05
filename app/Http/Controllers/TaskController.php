<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Controlador tipo Resource para la API de Tasks
 * 
 * @category Controllers
 * @package  App
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */
class TaskController extends Controller
{
    private $_repository;

    /**
     * Inyecta la dependencia de un TaskRepository en el Controlador
     *
     * @param App\Repositories\TaskRepositoryInterface $repository Contrato para la inyección de dependencias
     */
    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->_repository = $repository;
    }

    /**
     * Devuelve un JSON con todas las TASKS
     *
     * @return JSONResponse
     */
    public function index()
    {
        return response()->json(
            $this->_repository->all()->makeHidden(['description', 'created_at', 'updated_at'])
        );
    }

    /**
     * Obtiene los datos de una tarea concreta
     *
     * @param integer $id Identificador de la tarea a obtener
     * 
     * @return JSONResponse
     */
    public function show(int $id)
    {
        try {
            $task = $this->_repository->find($id)->makeHidden(['created_at', 'updated_at']);
        } catch (ModelNotFoundException | Exception $e) {
            return response()->json(["error"=>"Task not found"], 404);
        }

        return response()->json($task);
    }

    /**
     * Inserta en la base de datos un nuevo modelo
     *
     * @param TaskCreateRequest $request Datos de la petición de inserción
     * 
     * @return JSONResponse
     */
    public function create(TaskCreateRequest $request)
    {
        $dataArray = $request->validated();
        return response()->json($this->_repository->create($dataArray) ? ["operation"=>"ok"] : ["operation"=>"fail"]);
    }

    /**
     * Actualiza un modelo en la base de datos
     *
     * @param TaskUpdateRequest $request Datos de la petición de actualizacion
     * @param integer           $id      Identificador de la tarea a actualizar
     * 
     * @return JSONResponse
     */
    public function update(TaskUpdateRequest $request, int $id)
    {
        $dataArray = $request->validated();
        return response()->json($this->_repository->update($dataArray, $id) ? ["operation"=>"ok"] : ["operation"=>"fail"]);
    }

    /**
     * Borra de la base de datos una tarea
     *
     * @param integer $id Identificador de la tarea a borrar
     * 
     * @return JSONRepsonse
     */
    public function delete(int $id)
    {
        return response()->json($this->_repository->delete($id) ? ["operation"=>"ok"] : ["operation"=>"fail"]);
    }
}
