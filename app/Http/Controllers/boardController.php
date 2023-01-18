<?php

namespace App\Http\Controllers;

use App\Models\board;
use Illuminate\Http\Request;

class boardController extends Controller
{

    private $board;

    public function __construct(board $board)
    {
        $this->board = $board;
    }

    public function index()
    {
        $boards = $this->board
            ->with('user')
            ->paginate(12);
        return view('board.index', compact('boards'));
    }

    public function show($id)
    {
        $board = $this->board->find($id);
        return view('board.show', compact('board'));
    }
}
