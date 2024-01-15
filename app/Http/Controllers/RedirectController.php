<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRedirectRequest;
use App\Http\Requests\UpdateRedirectRequest;
use Illuminate\Http\Request;
use App\Models\Redirect;

class RedirectController extends Controller
{
    public function index()
    {
        $all = Redirect::orderBy('created_at', 'desc');
        $redirects = $all->paginate(10);
        return view('backend.index', compact('redirects'));
    }

    public function add()
    {
        return view('backend.add');
    }

    public function store(StoreRedirectRequest $request)
    {
        Redirect::create($request->validated());
        return redirect()->back()->with('message', 'Eklendi!');
    }

    public function edit(Redirect $redirect)
    {
        return view('backend.edit', compact('redirect'));
    }
    public function update(Redirect $redirect, UpdateRedirectRequest $request)
    {
        $redirect->update($request->validated());
        return redirect(route('index'))->with('message', 'Güncellendi!');
    }
    public function delete(Redirect $redirect)
    {
        $redirect->delete();
        return redirect(route('index'))->with('message', 'Silindi!');
    }

    public function redirect(Redirect $redirect)
    {
        return redirect()->away($redirect->url);
    }
}
