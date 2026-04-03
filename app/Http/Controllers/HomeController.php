<?php

namespace App\Http\Controllers;

use App\Models\TableSession;

class HomeController extends Controller
{
    public function home()
    {
        $occupiedTables = TableSession::occupiedTableNumbers();
        $mySession      = TableSession::forCurrentSession();
        $myTables       = $mySession ? $mySession->all_tables : [];

        // Don't mark own tables as occupied (they show as "selected" instead)
        $occupiedTables = array_values(array_diff($occupiedTables, $myTables));

        return view('pages.home', compact('occupiedTables', 'mySession'));
    }

    /**
     * GET /api/occupied-tables
     * Returns live occupied table numbers (excluding current session's own tables).
     */
    public function occupiedTables()
    {
        $occupiedTables = TableSession::occupiedTableNumbers();
        $mySession      = TableSession::forCurrentSession();
        $myTables       = $mySession ? $mySession->all_tables : [];

        $occupiedTables = array_values(array_diff($occupiedTables, $myTables));

        return response()->json(['occupied' => $occupiedTables]);
    }
}