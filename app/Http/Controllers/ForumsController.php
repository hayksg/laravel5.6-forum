<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ForumsController extends Controller
{
    public function index()
    {     
        switch (request('filter')) {
            case 'me':
                $discussions = Discussion::where('user_id', auth()->id())->paginate(3);
                break;
            case 'solved':
                $answered = [];
                
                foreach (Discussion::all() as $d) {
                    if ($d->hasBestAnswer()) {
                        array_push($answered, $d);
                    }
                }
                
                $discussions = $this->paginate($answered, 1);
                $discussions->withPath('forum?filter=solved');
                break;
            case 'unsolved':
                $unsolved = [];
                
                foreach (Discussion::all() as $d) {
                    if (! $d->hasBestAnswer()) {
                        array_push($unsolved, $d);
                    }
                }
                
                $discussions = $this->paginate($unsolved, 3);
                $discussions->withPath('forum?filter=unsolved');

                break;
            default:
                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }
        
        return view('forum', compact('discussions'));
    }
    
    private function paginate($items,$perPage)
    {
        $pageStart = \Request::get('page', 1);
        // Start displaying items from this number;
        $offSet = ($pageStart * $perPage) - $perPage; 

        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);

        return new LengthAwarePaginator($itemsForCurrentPage, 
                                        count($items), 
                                        $perPage,
                                        Paginator::resolveCurrentPage(), 
                                        ['path' => Paginator::resolveCurrentPath()]);
    }
    
    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();
        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}
