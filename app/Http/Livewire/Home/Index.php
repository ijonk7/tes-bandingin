<?php

namespace App\Http\Livewire\Home;

use App\Models\Book;
use App\Models\BookLibrary;
use App\Models\Library;
use Livewire\Component;

class Index extends Component
{
    public $bookLibraryId;
    public $bookId;
    public $libraryId;

    protected $listeners = [
        'refreshTable' => '$refresh',
        'deleteBookLibrary',
    ];

    public function render()
    {
        $books2 = Book::with('libraries')->get();

        $books = $books2->flatMap->libraries->sortByDesc(function ($book, $key) {
            return $book->getOriginal('pivot_created_at');
        });

        $library = Library::all();

        return view('livewire.home.index', [
            'books' => $books,
            'books2' => $books2,
            'library' => $library
        ]);
    }

    public function getBook($id)
    {
        $book = Book::where('id', $id[1])->with('libraries')->first();
        $this->bookLibraryId = $id[0];
        $this->bookId = $book->id;
        $this->libraryId = $book->libraries[0]->id;
    }

    public function update()
    {
        if ($this->bookLibraryId) {
            $bookLibrary = BookLibrary::find($this->bookLibraryId);

            $this->validate([
                'bookId' => 'required',
                'libraryId' => 'required'
            ]);

            $result = $bookLibrary->update([
                        'book_id' => $this->bookId,
                        'library_id' => $this->libraryId
                    ]);
        }

        if ($result) {
            $this->reset(['bookLibraryId', 'bookId', 'libraryId']);
            $this->emit('closeEditModalSuccess'); // Close model to using to jquery when Success
        } else {
            $this->emit('closeEditModalFailed'); // Close model to using to jquery when Failed
        }
    }

    public function deleteBookLibrary($id)
    {
        if ($id) {
            $bookLibrary = BookLibrary::find($id);
            $result = BookLibrary::destroy($bookLibrary->id);

            if ($result) {
                $this->emit('displayAlertDeleteSuccess');
            } else {
                $this->emit('displayAlertDeleteFailed');
            }
        }
    }
}
