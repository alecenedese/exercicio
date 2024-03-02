<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
{
       
        $this->middleware('auth')->only(['store','update','edit','create']);
}

    public function index()
    {
        $contacts = Contacts::all();
  
        return view('contacts.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $contactss = new contacts();
    $contactss->name = $request->input('name');
    $contactss->email = $request->input('email');
    $contactss->contato = $request->input('contato');
    

    $verUser = Contacts::whereEmail($contactss->email)
    ->count();
    $contacts = contacts::all();

    if ($verUser > 0) {
        
    
        return view('contacts.index')->with('contacts', $contacts)
        ->with('msg', 'E-mail ja cadastrado, Refaça o Cadastro'); 

    } else {
 
        $contactss->save();
        

        return view('contacts.index')->with('contacts', $contacts)
            ->with('msg', 'Contato cadastrado com sucesso!');  

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = Contacts::find($id);
      
        if ($contacts) {
            return view('contacts.show')->with('contacts', $contacts);
        } else {
         
            return view('contacts.show')->with('msg', 'Contato não encontrado!');

        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contacts::find($id);
  
        if ($contacts) {
            return view('contacts.edit')->with('contacts', $contacts);
        } else {
        
            $contacts = Contacts::all();            
            return view('contacts.index')->with('contacts', $contacts)
                ->with('msg', 'Contato não encontrado!');
        }
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
        $contacts = Contacts::find($id);

        $contacts->name = $request->input('name');
        $contacts->email = $request->input('email');
        $contacts->contato = $request->input('contato');
      
        $contacts->save();
    
        $contacts = Contacts::all();
        return view('contacts.index')->with('contacts', $contacts)
            ->with('msg', 'Contato atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts = Contacts::find($id);

        $contacts->delete();
       
        $contacts = Contacts::all();
        return view('contacts.index')->with('contacts', $contacts)
            ->with('msg', "Contato excluído com sucesso!");
    }
}
