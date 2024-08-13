<?php

namespace App\Http\Controllers\Wine;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct(private readonly CategoryRepositoryInterface $repository) {
    }



    public function index()
    {

        $categories = $this->repository->paginate(
            
            counts: ['wines'],
        );


        // ray($categories);


        // ray('data' . $categories[1]);

        return view('wine.category.index', [

            'categories' => $categories,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('wine.category.create', [

            'category' => $this->repository->model(),
            'action' => route('categories.store'),
            'method' => 'POST',
            'submit' => 'Crear',


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
        {


            try {
                $this->repository->create($request->validated());
                session()->flash('success','Categoría creada');
   
           } catch (Exception $e) {
               session()->flash('error', $e->getMessage());
           }


           

            return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
    
        return view('wine.category.create', [

            'category' => $category,
            'action' => route('categories.update' , ['category' => $category]),
            'method' => 'PUT',
            'submit' => 'Editar',

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        
        try {
            $this->repository->update($request->validated(), $category);
            session()->flash('success','Categoría editada');

       } catch (Exception $e) {
           session()->flash('error', $e->getMessage());
       }


        
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //



        try {
             $this->repository->delete($category);
             session()->flash('success','Categoría eliminada');

        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }

       
        return redirect()->route('categories.index');
    }
}
