<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        return ServiceResource::collection(Service::get());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'time'        => 'required|numeric',
            'price'       => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $created = Service::create($validator->validated());

        return (new ServiceResource($created))
            ->additional(['message' => 'Novo serviço criado com sucesso!'])
            ->response()
            ->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new ServiceResource(Service::where('id', $id)->first());
    }

    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'time'        => 'required|numeric',
            'price'       => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $updated = $service->update([
            'name'        => $validated['name'],
            'description' => $validated['description'],
            'time'        => $validated['time'],
            'price'       => $validated['price'],
        ]);

        return (new ServiceResource($service))
            ->additional(['message' => 'Serviço atualizado com sucesso!'])
            ->response()
            ->setStatusCode(201);
    }

    public function destroy(Service $service)
    {
        $deleted = $service->delete();

        if ($deleted) {
            return response()->json(['Serviço deletado com sucesso!'], 200);
        }

        return response()->json(['O Serviço não foi deletado com sucesso!'], 400);
    }
}
