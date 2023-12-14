<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect('/categories');
    }

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }
    // This is the next paragraph code 
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect('/categories');
    }
}
