<?php namespace App\Http\Controllers;

use App\models\PlayerGameData;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class PlayerGameDataController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /playergamedata
     *
     * @return Response
     */
    public function index()
    {
        return view('results');
    }

    /**
     * Show the form for creating a new resource.
     * GET /playergamedata/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /playergamedata
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();

        PlayerGameData::create(array(
            'id' =>Uuid::uuid4(),
            'name' => $data['name'],
            'level' => $data['level'],
            'score' => $data['score'],
        ));

        return view('results');

    }

    /**
     * Display the specified resource.
     * GET /playergamedata/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     * DELETE /playergamedata/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}