<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;
    protected $rules= [
        'cv'=> 'required|mimes:pdf'

    ];


    public function mount(Vacante $vacante){

     $this->vacante= $vacante;
    }


    public function postularme(){
        $this->validate();


        // almacenar CV
        $datos = $this -> validate(); 
    
           $cv = $this->cv->store('public/cv');
           $datos ['cv'] = str_replace('public/cv/','',$cv);
        // crear la vacante

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv'=> $datos['cv'],

        ]);

        // crear Notificacion y enviar email
        // especificando los datos que se enviaran al constructor de notificaciones
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo,auth()->user()->id));

        
        // mostrar el usuario un mensaje Succes

        session()->flash('mensaje','Se envio correctame tu Documentacion, Si fuiste Elejido Se contactarn contigo, Mucha Suerte');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
