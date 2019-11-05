<?php

namespace App\Repositories\Interfaces;

/**
 * CLASS DESCRIPTION
 * 
 * @category Interfaces
 * @package  App
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */
interface RepositoryInterface
{
    /**
     * Devuelve todos los modelos contenidos en la base de datos
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Crea un nuevo modelo
     *
     * @param array $data Array con los datos que creará el modelo
     * 
     * @return App\Task
     */
    public function create(array  $data);

    /**
     * Actualiza un modelo
     *
     * @param array $data Array con los nuevos datos para actualizar
     * @param int   $id   Identificador único del modelo
     * 
     * @return App\Task
     */
    public function update(array $data, int $id);

    /**
     * Borra un modelo
     *
     * @param int $id Identificador único del modelo
     * 
     * @return void
     */
    public function delete($id);

    /**
     * Busca un modelo a partir de su Identificador único
     *
     * @param int $id Identificador a buscar
     * 
     * @return App\Task
     */
    public function find($id);
}