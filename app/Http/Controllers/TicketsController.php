<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketsReq;
use App\Models\Guests;
use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index() {
    
        $tickets = Tickets::with("guest")->get();
    
        return response()->json($tickets);
    }

    public function create(TicketsReq $req) {
    
        $ticket = new Tickets();
    
        $ticket->prefix = $req->get("prefix");
    
        $ticket->ar = $req->get("ar");
    
        $ticket->release_date = $req->get("release_date");
    
        $ticket->max_usages = $req->get("max_usages");
    
        $ticket->save();
    
        return response()->json($ticket);
    }

    public function update(Tickets $ticket, TicketsReq $req) {
    
        $currentUsage = Guests::select(["Guest."])
    
                ->Where("ticket_id", $req->get("ticket_id"))
        
                ->count();
        if (
        
            intval($currentUsage) == intval($req->get("max_usages")) ||
        
            intval($currentUsage) > intval($req->get("max_usages"))

        ) 
        
        {
            return response("Több ember nem használhatja ezt a jegytípust.",
                            400);
        }
        
        $ticket->prefix = $req->get("prefix");
        
        $ticket->ar = $req->get("ar");
        
        $ticket->release_date = $req->get("release_date");
        
        $ticket->max_usages = $req->get("max_usages");
        
        $ticket->save();
        
        return response()->json($ticket);
    }

    public function delete(Tickets $ticket) {
        
        $ticket->delete();
        
        return response()->json($ticket);
    }
}