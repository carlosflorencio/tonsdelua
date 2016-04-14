<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Page;
use Laracasts\Flash\Flash;
use Mail;

class PagesController extends Controller
{
    public function index() {
        $data['page'] = Page::page()->with('modules')->find(1);
        $data['rows'] = json_decode($data['page']->layout);

        return view('pages.layout', $data);
    }

    public function tendencias() {
        $data['page'] = Page::page()->with('modules')->find(2);
        $data['rows'] = json_decode($data['page']->layout);

        return view('pages.layout', $data);
    }

    public function mulher() {
        $data['page'] = Page::page()->with('modules')->find(3);
        $data['rows'] = json_decode($data['page']->layout);

        return view('pages.layout', $data);
    }

    public function homem() {
        $data['page'] = Page::page()->with('modules')->find(4);
        $data['rows'] = json_decode($data['page']->layout);

        return view('pages.layout', $data);
    }

    public function marcas() {
        $data['page'] = Page::page()->with('modules')->find(5);
        $data['rows'] = json_decode($data['page']->layout);

        return view('pages.layout', $data);
    }

    public function contacto() {
        return view('pages.contact');
    }

    public function contacto_send(ContactRequest $request) {
        $admin = "carlosmflorencio@gmail.com";
        $name = $request->nome;
        $email = $request->email;
        $subject = $request->assunto;
        $message = $request->mensagem;

        Mail::send('emails.contact', ['name' => $name, 'email' => $email, 'subject' => $subject, 'msg' => $message], function ($m) use($admin) {
            $m->from('no-reply@tonsdelua.pt', 'Tons de Lua Website');

            $m->to($admin, "Tons de Lua")->subject('Novo contacto no site!');
        });

        Flash::success('Contacto enviado com sucesso!');
        return redirect('contacto');
    }

    public function product($id) {
        $data['page'] = Page::product()->with('modules')->findOrFail($id);
        $data['rows'] = json_decode($data['page']->layout);

        return view('pages.layout', $data);
    }
}
