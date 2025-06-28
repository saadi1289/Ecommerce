<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10); // Fetch all categories
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable',
        ]);

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status', true), // Default to true if not provided
        ];

        // Create a new category with the validated data
        $category = Category::create($data);
        // Logic to save the category

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // Logic to fetch the category by ID
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|',
        ]);
        // Update the product with the validated data
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status', true), // Default to true if not provided
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        // Logic to delete the category by ID
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
