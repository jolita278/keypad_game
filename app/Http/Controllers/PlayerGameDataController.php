<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PlayerGameDataController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /playergamedata
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('game');
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
		//
	}

	/**
	 * Display the specified resource.
	 * GET /playergamedata/{id}
	 *
	 * @param  int  $id
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}