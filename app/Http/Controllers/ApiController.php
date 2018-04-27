<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class ApiController extends Controller
{
    public function create(Request $request)
    {


        $data = request()->only('email','name','password');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);


        // And created user until here.

        $client = Client::where('password_client', 1)->first();

        // Is this $request the same request? I mean Request $request? Then wouldn't it mess the other $request stuff? Also how did you pass it on the $request in $proxy? Wouldn't Request::create() just create a new thing?

        $request->request->add([
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $data['email'],
            'password'      => $data['password'],
            'scope'         => null,
        ]);

        // Fire off the internal request.
        $token = Request::create(
            'oauth/token',
            'POST'
        );
        return \Route::dispatch($token);
    }

    public function accessToken(Request $request)

    {

        $validate = $this->validations($request, "login");

        if ($validate["error"]) {
            return $this->prepareResult(false, [], $validate['errors'], "Error while validating user");
        }

        $user = User::where("email", $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return $this->prepareResult(true, ["accessToken" => $user->createToken('Todo App')->accessToken], [], "User Verified");
            } else {
                return $this->prepareResult(false, [], ["password" => "Wrong passowrd"], "Password not matched");
            }
        } else {
            return $this->prepareResult(false, [], ["email" => "Unable to find user"], "User not found");
        }


    }

    /**
     * Get a validator for an incoming Todo request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  $type
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function validations($request, $type)
    {

        $errors = [];

        $error = false;

        if ($type == "login") {

            $validator = Validator::make($request->all(), [

                'email' => 'required|email|max:255',

                'password' => 'required',

            ]);

            if ($validator->fails()) {

                $error = true;

                $errors = $validator->errors();

            }

        } elseif ($type == "create todo") {

            $validator = Validator::make($request->all(), [
                'todo' => 'required',
                'description' => 'required',
                'category' => 'required'

            ]);

            if ($validator->fails()) {
                $error = true;
                $errors = $validator->errors();
            }

        } elseif ($type == "update todo") {

            $validator = Validator::make($request->all(), [
                'todo' => 'filled',
                'description' => 'filled',
                'category' => 'filled'
            ]);

            if ($validator->fails()) {
                $error = true;
                $errors = $validator->errors();

            }
        }
        return ["error" => $error, "errors" => $errors];
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    private function prepareResult($status, $data, $errors, $msg)

    {
        return ['status' => $status, 'data' => $data, 'message' => $msg, 'errors' => $errors];
    }


}
