<?php

nevspace App\Http\Controllers;
use App\Http\Requests\GuestsReq;
use App\Models\Guests;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GuestsController extends Controller
{
    
    public function index() {
    
        $Guest = Guests::with("ticket")->get();
    
        return response()->json($Guest);
    }

    public function create(GuestsReq $req) {
    
        $maxUskor = DB::table("tickets")
    
        ->select("max_uskors")
    
        ->where("id", $req->get("ticket_id"))
    
        ->first();
    
        $currentUskor = Guests::select(["guest.*"])
    
        ->Where("ticket_id", $req->get("ticket_id"))
    
        ->count();
    
        if (
    
            intval($currentUskor) == intval($maxUskor->max_uskors) ||
    
            intval($currentUskor) > intval($maxUskor->max_uskors)
        ) 
        {
            return response("A jegy elérte a maximális felhasználási számot.",
                            400);
        }

        $Guest = new Guests();
        if ($req->has("nev")) {
            $Guest->nev = $req->get("nev");
        }
        if ($req->has("kor")) {
            $Guest->kor = $req->get("kor");
        }
        if ($req->has("ticket_id")) {
            $Guest->ticket_id = $req->get("ticket_id");
        }

        $Guest->save();
        return response()->json($Guest->id);
    }

    public function update(Guests $Guest, GuestsReq $req) {
        $maxUskor = DB::table("tickets")
                        ->select("max_uskors")
                        ->where("id", $req->get("ticket_id"))
                        ->first();
        $currentUskor = Guests::select(["people.*"])
                        ->Where("ticket_id", $req->get("ticket_id"))
                        ->count();
        if (
                    intval($currentUskor) == intval($maxUskor->max_uskors) ||
                    intval($currentUskor) > intval($maxUskor->max_uskors)
        ) {
            return response("Max felhasználhatóságot elérte a jegy.",
                            400);
        }

        if ($req->has("nev")) {
            $Guest->nev = $req->get("nev");
        }
        if ($req->has("kor")) {
            $Guest->kor = $req->get("kor");
        }
        if ($req->has("ticket_id")) {
            $Guest->ticket_id = $req->get("ticket_id");
        }

        $Guest->save();
        return response()->json($Guest);
    }

    public function delete(Guests $Guest) {
        $Guest->delete();
        return response()->json($Guest);
    }
}
