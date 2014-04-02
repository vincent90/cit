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

    public function create(){
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'username'          => 'required',
            'email'             => 'required',
            'role'              => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('user/view')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = new User;
            $user->username          = Input::get('username');
            $user->email          = Input::get('email');
            $user->role             = Input::get('role');
            $user->save();

            // redirect
            Session::flash('message', 'La dépense à été ajoutée avec succès!');
            return Redirect::to('user/view');
        }
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

    public function destroy($id){
        //delete
        $user = User::find($id);
        $user->delete();

        //redirect
        return Redirect::to('user/view');

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

    public function edit($id){
        //prendre le user
        $user = User::find($id);

        //ouvrir le form de modification, et lui donner le user
        return View::make('user.edit')->with('user',$user);
    }

    public function update($id){
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'username'          => 'required',
            'email'          => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->username          = Input::get('username');
            $user->email          = Input::get('email');
            $user->save();

            // redirect
            Session::flash('message', 'L usager à été modifiée avec succès!');
            return Redirect::to('user/view');
        }
    }
}