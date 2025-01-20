<?php

namespace App\Http\Controllers;

use App\DTOs\ApiResponseDTO;
use App\Http\Resources\PerfilResource;
use App\Interfaces\PerfilServiceInterface;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    /**
     *
     * @var PerfilServiceInterface
     */
    protected PerfilServiceInterface $perfilService;

    public function __construct(PerfilServiceInterface $perfilService)
    {
        $this->perfilService = $perfilService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ApiResponseDTO::success(data: PerfilResource::collection($this->perfilService->all()))->toJson();
            // return TarefaResource::collection($this->tarefaService->all());
        } catch (\Throwable $th) {
            return ApiResponseDTO::error(400, message: $th->getMessage())->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
