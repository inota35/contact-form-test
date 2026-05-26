<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
    $query = Contact::with('category');

    if ($request->filled('name')) {
        $query->where(function($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->name . '%')
              ->orWhere('last_name', 'like', '%' . $request->name . '%');
        });
    }

    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }

    if ($request->filled('gender') && $request->gender != 0) {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $contacts = $query->paginate(7);
    return view('admin', compact('contacts'));

}   
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request)
{
    $query = Contact::with('category');

    if ($request->filled('name')) {
        $query->where(function($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->name . '%')
              ->orWhere('last_name', 'like', '%' . $request->name . '%');
        });
    }

    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }

    if ($request->filled('gender') && $request->gender != 0) {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $contacts = $query->paginate(7);
    return view('admin', compact('contacts'));
}

public function reset()
{
    return redirect('/admin');
}

public function export()
{
    $contacts = Contact::with('category')->get();

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename=contacts.csv',
    ];

    $callback = function() use ($contacts) {
        $file = fopen('php://output', 'w');
        fputcsv($file, ['お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容']);

        foreach ($contacts as $contact) {
            $gender = $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他');
            fputcsv($file, [
                $contact->last_name . ' ' . $contact->first_name,
                $gender,
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building ?? '',
                $contact->category->content,
                $contact->detail,
            ]);
        }
        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
}