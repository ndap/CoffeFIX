<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category');
        $priceRange = $request->input('price_range');
        $search = $request->input('search');

        $query = Menu::query();

        if ($category) {
            $query->where('category', $category);
        }

        if ($priceRange) {
            if ($priceRange == '0-50') {
                $query->where('price', '<', 50);
            } elseif ($priceRange == '50-100') {
                $query->whereBetween('price', [50, 100]);
            } elseif ($priceRange == '100+') {
                $query->where('price', '>', 100);
            }
        }

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $menus = $query->get();

        return view('users.dashboard', compact('menus'));
    }
    
    public function landing() {
        return view('landing');
    }
}
