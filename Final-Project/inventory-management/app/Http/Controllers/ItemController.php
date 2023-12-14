<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|unique:items',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $picturePath = $request->file('picture')->store('images', 'public');

        Item::create([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'sku' => $request->input('sku'),
            'picture' => $picturePath,
        ]);

        return redirect('/items');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|unique:items,sku,' . $id,
            'new_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $item = Item::findOrFail($id);

        if ($request->hasFile('new_picture')) {
            // Delete the old picture
            if ($item->picture) {
                Storage::disk('public')->delete($item->picture);
            }

            // Store the new picture
            $picturePath = $request->file('new_picture')->store('images', 'public');
            $item->picture = $picturePath;
        }

        $item->update([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'sku' => $request->input('sku'),
        ]);

        return redirect('/items');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        if ($item->picture) {
            Storage::disk('public')->delete($item->picture);
        }

        $item->delete();

        return redirect('/items');
    }
}
