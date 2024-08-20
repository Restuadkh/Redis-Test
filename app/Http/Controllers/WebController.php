<?php

namespace App\Http\Controllers;

use App\Models\Web;
// use Cache;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Predis\PredisException;
predis
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
            
            // Mendapatkan data dari Redis dengan key 'web'
            // $get = Redis::get('web');
            $get = Redis::get('name');

            // Jika data tidak ada di Redis, ambil dari database dan simpan ke Redis
            if (!$get) {
                // $data = Web::limit(10000)->get();
                // Menyimpan data ke Redis
                Redis::set('name', 'value');
                // Simpan data ke Redis dengan key 'web' dan TTL 50 menit
                // Redis::set('web', 50 * 60, $data->toJson());
                // Redis::set('web', 50 * 60, "TEST");
                $get = Redis::get('name'); 
            } else {
                // Jika data ada di Redis, decode JSON ke objek
                $get = json_decode($get);
            }

            // Return response jika data ada
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
