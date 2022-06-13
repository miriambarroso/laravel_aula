<?php

namespace App\Http\Controllers;

use App\Http\Requests\BancoRequest;
use App\Models\Banco;
use App\Models\User;

class BancoController extends Controller
{

    public $layout = 'layouts.app';

    private $objUser;
    private $objBanco;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objBanco = new Banco();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $banco = $this->objBanco->all();
        return view('banco.index', compact('banco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('banco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BancoRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BancoRequest $request)
    {
        $cadastrou = $this->objBanco->create([
            'nome' => $request->nome,
            'numero' => $request->numero,
            'ispb' => $request->ispb
        ]);
        if($cadastrou){
            return redirect('/banco/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(BancoRequest $request, $id)
    {
        $banco = $this->objBanco->find($id);
        $users = $this->objUser->all();
        return view('banco.create', compact('banco', 'users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
