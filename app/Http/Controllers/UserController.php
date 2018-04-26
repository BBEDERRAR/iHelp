<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Notification;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('activation');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'phone' => 'required|unique:users',
            'role' => 'required',
        ];


        $this->validate($request, $rules);

        $user = User::create([
            'name' => $request->get('name'),
            'password' => bcrypt($request->get('password')),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'active' => 1
        ]);



        $user->assignRole($request->get('role'));


        Session::Flash('success', __('dashboard.success'));

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);

        return view('dashboard.user.showUser')->with([
            'active'=>'user',
            'title'=>__('dashboard.profile'),
            'user'=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ];


        $this->validate($request, $rules);
        User::find($id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'identityNumber' => $request->get('identityNumber'),
            'visaNumber' => $request->get('visaNumber'),
            'phone' => $request->get('phone')
        ]);

        return Redirect::back();
    }

    /**
     * Reactivate the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request, $id)
    {
        User::find($id)->update([
            'active' => true
        ]);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->update([
            'active' => false
        ]);

        return Redirect::back();

    }


    public function profile()
    {
        return view('dashboard.user.profile')->with([
            'active' => 'profile',
            'title' => __('dashboard.profile'),
        ]);
    }


    public function changePassword(Request $request)
    {

        $rules = [
            'password' => 'required',
            'new_password' => 'required|confirmed'
        ];


        $this->validate($request, $rules);

        if (Hash::check($request->get('password'), Auth::user()->password)) {
            User::find(Auth::user()->id)->update([
                'password' => bcrypt($request->get('new_password'))
            ]);
            Session::Flash('successPassword', 'The password changed with success');
        } else {
            Session::Flash('failedPassword', 'The old password is wrong !');
        }
        return Redirect::back();
    }


    public function changeAvatar(Request $request)
    {
        $rules = [
            'img' => 'image|mimes:jpeg,jpg,png,gif|required|max:20000'
        ];

        $this->validate($request, $rules);
        if (Auth::user()->avatar != 'default-avatar.png') {
            File::Delete('avatar/' . Auth::user()->avatar);
        }
        $img = Auth::user()->id . time() . '.png';
        Image::make($request->file('img'))->save(public_path('avatar/' . $img));
        User::find(Auth::user()->id)->update(['avatar' => $img]);
        Session::Flash('responseAvatar', __('dashboard.success'));
        return Redirect::back();
    }


    public function allUsers($role)
    {
        if ($role=='all'){
            $users=User::all();
            $title=__('dashboard.users');
        }else{
            $users=User::role($role)->get();
            $r = Role::findByName($role);

            if (app()->getLocale() == 'ar') {
                $title = $r->name_ar;
            } else {
                $title = $r->name;
            }
        }



        return view('dashboard.user.allUsers')->with([
            'users' => $users,
            'title' => $title,
            'active' => $role,
            'type' => $role,
        ]);
    }

    public function addUser()
    {
        return view('dashboard.user.addUser')->with([
            'title' => __('dashboard.addUser'),
            'active' => 'users'
        ]);
    }

    public function readNotification()
    {
        foreach (auth()->user()->unreadNotifications as $not) {
            $not->markAsRead();
        }
        return Response::json([], 200);
    }

    public function activation($id,$activationCode){
        $user = User::where('id',$id)->first();
        if ($user->activationCode==$activationCode){
            $user->activationCode='';
            $user->active=1;
            $user->save();

            Auth::guard()->login($user);
            return redirect('/profile');
        }else{
            echo 'failed';
        }
    }
}
