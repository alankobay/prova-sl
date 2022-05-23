<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerCreateRequest;
use App\Services\CustomerCreateService;
use App\Services\CustomerListService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class FrontController extends Controller
{    
    /**
     * @return View
     */
    public function index()
    {
        return view('index')
            ->with('customers', app(CustomerListService::class)->__invoke());
    }
    
    /**
     * @return View
     */
    public function create()
    {
        return view('create');
    }
    
    /**
     * @param  CustomerCreateRequest $request
     * 
     * @return RedirectResponse
     */
    public function save(CustomerCreateRequest $request)
    {
        try {
            app(CustomerCreateService::class)->__invoke($request->merge([
                'user_name' => $request->get('userName'),
                'zip_code'  => $request->get('zipCode'),
            ])->all());
        } catch (Throwable $e) {
            return redirect()
                ->route('create')
                ->withInput($request->all())
                ->withErrors($e->getMessage());
        }

        return redirect()
            ->route('index')
            ->with('flash-success', 'Cadastro salvo com sucesso!');
    }
}
