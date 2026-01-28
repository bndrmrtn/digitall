<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(): View {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('twill.contacts.index', compact('contacts'));
    }

    public function show(int $id): View {
        $contact = Contact::findOrFail($id);
        return view('twill.contacts.show', compact('contact'));
    }

    public function destroy(int $id): RedirectResponse {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return to_route('twill.admin.contacts.index');
    }
}
