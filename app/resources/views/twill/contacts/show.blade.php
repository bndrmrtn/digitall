@extends('twill::layouts.free')

@section('customPageContent')
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        <h1 style="font-size:20px; font-weight:600; margin-bottom:12px; color:#222;">Contact Details</h1>

        <div style="background:#fff; border:1px solid #e5e7eb; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.04); padding:24px; overflow:hidden;">
            <div style="margin-bottom:12px;">
                <div style="font-size:13px; font-weight:500; color:#6b7280; margin-bottom:4px;">Name</div>
                <div style="padding:8px 12px; border:1px solid #d1d5db; border-radius:6px; background:#f9fafb; color:#111;">{{ $contact->name }}</div>
            </div>

            <div style="margin-bottom:12px;">
                <div style="font-size:13px; font-weight:500; color:#6b7280; margin-bottom:4px;">Email</div>
                <div style="padding:8px 12px; border:1px solid #d1d5db; border-radius:6px; background:#f9fafb; color:#111;">{{ $contact->email }}</div>
            </div>

            <div style="margin-bottom:12px;">
                <div style="font-size:13px; font-weight:500; color:#6b7280; margin-bottom:4px;">Subject</div>
                <div style="padding:8px 12px; border:1px solid #d1d5db; border-radius:6px; background:#f9fafb; color:#111;">{{ $contact->subject }}</div>
            </div>

            <div>
                <div style="font-size:13px; font-weight:500; color:#6b7280; margin-bottom:4px;">Message</div>
                <div style="padding:8px 12px; border:1px solid #d1d5db; border-radius:6px; background:#f9fafb; color:#111; white-space:pre-wrap;">{{ $contact->message }}</div>
            </div>
        </div>

        <div style="margin-top:24px; display:flex; gap:12px;">
            <a href="{{ route('twill.admin.contacts.index') }}"
               style="display:inline-block; padding:6px 10px; border-radius:6px; font-size:13px; text-decoration:none; cursor:pointer; background:#f3f4f6; color:#111; border:1px solid #d1d5db;">
                Back to list
            </a>

            <form method="POST"
                  action="{{ route('twill.admin.contacts.destroy', $contact->id) }}"
                  style="display:inline"
                  onsubmit="return confirm('Are you sure you want to delete this contact?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        style="display:inline-block; padding:6px 10px; border-radius:6px; font-size:13px; cursor:pointer; background:#ef4444; color:#fff; border:1px solid rgba(0,0,0,0.02);">
                    Delete
                </button>
            </form>
        </div>
    </div>
@stop
