<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use APP\Models\Monitor;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monitors = monitor::all();
        return monitors;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $monitor = Monitor::create($request->all());
        return $car;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $monitor = Monitor::find($id);
        if (is_null($monitor)){
            return response()->json(["message" => "Nem található monitor ezzel az azonosítóval: $id"],404);
        }

        return $monitor;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $monitor = Monitor::find($id);
        if (is_null($monitor)){
            return response()->json(["message" => "Nem található monitor ezzel az azonosítóval: $id"],404);
        }
        $monitor->fill($request->all());
        $monitor->save();
        return $monitor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $monitor = Monitor::find($id);
        if (is_null($monitor)){
            return response()->json(["message" => "Nem található monitor ezzel az azonosítóval: $id"],404);
        }
        $monitor->delete();
        return response()->noContent();
    }
}
