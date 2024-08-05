<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        return Category::create($validated);
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $category = Category::findOrFail($id);
        $category->update($validated);
        return $category;
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response()->noContent();
    }

    public function show_books($id)
    {
        // Fetch the category by ID and load the related books
        $category = Category::with('books')->findOrFail($id);
        
        // Return the books related to the category
        return response()->json($category->books);
    }
}
