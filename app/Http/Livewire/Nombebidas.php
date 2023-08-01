<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nombebida;

class Nombebidas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.nombebidas.view', [
            'nombebidas' => Nombebida::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
    public function index()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.nombebidas.index', [
            'nombebidas' => Nombebida::latest()
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

        Nombebida::create([
			'nombre' => $this-> nombre
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Nombebida Successfully created.');
    }

    public function edit($id)
    {
        $record = Nombebida::findOrFail($id);
        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Nombebida::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Nombebida Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Nombebida::where('id', $id)->delete();
        }
    }
}
