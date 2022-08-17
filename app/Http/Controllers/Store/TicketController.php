<?php


namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertTicketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::orderBy('id')->get();
        return view('store.ticket.index', ['tickets' => $tickets]);
    }

    public function upsert($ticketId = 0)
    {
        $ticket = Ticket::find($ticketId);
        return view('store.ticket.upsert', ['ticket' => $ticket]);
    }

    

    public function upsertPost(UpsertTicketRequest $request ,$ticketId = 0)
    {
        try{
            DB::beginTransaction();
            $ticket = Ticket::findOrNew($ticketId);
            $ticket->fill($request->all());
            $ticket->saveOrfail();
            DB::commit();
            return redirect()->route('store_ticket_index');
        } catch(\Exception $e) {
            DB::rollback();
            return back()
            ->withErrors([ 'generic_error' => ['Algo salio mal']])
            ->withInput($request->all());
        }
    }

    public function destroy($ticketId)
    {
        $ticket = Ticket::find($ticketId);
        $ticket->delete();
        return redirect()->route('store_ticket_delete');
    }
}