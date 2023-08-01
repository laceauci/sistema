<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nomcarne;

class Nomcarnes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.nomcarnes.view', [
            'nomcarnes' => Nomcarne::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
    public function index()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.nomcarnes.index', [
            'nomcarnes' => Nomcarne::latest()
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

        Nomcarne::create([
			'nombre' => $this-> nombre
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Nomcarne Successfully created.');
    }

    public function edit($id)
    {
        $record = Nomcarne::findOrFail($id);
        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Nomcarne::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Nomcarne Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Nomcarne::where('id', $id)->delete();
        }
    }
}
