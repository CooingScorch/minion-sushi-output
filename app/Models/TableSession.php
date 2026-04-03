<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableSession extends Model
{
    protected $fillable = [
        'session_id',
        'primary_table',
        'all_tables',
        'pax',
    ];

    protected $casts = [
        'all_tables' => 'array',
    ];

    // ── Helpers ──────────────────────────────────────────────

    /**
     * Get all table numbers currently occupied (across all active sessions).
     * Returns a flat array like [2, 3, 4, 6].
     */
    public static function occupiedTableNumbers(): array
    {
        return static::all()
            ->flatMap(fn($row) => $row->all_tables)
            ->unique()
            ->values()
            ->toArray();
    }

    /**
     * Get the session row for the current Laravel session, or null.
     */
    public static function forCurrentSession(): ?static
    {
        return static::where('session_id', session()->getId())->first();
    }

    /**
     * Upsert a table booking for the current session.
     */
    public static function saveForCurrentSession(int $primary, array $allTables, int $pax): static
    {
        return static::updateOrCreate(
            ['session_id' => session()->getId()],
            [
                'primary_table' => $primary,
                'all_tables'    => $allTables,
                'pax'           => $pax,
            ]
        );
    }

    /**
     * Remove the booking for the current session.
     */
    public static function clearForCurrentSession(): void
    {
        static::where('session_id', session()->getId())->delete();
    }
}