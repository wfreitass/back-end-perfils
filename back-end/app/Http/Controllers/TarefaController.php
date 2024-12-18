<?php

namespace App\Http\Controllers;

use App\DTOs\ApiResponseDTO;
use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;
use App\Http\Resources\TarefaResource;
use App\Interfaces\TarefaServiceInterface;
use App\Models\Tarefa;

class TarefaController extends Controller
{

    /**
     *
     * @var TarefaServiceInterface
     */
    protected TarefaServiceInterface $tarefaService;

    public function __construct(TarefaServiceInterface $tarefaService)
    {
        $this->tarefaService = $tarefaService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ApiResponseDTO::success(data: TarefaResource::collection($this->tarefaService->all()))->toJson();
            // return TarefaResource::collection($this->tarefaService->all());
        } catch (\Throwable $th) {
            return ApiResponseDTO::error(400, message: $th->getMessage())->toJson();
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTarefaRequest $request)
    {

        try {
            $tarefa = $this->tarefaService->create($request->only([
                'titulo',
                'descricao',
            ]));
            return ApiResponseDTO::success(201, data: new TarefaResource($tarefa))->toJson();
        } catch (\Throwable $th) {
            return ApiResponseDTO::error(400, message: $th->getMessage())->toJson();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        try {
            return ApiResponseDTO::success(200, data: new TarefaResource($tarefa))->toJson();
        } catch (\Throwable $th) {
            return ApiResponseDTO::success(400, message: $th->getMessage())->toJson();
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTarefaRequest $request, Tarefa $tarefa)
    {

        try {
            $tarefa = $this->tarefaService->update($tarefa->id, $request->only([
                'titulo',
                'descricao',
            ]));
            return ApiResponseDTO::success(201, data: new TarefaResource($tarefa))->toJson();
        } catch (\Throwable $th) {
            return ApiResponseDTO::error(400, message: $th->getMessage())->toJson();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {

        try {
            $this->tarefaService->delete($tarefa->id);
            return ApiResponseDTO::success()->toJson();
        } catch (\Throwable $th) {
            return ApiResponseDTO::success(400, message: $th->getMessage())->toJson();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function finalizar(Tarefa $tarefa)
    {

        try {
            $tarefa =  $this->tarefaService->finalizar($tarefa->id);
            return ApiResponseDTO::success(201, data: new TarefaResource($tarefa))->toJson();
        } catch (\Throwable $th) {
            return ApiResponseDTO::success(400, message: $th->getMessage())->toJson();
        }
    }
}
