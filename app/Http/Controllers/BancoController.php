<?php

namespace App\Http\Controllers;

use App\Http\Requests\BancoRequest;
use App\Models\Banco;
use App\Models\User;

class BancoController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banco = $this->objBanco->all();
        return view('index', compact('banco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BancoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BancoRequest $request)
    {
        $cadastrou = $this->objBanco->create([
            'nome' => $request->nome,
            'numero' => $request->numero,
            'ispb' => $request->ispb
        ]);
        if($cadastrou){
            return redirect('banco');
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
        $banco = $this->objBanco->find($id);
        $users = $this->objUser->all();
        return view('create', compact('banco', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BancoRequest $request, $id)
    {
        //
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
