<?php

namespace App\Http\Controllers;

use App\Http\Requests\MagazineRequest;
use App\Models\Category;
use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class MagagineController extends Controller
{
    public function index()
    {
        $portfolies = Magazine::get();
        $categories = Category::get();
        return view('backend.portfolio.index', compact('portfolies', 'categories'));
    }


    public function show()
    {
        $portfolies = Magazine::get();
        $categories = Category::get();
        return view('backend.portfolio.show', compact('portfolies', 'categories'));
    }

    public function store(MagazineRequest $request)
    {
        $magazines = new Magazine();
        $magazines->title = $request->title;
        $magazines->url = $request->url;
        $magazines->description = $request->description;
        $magazines->category_id = $request->category_id;

        // Task image
        $file = $request->file('image');
        $image_name = Str::of($request->title)->slug() . '-' . time() . '.' . $file->extension();
        $magazines->image = $file->storePubliclyAs('public/magazine', $image_name);
        $magazines->save();
        return redirect()->route('magazines.show')->with('message', 'Magazine added successfully');

        // Note image
        // if ($request->file('image')) {
        //     $file = $request->file('image');
        //     $filename = date('YmdHi') . $file->getClientORiginalName();
        //     $file->move(public_path('upload/magazine_images'), $filename);
        //     $portfolies['image'] = $filename;
        // }
    }
}
