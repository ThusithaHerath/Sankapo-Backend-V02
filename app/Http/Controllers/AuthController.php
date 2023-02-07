<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\UserVerify;
use App\Models\PasswordResets;
use Mail;

class AuthController extends Controller
{
	public function signup(Request $request)
	{

		if (User::where('email', '=', $request->input('email'))->exists()) {
			return response()->json([
				'message' => 'Sorry, User with the provided email is already exists!',
			], 403);
		} else {
			$validated = $request->validate([
				'password' => 'required|min:8|max:12',
				'phonenumber' => 'required|max:10',
				'fullname' => 'required',
				'email' => 'required',
				'nrc' => 'required',
				'province' => 'required',
				'city' => 'required',
				'town' => 'required',
				'dob' => 'required'
			]);
			if ($validated) {
				$user = new User();
				$user->email = $request->input('email');
				$user->password = Hash::make($request->input('password'));
				$user->phonenumber = $request->input('phonenumber');
				$user->nrc = $request->input('nrc');
				$user->fullname = $request->input('fullname');
				$user->province = $request->input('province');
				$user->city = $request->input('city');
				$user->town = $request->input('town');
				$user->dob = $request->input('dob');
				$user->save();

				//create random string for remember token
				$token = Str::random(64);

				//insert remember token to userverify table
				UserVerify::create([
					'user_id' => $user->id,
					'token' => $token
				]);

				$userData = array('token' => $token, 'userData' => $user);

				//send verify email to registered user
				Mail::to($request->input('email'))->send(new VerifyEmail($userData));

				return response()->json([
					'message' => 'New user has been addedd successfully!',
					'data' => $userData
				], 200);
			} else {
				return response()->json([
					'message' => 'Error while adding user!',
				], 500);
			}
		}
	}

	public function signin(Request $request)
	{
		$validator = $request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		$user = User::where('email', $request->email)->first();

		if ($user) {
			if (Hash::check($request->password, $user->password)) {
				return response()->json([
					'user' => $user,
					'message' => 'Successfully logged in!',
					'access_token' => $user->createToken($request->email)->plainTextToken
				], 200);
			} else {
				return response()->json([
					'message' => 'Incorrect Password!',
				], 403);
			}
		} else {
			return response()->json([
				'user' => $user,
				'message' => 'User not found!',
			], 401);
		}
	}

	public function logout(Request $request)
	{
		Schema::drop('temp_adminLogin');

		// Revoke the token that was used to authenticate the current request
		$request->user()->currentAccessToken()->delete();
		//$request->user->tokens()->delete(); // use this to revoke all tokens (logout from all devices)
		return response()->json(null, 200);
	}

	public function sendPasswordResetLinkEmail(Request $request)
	{

		$validated = $request->validate([
			'email' => 'required|email|exists:users,email'
		]);

		if ($validated) {
			$token = Str::random(64);

			$passwordReset = new PasswordResets();
			$passwordReset->email = $request->input('email');
			$passwordReset->token = $token;
			// $passwordReset->created_at = Carbon::now();

			$passwordReset->save();


			$action_link = route('password.reset.form', ['token' => $token, 'email' => $request->email]);
			$body = "We are received a request to reset the password for <b>Sankapo </b> account associated with " . $request->email . ". You can reset your password by clicking the link below";

			Mail::send('notifications.email-forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
				$message->from('noreply@example.com', 'Sankapo');
				$message->to($request->email, 'Your name')
					->subject('Reset Password');
			});

			return response()->json([
				'message' => 'We have emailed your password reset link, Please check your inbox!',
			], 200);
		} else {
			return response()->json([
				'message' => 'Please check your email!',
			], 500);
		}
	}

	public function showResetForm(Request $request, $token = null)
	{
		return view('resetPasswords.resetPassword')->with(['token' => $token, 'email' => $request->email]);
	}

	public function resetPassword(Request $request)
	{

		$request->validate([
			'email' => 'required|email|exists:users,email',
			'password' => 'required|min:5|confirmed',
			'password_confirmation' => 'required',
		]);

		$check_token = PasswordResets::where('email', $request->email)->first();

		if (!$check_token) {
			return back()->withInput()->with('fail', 'Invalid token');
		} else {

			User::where(
				'email',
				$request->email
			)->update([
				'password' => Hash::make($request->password)
			]);

			PasswordResets::where([
				'email' => $request->email
			])->delete();


			return redirect()->away("https://Sankapo.com/login");
		}
	}

	public function verifiedEmail(Request $request, $msg)
	{
		return view('verifyEmail.verifiedEmail')->with('msg', $msg);
	}
}