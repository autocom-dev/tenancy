<?php

namespace App\Http\Controllers\User\Cadastro\Pessoa;

use App\Http\Controllers\Controller;
use App\Models\User\Cadastro\Pessoa\Pessoa;
use App\User;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pessoas = User::all();

        return view('user.cadastro.pessoa.pessoa.index')->with('pessoas', $pessoas);
    }    
}
