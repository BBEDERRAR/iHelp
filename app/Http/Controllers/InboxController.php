<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\MessageNewNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Notification;

class InboxController extends Controller
{
    public function __construct()
    {
        $newMessages = Message::where('read', 0)->get();
        $this->middleware('auth')->except('sendMessage');
    }

    public function inbox()
    {
        $messages = Message::all()->sortByDesc('created_at');
        return view('dashboard.inbox.inbox')->with([
            'messages' => $messages,
            'read' => count($messages->where('read', 1)),
            'unread' => count($messages->where('read', 0)),
            'title' => __('inbox.inbox'),
            'active' => 'inbox'
        ]);
    }

    public function inboxDetail($id)
    {
        $messages = Message::all();
        $message = Message::find($id);
        $message->read = 1;
        $message->save();
        return view('dashboard.inbox.inboxDetail')->with([
            'message' => $message,
            'title' => $message->subject,
            'active' => 'inbox',
            'read' => count($messages->where('read', 1)),
            'unread' => count($messages->where('read', 0)),
        ]);
    }

    public function compose()
    {
        return view('dashboard.inbox.compose')->with([
            'title' => __('inbox.compose'),
            'active' => 'inbox'
        ]);
    }

    public function sendMessage(Request $request)
    {
        $message=Message::create([
            'message' => $request->get('message'),
            'sender' => $request->get('sender'),
            'subject' => $request->get('subject'),
            'email' => $request->get('email')
        ]);
        Session::Flash('success',__('dashboard.success'));

        foreach (Role::all() as $role) {
            if ($role->hasPermissionTo('notify when receiving new message')){
                $users=User::role($role->name)->get();
                Notification::send($users,new MessageNewNotification($message));
            }
        }

        return redirect()->back();
    }

    public function reply(Request $request)
    {
        $email = $request->get('email');
        $subject = $request->get('subject');
        Mail::send('dashboard.mail.reply', ['reply' => $request->get('message')], function ($message) use ($email, $subject) {
            $message->to($email)
                ->subject($subject);
            $message->from('istikdam@gmail.com', $subject);
        });


        return redirect()->back();
    }


}
