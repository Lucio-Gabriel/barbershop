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
            'rating' => 'required|numeric',
            'active' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $created = Barber::create($validator->validated());

        return (new BarberResource($created))
            ->additional(['messsage' => 'Perfil do barbeiro criado com sucesso.'])
            ->response()
            ->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new BarberResource(Barber::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
