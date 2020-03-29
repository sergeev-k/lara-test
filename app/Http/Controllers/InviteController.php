<?php

namespace App\Http\Controllers;

use App\Invite;
use App\Mail\InviteCreated;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InviteController extends Controller
{

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'project_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => 'Email no validate']);
        }
        do {
            $token = Str::random(16);
        } while (Invite::where('token', $token)->first());

        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token,
            'project_id' => $request->get('project_id')
        ]);
        Mail::to($request->get('email'))->send(new InviteCreated($invite));

        return response()->json(['data' => 'Success'], 200);
    }

    public function accept($token)
    {
        $invite = Invite::where('token', $token)->first();
        if (!$invite) {
            abort(404);
        }

//        $invite->delete();

        return redirect()->to('/sign_up');
    }
}
