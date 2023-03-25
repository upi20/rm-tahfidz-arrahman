<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Message::datatable($request);
        }
        $page_attr = [
            'title' => 'Pesan Diterima',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Kontak'],
            ]
        ];
        $setting = (object)[
            'title' => settings()->get('setting.contact.message.title'),
            'sub_title' => settings()->get('setting.contact.message.sub_title'),
            'name' => settings()->get('setting.contact.message.name'),
            'name_placeholder' => settings()->get('setting.contact.message.name_placeholder'),
            'email' => settings()->get('setting.contact.message.email'),
            'email_placeholder' => settings()->get('setting.contact.message.email_placeholder'),
            'message' => settings()->get('setting.contact.message.message'),
            'message_placeholder' => settings()->get('setting.contact.message.message_placeholder'),
            'button_text' => settings()->get('setting.contact.message.button_text'),
        ];

        $data = compact('page_attr', 'setting');
        $data['compact'] = $data;
        return view('admin.kontak.message', $data);
    }

    public function setting(Request $request)
    {
        settings()->set('setting.contact.message.title', $request->title)->save();
        settings()->set('setting.contact.message.sub_title', $request->sub_title)->save();

        settings()->set('setting.contact.message.name', $request->name)->save();
        settings()->set('setting.contact.message.name_placeholder', $request->name_placeholder)->save();
        settings()->set('setting.contact.message.email', $request->email)->save();
        settings()->set('setting.contact.message.email_placeholder', $request->email_placeholder)->save();
        settings()->set('setting.contact.message.message', $request->message)->save();
        settings()->set('setting.contact.message.message_placeholder', $request->message_placeholder)->save();

        settings()->set('setting.contact.message.button_text', $request->button_text)->save();
        return response()->json();
    }
}
