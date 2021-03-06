<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller

{  


     public function validateClient()
     {
        return  request()->validate([  
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'tel' => 'required'
        ]);
     }

    
     public function search()
     {
         return view ('clients.search'); //Livewire
     }

    public function index()
    {
        $clients = Client::orderBy('updated_at','desc')->paginate(8);
        return view ('clients.index')->with('clients',$clients);
    }
      
    public function create(Request $request)
    {
        return view('clients.create');
    }
    
    public function store()
    {       
        Client::create($this->validateClient());
        return redirect(route('clients.index'))->with('success','Klijent je uspešno unet');
    }

    public function show($id)
    {
        $client=Client::find($id);
        return view ('clients.show')->with('client',$client);
    }

    public function edit(Client $client)
    {
        // $client = Client::findOrFail($client->id); ako se ime primljene promenljive poklapa sa imenom u ruti onda se ova linija koda obavlja automatski
        return view('clients.edit')->with('client',$client);
    }
    
    public function update(Client $client)
    {
         $client->update($this->validateClient());
         return redirect(route('clients.index'))->with('success','Izmena uspešna');
    }
   
    public function destroy($id)
    {        
        $client = Client::findOrFail($id);
        if($client->orders->count()>0)
        {
        return redirect(route('clients.show',$id))->with('error','Klijent ne može biti obrisan jer postoje vezani servisni nalozi');
        }
        else
        {
        $client->delete();
        return redirect(route('clients.index'))->with('success','Klijent je obrisan');
        }
    }
}
