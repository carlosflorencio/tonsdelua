<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\EditProductRequest;
use App\Module;
use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Redirect;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Page::where('type', 'product')->with('modules')->orderBy('id', 'desc')->paginate(20);

        return view('admin.pages.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProductRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = Page::create([
            'type' => 'product',
            'name' => $request->input('nome')
        ]);

        Flash::success('Produto criado com sucesso!');

        return redirect(route('admin::backend.products.edit', [$product->id, '#layout']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Page::where('type', 'product')->findOrFail($id);
        $modules         = Module::where('page_id', $id)->orWhere('page_id', null)->get();

        $d = [];

        $obj       = new \stdClass;
        $obj->id   = 0;
        $obj->name = "Escolher módulo";
        $obj->used = false;
        $d[]       = $obj;

        foreach ($modules as $module) {
            $obj       = new \stdClass;
            $obj->id   = $module->id;
            $obj->name = "[" . strtoupper($module->type) . "] " . $module->description;
            $obj->used = false;
            $d[]       = $obj;
        }

        $data['modules'] = json_encode($d);


        return view('admin.pages.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditProductRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $product = Page::where('type', 'product')->findOrFail($id);
        $product->name = $request->input('nome');
        $product->save();

        Flash::success('Produto editado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('modules')->where('page_id', $id)->update([
            'page_id' => null
        ]);

        $p = Page::where('type', 'product')->findOrFail($id);
        $p->delete();

        return Redirect::back();
    }

    public function saveLayout(Request $request, $id)
    {
        $rows    = $request->input('rows');
        $decoded = json_decode($rows);

        $product         = Page::where('type', 'product')->findOrFail($id);
        $product->layout = $rows;
        $res             = $product->save();

        $modules_ids = [];
        foreach ($decoded as $row) {
            foreach ($row->cols as $col) {
                $modules_ids[] = $col->module;
            }
        }

        //desassociate already associated modules
        DB::table('modules')->where('page_id', $id)->update([
            'page_id' => null
        ]);

        //associate new modules to the page
        DB::table('modules')->whereIn('id', $modules_ids)->update([
            'page_id' => $id
        ]);

        return $res + "";
    }
}
