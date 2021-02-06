<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    function index(Request $request): JsonResponse
    {
        $params = $request->all();
        $directories = Directory::orderBy('created_at', 'desc');
        if(isset($params['code']))
            $directories->where('code', 'LIKE', "%{$params['code']}%");
        if(isset($params['address']))
            $directories->where('address', 'LIKE', "%{$params['address']}%");
        if(isset($params['email']))
            $directories->where('email', 'LIKE', "%{$params['email']}%");
        $per_page = 1;
        if(isset($params['per_page']))
            $per_page = $params['per_page'];
        return response()->json($directories->paginate($per_page));
    }

    function store(Request $request): JsonResponse
    {
        $directory = Directory::create([
            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'town' => $request->get('town'),
            'postal_code' => $request->get('postalCode'),
            'city' => $request->get('city'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
        ]);
        return response()->json(["directory" => $directory], 201);
    }

    function update(Request $request, Directory $directory): JsonResponse
    {
        $directory->code =  $request->get('code');
        $directory->name =  $request->get('name');
        $directory->address =  $request->get('address');
        $directory->town =  $request->get('town');
        $directory->postal_code =  $request->get('postal_code');
        $directory->city =  $request->get('city');
        $directory->phone =  $request->get('phone');
        $directory->email =  $request->get('email');
        $directory->save();
        return response()->json(["directory" => $directory], 200);
    }

    function delete(Directory $directory): JsonResponse
    {
        $directory->delete();
        return response()->json(["message" => "Directory deleted"], 200);
    }
}
