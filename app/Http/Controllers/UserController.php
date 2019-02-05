<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Helpers\AppResponse;
use Illuminate\Support\Facades\DB, Log;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct(AppResponse $appResponse)
    {
        $this->appResponse = $appResponse;
        $this->middleware('auth');
    }


    /**
     * @description get one employee by id
     * @param id
     * @return data user where id = $request->id
     */
    public function getOneById(Request $request)
    {   
        $data = User::find($request->id);
        if ($data) {
             return $this->appResponse->renderResponse($data, trans('messages.dataReceived'));
        }else {
             return $this->appResponse->renderResponse(null, trans('messages.dataNotFound'));
        }
    }

}


