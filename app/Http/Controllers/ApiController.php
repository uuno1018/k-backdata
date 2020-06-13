<?php

namespace App\Http\Controllers;

use App\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Api::all();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "name" => $request->name,
            "kizi" => $request->kizi,
            "created_at" => $now,
        ];            
        DB::insert('insert into users (name,kizi,created_at)
            values (:name,:kizi,:created_at)', $param);
        return response()->json();
    }
}
