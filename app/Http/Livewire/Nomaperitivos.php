<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nomaperitivo;

class Nomaperitivos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.nomaperitivos.view', [
            'nomaperitivos' => Nomaperitivo::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
    public function index()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.nomaperitivos.index', [
            'nomaperitivos' => Nomaperitivo::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->nombre = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        Nomaperitivo::create([
			'nombre' => $this-> nombre
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Nomaperitivo Successfully created.');
    }

    public function edit($id)
    {
        $record = Nomaperitivo::findOrFail($id);
        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Nomaperitivo::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Nomaperitivo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Nomaperitivo::where('id', $id)->delete();
        }
    }
}
