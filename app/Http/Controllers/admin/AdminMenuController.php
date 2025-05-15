<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Menu::create($request->all());

        return redirect()->route('admin.menu.create')->with('success', 'メニューが追加されました');
    }
}



