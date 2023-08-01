<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nompescadosmarisco;

class Nompescadosmariscos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.nompescadosmariscos.view', [
            'nompescadosmariscos' => Nompescadosmarisco::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
    public function index()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.nompescadosmariscos.index', [
            'nompescadosmariscos' => Nompescadosmarisco::latest()
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

        Nompescadosmarisco::create([
			'nombre' => $this-> nombre
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Nompescadosmarisco Successfully created.');
    }

    public function edit($id)
    {
        $record = Nompescadosmarisco::findOrFail($id);
        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Nompescadosmarisco::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Nompescadosmarisco Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Nompescadosmarisco::where('id', $id)->delete();
        }
    }
}
