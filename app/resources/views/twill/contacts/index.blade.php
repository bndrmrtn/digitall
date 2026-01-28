@extends('twill::layouts.free')

@section('customPageContent')
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        <h1 style="font-size:20px; font-weight:600; margin-bottom:12px; color:#222;">Contacts</h1>

        <div role="region" aria-label="contacts list"
             style="background:#fff; border:1px solid #e5e7eb; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.04); overflow:hidden;">
            <table role="table" style="width:100%; border-collapse:collapse; font-size:14px; color:#374151;">
                <thead style="">
                <tr>
                    <th style="background:#f8fafc; text-align:left; padding:12px 16px; color:#6b7280; font-size:12px; letter-spacing:0.04em; text-transform:uppercase;">Name</th>
                    <th style="background:#f8fafc; text-align:left; padding:12px 16px; color:#6b7280; font-size:12px; letter-spacing:0.04em; text-transform:uppercase;">Email</th>
                    <th style="background:#f8fafc; text-align:left; padding:12px 16px; color:#6b7280; font-size:12px; letter-spacing:0.04em; text-transform:uppercase;">Subject</th>
                    <th style="background:#f8fafc; text-align:right; white-space:nowrap; padding:12px 16px; color:#6b7280; font-size:12px; letter-spacing:0.04em; text-transform:uppercase;">Actions</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($contacts as $contact)
                    <tr style="">
                        <td style="padding:12px 16px; border-top:1px solid #f3f4f6; vertical-align:middle;">{{ $contact->name }}</td>
                        <td style="padding:12px 16px; border-top:1px solid #f3f4f6; vertical-align:middle;">{{ $contact->email }}</td>
                        <td style="padding:12px 16px; border-top:1px solid #f3f4f6; vertical-align:middle;">{{ $contact->subject }}</td>
                        <td style="text-align:right; white-space:nowrap; padding:12px 16px; border-top:1px solid #f3f4f6; vertical-align:middle;">
                            <a href="{{ route('twill.admin.contacts.show', $contact->id) }}"
                               style="display:inline-block; padding:6px 10px; border-radius:6px; font-size:13px; text-decoration:none; cursor:pointer; background:transparent; border:1px solid transparent; color:#2563eb;">View</a>

                            <form method="POST"
                                  action="{{ route('twill.admin.contacts.destroy', $contact->id) }}"
                                  style="display:inline" onsubmit="return confirm('Delete this contact?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="display:inline-block; padding:6px 10px; border-radius:6px; font-size:13px; text-decoration:none; cursor:pointer; background:#ef4444; color:#fff; border:1px solid rgba(0,0,0,0.02);">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center; padding:18px 16px; color:#6b7280;">
                            No contacts found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
