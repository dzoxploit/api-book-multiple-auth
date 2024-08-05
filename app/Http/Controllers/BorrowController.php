<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        return Borrow::with('book', 'user')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
        ]);

        $userId = Auth::user()->id;

        // Create the borrow record
        $borrow = Borrow::create([
            'book_id' => $validated['book_id'],
            'user_id' => $userId,
            'borrowed_at' => $validated['borrowed_at'],
        ]);

        return $borrow;
    }
    
    public function show($id)
    {
        return Borrow::with('book', 'user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'returned_at' => 'nullable|date',
        ]);

        $borrow = Borrow::findOrFail($id);

        if ($borrow->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $borrow->update($validated);
        
        return $borrow;
    }


    public function destroy($id)
    {
        Borrow::destroy($id);
        return response()->noContent();
    }
}
