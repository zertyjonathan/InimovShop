<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),
            [
                'email' => ['required','exists:users,email','email'],
                'password' => ['required','string','max:20'],
                'remember'=>[]
            ],
            [
                'email.required'=>"Champs requis",
                'email.exists'=>"Ce mail n'existe pas n'existe pas",
                'email.email'=>"Saisir une email correcte",
                'password.string'=>"saisir des caractères alpha numéric",
                'password.required'=>"Champs requis",
                'password.max'=>"saisir au maximun 20 caractère"
            ]
        );

        if ($validator->fails()) {
            // Toastr::error('Echec de connexion','Connexion');
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();     
        }
        else
        {
            $credentials = $request->only('email', 'password');
            $remember= $request->has('remember')?true:false;
             if (Auth::attempt($credentials, $remember)) {
                Toastr::success('Connexion reussie','Success');
                return redirect()->intended('products');
            }
            else
            {
                Toastr::error('email ou mots de passe incorrect','Error');
                return back()->withInput();
            }
        }
       
    }
}
