<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateImageModuleRequest;
use App\Http\Requests\Admin\EditImageModuleRequest;
use App\Image;
use App\Module;
use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Storage;

class ImageModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['modules'] = Module::imagem()->with('page', 'images')->orderBy('id', 'desc')->paginate(10);
        
        return view('admin.pages.image.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['to'] = Page::lists('name', 'id')->toArray();
        array_unshift($data['to'], "Sem acção no click");

        return view('admin.pages.image.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateImageModuleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateImageModuleRequest $request)
    {
        $module = Module::create([
           'description' => $request->descricao,
           'type' => 'imagem',
           'caption' => $request->legenda,
           'url_to' => $request->link ?: null
        ]);

        $this->associateImage($request, $module);

        Flash::success("Módulo criado com sucesso!");
        return redirect(route('admin::backend.modules.image.index'));
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
        $data['module'] = Module::findOrFail($id);
        $data['to'] = Page::lists('name', 'id')->toArray();
        array_unshift($data['to'], "Sem acção no click");

        return view('admin.pages.image.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditImageModuleRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditImageModuleRequest $request, $id)
    {
        $module = Module::findOrFail($id);
        $module->description = $request->descricao;
        $module->caption = $request->legenda;
        $module->url_to = $request->link ?: null;
        $module->save();

        if($request->hasFile('imagem')) {
            $module->images[0]->delete();

            $this->associateImage($request, $module);
        }

        Flash::success("Módulo editado com sucesso!");
        return redirect(route('admin::backend.modules.image.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::findOrFail($id);

        if($module->page_id) {
            Flash::error('O módulo está associado a um layout. Tem de desassociar primeiro!');
            return redirect(route('admin::backend.modules.image.index'));
        }

        $module->delete();

        Flash::success('Módulo apagado com sucesso!');
        return redirect(route('admin::backend.modules.image.index'));
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    private function associateImage($request, $module) {
        $extension = $request->file('imagem')->getClientOriginalExtension();
        $imgPath = "images/" . uniqid($module->id) . "." . $extension;
        Storage::disk('images')->put($imgPath, file_get_contents($request->file('imagem')->getRealPath()));

        Image::create([
            'path' => $imgPath,
            'module_id' => $module->id
        ]);
    }
}
