<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Clase manejadora de la petición de actualización de tareas
 * 
 * @category Requests
 * @package  App
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */
class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|max:191',
            'due_date'    => 'required|date_format:Y-m-d H:i:s',
            'description' => 'required'
        ];
    }

    /**
     * Test
     *
     * @param Validator $validator Validador del COre de Laravel
     * 
     * @return JSONResponse
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    "error"    => "validation_errors",
                    "messages" => $validator->errors()
                ],
                422
            )
        );
    }
}
