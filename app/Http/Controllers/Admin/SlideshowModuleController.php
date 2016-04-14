<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSlideshowModuleRequest;
use App\Image;
use App\Module;
use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Storage;

class SlideshowModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['modules'] = Module::slideshow()->with('page', 'images')->orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.slideshow.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['to'] = Page::lists('name', 'id')->toArray();
        $data['to'] = [0 => "Sem acção no click"] + $data['to'];

        return view('admin.pages.slideshow.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSlideshowModuleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlideshowModuleRequest $request)
    {
        $module = Module::create([
            'description' => $request->descricao,
            'type' => 'slideshow',
            'url_to' => $request->link ?: null
        ]);

        if($this->isValidImages($request) == false) {
            Flash::error("Alguma imagem inválida!");
            return back();
        }

        $this->associateImages($request, $module);

        Flash::success("Módulo criado com sucesso!");
        return redirect(route('admin::backend.modules.slideshow.index'));
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
        $data['to'] = [0 => "Sem acção no click"] + $data['to'];

        return view('admin.pages.slideshow.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = Module::findOrFail($id);
        $module->description = $request->descricao;
        $module->url_to = $request->link ?: null;
        $module->save();

        if($request->hasFile('imagem') && $this->isValidImages($request)) {
            foreach ($module->images as $image) {
                $image->delete();
            }

            $this->associateImages($request, $module);
        }

        Flash::success("Módulo editado com sucesso!");
        return redirect(route('admin::backend.modules.slideshow.index'));
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
            return redirect(route('admin::backend.modules.slideshow.index'));
        }

        $module->delete();

        Flash::success('Módulo apagado com sucesso!');
        return redirect(route('admin::backend.modules.slideshow.index'));
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    private function isValidImages($request) {
        $images = $request->file('imagem');
        $validExtensions = ['jpg', 'png', 'jpeg'];

        if(!$request->hasFile('imagem'))
            return false;

        foreach ($images as $image) {
            if(in_array($image->extension(), $validExtensions) == false)
                return false;
        }

        return true;
    }

    private function associateImages($request, $module) {
        $images = $request->file('imagem');

        foreach ($images as $image) {
            $this->associateImage($image, $module);
        }
    }

    private function associateImage($image, $module) {
        $extension = $image->getClientOriginalExtension();
        $imgPath = "slideshow/" . uniqid($module->id) . "." . $extension;
        Storage::disk('images')->put($imgPath, file_get_contents($image->getRealPath()));

        Image::create([
            'path' => $imgPath,
            'module_id' => $module->id
        ]);
    }
}
