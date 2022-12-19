<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Str;

class ContactForm extends Component
{
    public $name;
    public $slug;

    public function genslug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required'
        ]);
    }
    public function storeCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $contact= new Contact();
        $contact->name = $this->name;
        $contact->slug = $this->slug;
        $contact->save();
        session()->flash('message','contact added success fully');
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
