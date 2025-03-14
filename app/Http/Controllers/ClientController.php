<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ApiRespose;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $clients = Client::all()->toArray();

        return ApiRespose::success(['message' => 'request made successfully', 'clients' => $clients]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $client = Client::find($id);

        if (!$client) {
            return ApiRespose::notFound(["message" => "client not found"]);
        }

        return ApiRespose::success(["message" => "client finded successfully", "client" => $client]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|max:200|email|unique:clients,email',
            'phone' => 'required|string|max:20|unique:clients,phone',
        ]);

        $client = Client::create($validatedData);

        return ApiRespose::created(['message' => 'client created successfully', 'client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        if ($request->id !== $id) {
            return ApiRespose::badRequest(['message' => 'the data received does not match']);
        }

        $client = Client::find($id);

        if (!$client) {
            return ApiRespose::notFound(["message" => "client not found"]);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|max:200|email|unique:clients,email',
            'phone' => 'required|string|max:20|unique:clients,phone',
        ]);

        $client->update($validatedData);

        return ApiRespose::success(['message' => 'client updated successfully', 'client' => $client]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $client = Client::find($id);

        if (!$client) {
            return ApiRespose::notFound(['message' => 'client not found']);
        }

        $client->delete();

        return ApiRespose::success(['message' => 'client deleted successfully', 'client' => $client]);
    }
}
