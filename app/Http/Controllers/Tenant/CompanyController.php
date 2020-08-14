<?php

namespace App\Http\Controllers\Tenant;

use App\Events\Tenant\CompanyCreated;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Company;
use Illuminate\Http\Request;
use App\Http\Requests\Tenant\StoreUpdateCompanyFormRequest;

class CompanyController extends Controller
{
    private $company;

    public function __construct(Company $company)
    {
        $this->company = $company;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->company->latest()->paginate();

        return view('tenants.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenants.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCompanyFormRequest $request)
    {
        $company = $this->company->create($request->all());

        if ($request->has('create_database'))
            event(new CompanyCreated($company));

        // ** aqui considera que já existe a base e executa o migration
        // ** mas como é atualizado pelo desktop, não é necessário no momento
        //  else
        //     event(new DatabaseCreated($company));

        return redirect()
            ->route('company.index')
            ->withSuccess('Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($domain)
    {
        $company = $this->company->where('domain', $domain)->first();

        if (!$company)
            return redirect()->back();

        return view('tenants.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($domain)
    {
        // $company = $this->company->find($id);
        $company = $this->company->where('domain', $domain)->first();

        if (!$company)
            return redirect()->back();

        return view('tenants.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCompanyFormRequest $request, $id)
    {
        if (!$company = $this->company->find($id))
            return redirect()->back()->withInput();

        $company->update($request->all());

        return redirect()
            ->route('company.index')
            ->withSuccess('Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$company = $this->company->find($id))
            return redirect()->back();

        $company->delete();

        return redirect()
            ->route('company.index')
            ->withSuccess('Deletado com sucesso!');
    }
}
