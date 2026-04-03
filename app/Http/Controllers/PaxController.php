<?php

namespace App\Http\Controllers;

use App\Models\TableSession;
use Illuminate\Http\Request;

class PaxController extends Controller
{
    /**
     * POST /pax/save  (route: pax.save)
     */
    public function save(Request $request)
    {
        $data = $request->validate(['pax' => 'required|integer|min:1|max:99']);
        session(['pax' => $data['pax'], 'pax_set' => true]);

        return response()->json(['ok' => true]);
    }

    /**
     * POST /pax/clear  (route: pax.clear)
     * Clearing pax also wipes the table booking.
     */
    public function clear()
    {
        TableSession::clearForCurrentSession();
        session()->forget(['pax', 'pax_set', 'table', 'table_set']);

        return response()->json(['ok' => true]);
    }
}