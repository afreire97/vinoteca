<?php

namespace App\Http\Controllers;

use App\Http\Requests\WineRequest;
use App\Models\Wine;
use App\Repositories\Wine\WineRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WineController extends Controller
{
    

    public function __construct(private readonly WineRepositoryInterface $repository ) {
    
    }


    public function index()
    {
        
        $wines = $this->repository->paginate(
            relationships:['category']
        );

        return view('wine.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wine.create',[

            'wine' => $this->repository->model(),
            'action' => route('wines.store'),
            'method' => 'POST',
            'submit' => 'Crear',
            
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WineRequest $request)
    {


        try {
            $this->repository->create($request->validated());
            session()->flash('success','Vino creado');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());;
        }
        
        return redirect()->route('wines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {
        return view('wine.edit',[

            'wine' => $wine,
            'action' => route('wines.update', ['wine'=> $wine]),
            'method' => 'PUT',
            'submit' => 'Editar',
            
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WineRequest $request, Wine $wine)
    {
        try {
            $this->repository->update($request->validated(), $wine);
            session()->flash('success','Vino editado');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());;
        }
        return redirect()->route('wines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        try {

            $this->repository->delete($wine);
            session()->flash('success','El vino se ha eliminado correctamente');
        } catch (Exception $e) {

            session()->flash('error',$e->getMessage());
            
        }
        
        return redirect()->route('wines.index');
    }
}
