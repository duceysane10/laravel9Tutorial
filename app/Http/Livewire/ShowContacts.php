<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ShowContacts extends Component
{
    public $contact_id;
      public function deleteContact(){
        $contact_id= Contact::find($this->contact_id);
        $contact_id->delete();
        session()->flash('deleted','contact Deleted Success fully');

      }
    public function render()
    {
        $contcts = Contact::orderBy('name','ASC')->paginate(3);
        return view('livewire.show-contacts',['contacts'=>$contcts]);
    }
}
