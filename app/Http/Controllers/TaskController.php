<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importar, para poder utilizar a Model
use App\Models\Task;

class TaskController extends Controller {
    /**
     * $request: dados recebidos no formato JSON
     * No create, deve ser mapeado para os nomes dos
     * atributos da tabela tasks.
     * user_id: recebe o ID do usuário autenticado
     */
    public function register(Request $request) {
        $task = Task::create([
            'name' => $request->name,
            'task_date' => $request->task_date,
            // helper para pegar o ID do usuário autenticado
            'user_id' => auth()->user()->id 
        ]);
        return response()->json($task);
    }

    /**
     * Retorna todas as tasks do usuário autenticado
     * por meio da cláusula where user_id=ID_AUTENTICADO
     */
    public function getAll() {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return response()->json($tasks);
    }
}
