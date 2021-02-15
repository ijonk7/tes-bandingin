<?php

namespace App\Http\Livewire\Home;

use App\Models\BookLibrary;
use Livewire\Component;

class Create extends Component
{
    public $bookId;
    public $libraryId;

    public function render()
    {
        return view('livewire.home.create');
    }

    public function store()
    {
        $this->validate([
            'bookId' => 'required',
            'libraryId' => 'required'
        ]);

        $bookLibrary = new BookLibrary();
        $bookLibrary->book_id = $this->bookId;
        $bookLibrary->library_id = $this->libraryId;
        $bookLibrary->save();

        if ($bookLibrary) {
            $this->reset(['bookId', 'libraryId']);
            $this->emit('closeCreateModalSuccess'); // Close model to using to jquery when Success
            $this->emit('refreshTable');
        } else {
            $this->emit('closeCreateModalFailed'); // Close model to using to jquery when Failed
            $this->emit('refreshTable');
        }
    }
}
