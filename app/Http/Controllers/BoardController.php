<?php

namespace App\Http\Controllers;

use App\Board;
use App\Http\Resources\Board as BoardResource;

use Illuminate\Http\Request;

use Li\Finale\FinaleController;


class BoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return Board::all();
        $boards = Board::orderBy('id', 'desc')->paginate(5);
        return BoardResource::collection($boards);
    }

    public function show($id)
    {
        return Board::findOrFail($id);
    }

    public function store(Request $request)
    {
        $board = Board::create([
            'name' => $request->name,
            'user_id' => 1
        ]);

        return response()->json(['status' => 'success', 'data' => $board], 200);
    }

    public function update(Request $request, $id)
    {
        $board = Board::find($id);

        $board->name = $request->input('name');
        $board->save();

        return response()->json(['status' => 'success', 'data' => $board], 200);
        
        // return FinaleController::finale();
    }

    //
}
