<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Roles;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController {
	public function loginForm() {
		if (Auth::check()) {
			return redirect(route('dashboard'));
		}
		
		return view('users.login-form');
	}

	public function index() {
		$data['arUsers'] = User::with('userRole')->get()->toArray();

		// dd($data);

		return view('users.index', $data);
	}

	public function add() {
		$data['arRole'] = Roles::get()->pluck('name', 'id')->toArray();
		return view('users.add', $data);
	}

	public function edit(Request $request) {
		$data['user'] = User::with('userRole')->where('id', '=', $request->id)->get()->toArray();
		$data['arRole'] = Roles::get()->pluck('name', 'id')->toArray();
		return view('users.edit', $data);
	}

	public function login(Request $request) {
		if (Auth::check()) {
			return redirect(route('dashboard'));
		}

		if (Auth::attempt(array(
			'email' => $request->input('email'),
			'password' => $request->input('password'),
		), $request->input('remember'))) {
			return redirect(route('dashboard'));
		}

		return redirect()->back();
	}

	public function detail(Request $request) {
		return view('users.detail');
	}

	public function update(Request $request) {
		if (empty($request->user['id'])) {
			User::create(array(
				"name" => $request->user["name"],
				"password" => Hash::make($request->user["password"]),
				"email" => $request->user["email"],
				"role_id" => $request->user["role_id"],
			))->id;
		} else {
			$user = User::find($request->user["id"]);
			
			$user->email = $request->user["email"];
			$user->name = $request->user["name"];
			$user->role_id = $request->user["role_id"];

			$user->save();
		}

		return redirect()->route('user.index');

	}
}
