<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        $data = Form::all();
        return view('form.index', compact('data'));
    }
    public function store( Request $request ){
        $user = auth()->user();
        $formUse = $user->form()->where('dni', $request['dni'])->first();
        if ($formUse) {
            return back()
            ->withInput([ 'dni' => $request['dni'] ])
            ->withErrors([ 'dni' => 'Ya existe un dni' ]);
        }

        $validateForm = $request -> validate([
            'dni' => 'required|digits:8|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date' => 'required|date',
            'sex' => 'required|string',
        ]);
        Form::create([
            'user_id' => $user->id,
            'dni' => $validateForm['dni'],
            'first_name' => $validateForm['first_name'] ,
            'last_name' => $validateForm['last_name'],
            'date' => $validateForm['date'],
            'sex' => $validateForm['sex'],
        ]);

        return redirect()-> route('form.index');
    }
    public function create(  ){
        return view('form.create');
    }
    public function update( Request $request, Form $form ){

    }

}
