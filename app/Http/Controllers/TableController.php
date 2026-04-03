<?php

namespace App\Http\Controllers;

use App\Models\TableSession;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * POST /api/table
     * Save table selection for current session.
     * Body: { table: 3, all_tables: [3,4] }
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'table'      => 'required|integer|min:1|max:20',
            'all_tables' => 'nullable|array',
            'all_tables.*' => 'integer|min:1|max:20',
        ]);

        $primary   = $data['table'];
        $allTables = $data['all_tables'] ?? [$primary];
        $pax       = session('pax', 1);

        TableSession::saveForCurrentSession($primary, $allTables, $pax);

        session(['table' => $primary, 'table_set' => true]);

        return response()->json(['ok' => true, 'table' => $primary, 'all_tables' => $allTables]);
    }

    /**
     * POST /table/clear  (route: table.clear)
     * Remove table booking for current session.
     */
    public function clear()
    {
        TableSession::clearForCurrentSession();
        session()->forget(['table', 'table_set']);

        return response()->json(['ok' => true]);
    }
}