<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateYoutubeModuleRequest;
use App\Http\Requests\Admin\EditYoutubeModuleRequest;
use App\Module;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class YoutubeModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['modules'] = Module::youtube()->with('page', 'images')->orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.youtube.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.youtube.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateYoutubeModuleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateYoutubeModuleRequest $request)
    {
        $id = $this->getYoutubeVideoId($request->video);
        if(!$id) {
            Flash::error("Link youtube inválido!");
            return back()->withInput();
        }

        $module = Module::create([
            'description' => $request->descricao,
            'youtube' => $id,
            'type' => 'youtube'
        ]);

        Flash::success("Módulo criado com sucesso!");
        return redirect(route('admin::backend.modules.youtube.index'));
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

        return view('admin.pages.youtube.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditYoutubeModuleRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditYoutubeModuleRequest $request, $id)
    {
        $module = Module::findOrFail($id);

        $id = $this->getYoutubeVideoId($request->video);
        if(!$id) {
            Flash::error("Link youtube inválido!");
            return back()->withInput();
        }

        $module->description = $request->descricao;
        $module->youtube = $id;
        $module->save();

        Flash::success("Módulo editado com sucesso!");
        return redirect(route('admin::backend.modules.youtube.index'));
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
            return redirect(route('admin::backend.modules.youtube.index'));
        }

        $module->delete();

        Flash::success('Módulo apagado com sucesso!');
        return redirect(route('admin::backend.modules.youtube.index'));
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    private function getYoutubeVideoId($url)
    {
        $regex_pattern = "/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/";
        $match;

        if(preg_match($regex_pattern, $url, $match)){
            return $match[4];
        }else{
            return false;
        }
    }
}
