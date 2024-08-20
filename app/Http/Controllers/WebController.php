<?php

namespace App\Http\Controllers;

use App\Models\Web;
use Cache;
use Exception;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $get = Web::limit(10000)->get();

            if ($get) {
                return response()->json([
                    'Status' => 'Ok',
                    'Content' => $get,
                    'code' => 200,
                ]);
            } else {
                return response()->json([
                    'Status' => 'Failed',
                    'Content' => null,
                    'code' => 401,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'Status' => 'Empty',
                'Content' => $e,
                'code' => 404,
            ]);
        }
    }


    public function index_redis()
    {
        try {

            $get = Cache::remember('web', now()->addMinutes(50), function () {
                $data = Web::limit(10000)->get();
                return $data;
            });


            if ($get) {
                return response()->json([
                    'Status' => 'Ok',
                    'Content' => $get,
                    'code' => 200,
                ]);
            } else {
                return response()->json([
                    'Status' => 'Failed',
                    'Content' => null,
                    'code' => 401,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'Status' => 'Empty',
                'Content' => null,
                'code' => 404,
            ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
