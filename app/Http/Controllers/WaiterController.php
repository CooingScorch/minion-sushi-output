<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaiterController extends Controller
{
    /**
     * API: Record waiter call for a table.
     * In production this would broadcast an event / notify kitchen staff.
     */
    public function call(Request $request)
    {
        $validated = $request->validate([
            'table' => 'sometimes|integer|min:1|max:200',
        ]);

        $table = $validated['table'] ?? $request->session()->get('table', 7);

        // Log the call (in production: fire event, notify POS system, etc.)
        \Log::info("🙋 Waiter called for Table {$table} at " . now()->toDateTimeString());

        // Store last called time in session
        $request->session()->put('waiter_called_at', now()->toTimeString());

        return response()->json([
            'success' => true,
            'table'   => $table,
            'message' => __('messages.waiter_called'),
            'time'    => now()->format('H:i'),
        ]);
    }
}
