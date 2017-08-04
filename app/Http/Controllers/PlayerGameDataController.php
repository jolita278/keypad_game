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
    public function index(){
        $config['list2'] = PlayerGameData::where('level', '2')->orderBy('score', 'desc')->take(3)->get()->toArray();
        $config['list4'] = PlayerGameData::where('level', '4')->orderBy('score', 'desc')->take(3)->get()->toArray();
        $config['list6'] = PlayerGameData::where('level', '6')->orderBy('score', 'desc')->take(3)->get()->toArray();

        return view('results', $config);
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
            'time' => $data['time'],
            'average_speed' => $data['average_speed'],
        ));

        return view('results');

    }

}