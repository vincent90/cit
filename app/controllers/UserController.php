<?php
use Illuminate\Support\MessageBag;
class UserController
    extends Controller
{
    public function loginAction()
    {
        Log::info(Input::server("REQUEST_METHOD"));

        $errors = new MessageBag();
        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }
        $data = [
            "errors" => $errors
        ];
        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "username" => "required",
                "password" => "required"
            ]);
            if ($validator->passes())
            {
                $credentials = [
                    "username" => Input::get("username"),
                    "password" => Input::get("password")
                ];
                if (Auth::attempt($credentials))
                {
                    return Redirect::route("user/profile");
                }
            }
            $data["errors"] = new MessageBag([
                "password" => [
                    "Username and/or password invalid."
                ]
            ]);
            $data["username"] = Input::get("username");
            return Redirect::route("user/login")
                ->withInput($data);
        }

        return View::make("user/login", $data);
    }

    public function requestAction()
    {
        $data = [
            "requested" => Input::old("requested")
        ];
        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "email" => "required"
            ]);
            if ($validator->passes())
            {
                $credentials = [
                    "email" => Input::get("email")
                ];
                Password::remind($credentials,
                    function($message, $user)
                    {
                        $message->from("chris@example.com");
                    }
                );
                $data["requested"] = true;
                return Redirect::route("user/request")
                    ->withInput($data);
            }
        }
        return View::make("user/request", $data);
    }

    public function resetAction()
    {
        $token = "?token=" . Input::get("token");
        $errors = new MessageBag();
        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }
        $data = [
            "token"  => $token,
            "errors" => $errors
        ];
        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "email"                 => "required|email",
                "password"              => "required|min:6",
                "password_confirmation" => "same:password",
                "token"                 => "exists:token,token"
            ]);
            if ($validator->passes())
            {
                $credentials = [
                    "email" => Input::get("email")
                ];
                Password::reset($credentials,
                    function($user, $password)
                    {
                        $user->password = Hash::make($password);
                        $user->save();
                        Auth::login($user);
                        return Redirect::route("user/profile");
                    }
                );
            }
            $data["email"] = Input::get("email");
            $data["errors"] = $validator->errors();
            return Redirect::to(URL::route("user/reset") . $token)
                ->withInput($data);
        }
        return View::make("user/reset", $data);
    }

    public function profileAction()
    {
        Log::info('dans profil');
        return View::make("user/profile");
    }

    public function logoutAction()
    {
        Auth::logout();
        return Redirect::route("user/login");
    }

    public function getInfo(){
        //charger les expenses
        $users = User::all();

        //charger la vue et envoyer les expenses
        return View::make('user/view')->with('users',$users);
    }
}