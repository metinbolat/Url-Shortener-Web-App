<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redirect;

class RedirectController extends Controller
{
    public function index()
    {
        $all = Redirect::orderBy('created_at','desc');
        $redirects = $all->paginate(10);
        return view('backend.index', compact('redirects'));
    }

    public function add()
    {
        return view('backend.add');
    }

    public function store(Request $request)
    {
        Redirect::create($request->all());
        return redirect()->back()->with('message', 'Eklendi!');
    }

    public function edit(Redirect $redirect)
    {
        //$redirect = Redirect::find($slug);
        return view('backend.edit', compact('redirect'));
    }
    public function update (Redirect $redirect, Request $request)
    {
        $redirect->update(['name' => $request->name, 'slug' => $request->slug, 'url' => $request->url,]);
        return redirect(route('index'))->with('message', 'Güncellendi!');
    }
    public function delete (Redirect $redirect)
    {
        $redirect->delete();
        return redirect(route('index'))->with('message', 'Silindi!');
    }

    public function redirect(Redirect $redirect)
    {
        return redirect()->away($redirect->url);
    }
}
