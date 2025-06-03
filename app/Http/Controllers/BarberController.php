<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarberResource;
use App\Models\Barber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarberController extends Controller
{
    public function index()
    {
        return BarberResource::collection(Barber::get());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|min:3|max:255',
            'email'  => 'required|min:3|max:255',
            'avatar' => 'max:255',
            'rating' => 'required',
            'active' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $created = Barber::create($validator->validated());

        return (new BarberResource($created))
            ->additional(['message' => 'Perfil do barbeiro criado com sucesso.'])
            ->response()
            ->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new BarberResource(Barber::where('id', $id)->first());
    }

    public function update(Request $request, Barber $barber)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|min:3|max:255',
            'email'  => 'required|min:3|max:255',
            'avatar' => 'max:255',
            'rating' => 'required',
            'active' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validate();

        $updated = $barber->update([
            'name'   => $validated['name'],
            'email'  => $validated['email'],
            'avatar' => $validated['avatar'],
            'rating' => $validated['rating'],
            'active' => $validated['active'],
        ]);

        return (new BarberResource($barber))
            ->additional(['message' => 'Dados do barbeiro atualizado com sucesso.'])
            ->response()
            ->setStatusCode(201);

    }

    public function destroy(Barber $barber)
    {
        $deleted = $barber->delete();

        if ($deleted) {
            return response()->json(['Barbeiro removido com sucesso.'], 200);
        }

        return response()->json(['Barbeiro não foi removido.'], 400);
    }
}
