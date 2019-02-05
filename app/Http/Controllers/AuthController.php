<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\Helpers\AppResponse;
use Illuminate\Support\Facades\DB, Log;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct(AppResponse $appResponse)
    {
        $this->appResponse = $appResponse;
    }

    public function register(Request $request)
    {
        $user = New User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        DB::transaction(function () use ($request, &$user) {
            $user->save();
        });
        return $this->appResponse->renderResponse($user, trans('messages.dataSaved'));
    }


    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        if (!$user) {
            return $this->appResponse->renderResponse(null, trans('messages.userNotFound'), 404);
        }
        if (Hash::check($password, $user->password)) {
            $apiToken = base64_encode(str_random(40));

            $user->update([
                'api_token' => $apiToken
            ]);
        $data = ['user' => $user, 'api_token' => $apiToken];
        return $this->appResponse->renderResponse($data, trans('messages.dataReceived'));
        }
        return $this->appResponse->renderResponse(null, trans('messages.dataNotFound'), 404);
    }
}


