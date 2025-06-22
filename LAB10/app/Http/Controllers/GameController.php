<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class GameController extends Controller
{
public function index()
{
return view('index');
}
public function create()
{
return view('games.create');
}
public function list($game)
{
$videogames = array('Spider-Man', 'Horizon: Zero Dawn', 'Dragon Ball: Sparking!
Zero');
return view('games.list', ['games' => $videogames]);
}
public function help($game, $category = null)
{
$date = now();
return view('games.show', ['game' => $game, 'category' => $category, 'date' =>
$date]);
}
}