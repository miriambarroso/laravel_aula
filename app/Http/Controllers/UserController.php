<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    private $objUser;

    /**
     * Instanciar um novo controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->objUser = new User();

//        $this->middleware('auth');
//        $this->middleware('log')->only('index');
//        $this->middleware('subscribed')->except('store');
    }

    public function index()
    {
        $users = $this->objUser->all();
        return view('user.index', compact('users'));
    }


    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {
        $user = $this->objUser->find($id);
        return view('user.create', compact('user'));
    }

    /**
     *
     * Mostrar o perfil de um determinado usuário.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $id = Auth::user()->id;
        return view('user.profile', [
            'user' => User::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = $this->objUser->find($id);
        if (isset($request->password_confirmation)) {
            if (Hash::check($request->password, $user->password)){
                $password = Hash::make($request->password_confirmation);
                User::where('id', $id)->update([
                   'password' => $password,
                    'email' => $request->email,
                    'name' => $request->name,
                ]);
            }
        } else {
            User::where('id', $id)->update([
                'email' => $request->email,
                'name' => $request->name
            ]);
        }

        return redirect('profile');
    }

    public function store(UserRequest $request)
    {
        $cadastrou = $this->objUser->create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?: 'user',
            'password' => Hash::make($request->password)
        ]);
        if($cadastrou){
            return redirect('/user/index');
        }
    }
}
