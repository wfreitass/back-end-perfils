<?php

namespace App\Http\Controllers;

use App\DTOs\ApiResponseDTO;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Interfaces\UsuarioServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsuarioController extends Controller
{

    protected UsuarioServiceInterface $usuarioService;


    public function __construct(UsuarioServiceInterface $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreUsuarioRequest $request)
    {
        Gate::authorize("create", User::class);

        try {
            $usuario = $this->usuarioService->create($request->only([
                "name",
                "email",
                "password"
            ]));

            return ApiResponseDTO::success(201, data: new UsuarioResource($usuario))->toJson();
        } catch (\Throwable $th) {
            return ApiResponseDTO::error(400, message: $th->getMessage())->toJson();
        }
    }

    public function syncPerfils(Request $request, User $usuario)
    {

        if ($request->user()->cannot('syncPerfils', User::class)) {
            abort(403);
        }
        try {
            $this->usuarioService->syncPerfils($request->get("data"), $usuario);

            return ApiResponseDTO::success(201)->toJson();
        } catch (\Throwable $th) {
            return ApiResponseDTO::error(400, message: $th->getMessage())->toJson();
        }
        dd($request->all(), $user);
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
