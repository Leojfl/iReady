<?php


namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertBoardRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\Board;
use App\Models\Store;
use Illuminate\Database\Eloquent\Builder;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::orderBy('id')->get();
        return view('store.board.index', ['boards' => $boards]);
    }

    public function upsert($boardId = 0)
    {
        $board = Board::find($boardId);
        return view('store.board.upsert', ['board' => $board]);
    }

    public function show(UpsertBoardRequest $request, $boardId = 0)
    {
        $board = Board::find($boardId);
        return view('store.board.profile', ['board' => $board]);
        
    }
    

    public function upsertPost(UpsertBoardRequest $request ,$boardId = 0)
    {
        try{
            $user = Auth::User();
        $store = Store::whereHas('employees', function (Builder $query) use ($user) {
            $query->where('fk_id_user', $user->id);
        })->first();
            DB::beginTransaction();
            $board = Board::findOrNew($boardId);
            $board->fill($request->all());
            $board->fk_id_store = $store->id;
            $board->saveOrfail();
            DB::commit();
            return redirect()->route('store_board_index');
     } catch(\Exception $e) {
            DB::rollback();
            return back()
            ->withErrors([ 'generic_error' => ['Algo salio mal']])
            ->withInput($request->all());
        }
    }

    public function destroy($boardId)
    {
        $board = Board::find($boardId);
        $board->delete();
        return redirect()->route('store_board_delete');
    }
}
