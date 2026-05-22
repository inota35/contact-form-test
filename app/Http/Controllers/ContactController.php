<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
      public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        $request->session()->put($contact);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->except('_token'));
        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
