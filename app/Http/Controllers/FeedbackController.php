<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('pages.feedback');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'overall_rating' => 'required|integer|min:1|max:5',
            'food_taste' => 'required|integer|min:1|max:5',
            'food_freshness' => 'required|integer|min:1|max:5',
            'order_accuracy' => 'required|integer|min:1|max:5',
            'service_speed' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        DB::table('feedback')->insert([
            'user_id' => Auth::id(),
            'overall_rating' => $validated['overall_rating'],
            'food_taste' => $validated['food_taste'],
            'food_freshness' => $validated['food_freshness'],
            'order_accuracy' => $validated['order_accuracy'],
            'service_speed' => $validated['service_speed'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return redirect()
            ->route('feedback')
            ->with('success', 'Thank you for your feedback!');
    }
}