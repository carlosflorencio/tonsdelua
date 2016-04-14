<?php

namespace App\Http\Controllers\Admin;

use App\Module;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function novidades() {
        $data['title'] = 'Novidades';
        $data['page'] = Page::page()->findOrFail(1);
        $data['modules'] = json_encode($this->getModulesForPage(1));
        
        return view('admin.pages.singles.edit-layout', $data);
    }

    public function tendencias() {
        $data['title'] = 'Tendencias';
        $data['page'] = Page::page()->findOrFail(2);
        $data['modules'] = json_encode($this->getModulesForPage(2));

        return view('admin.pages.singles.edit-layout', $data);
    }

    public function mulher() {
        $data['title'] = 'Mulher';
        $data['page'] = Page::page()->findOrFail(3);
        $data['modules'] = json_encode($this->getModulesForPage(3));

        return view('admin.pages.singles.edit-layout', $data);
    }

    public function homem() {
        $data['title'] = 'Homem';
        $data['page'] = Page::page()->findOrFail(4);
        $data['modules'] = json_encode($this->getModulesForPage(4));

        return view('admin.pages.singles.edit-layout', $data);
    }

    public function marcas() {
        $data['title'] = 'Marcas';
        $data['page'] = Page::page()->findOrFail(5);
        $data['modules'] = json_encode($this->getModulesForPage(5));

        return view('admin.pages.singles.edit-layout', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Save Layout
    |--------------------------------------------------------------------------
    */
    public function saveLayout(Request $request, $id)
    {
        $rows    = $request->input('rows');
        $decoded = json_decode($rows);

        $product         = Page::page()->findOrFail($id);
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

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    private function getModulesForPage($id) {
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

        return $d;
    }
}
