<?php

namespace App\Http\Livewire\Home;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $employeeId;
    public $name;
    public $email;
    public $dateOfBirth;
    public $address;
    public $department;
    public $photo;
    public $tempUrl;
    public $paginate = 10;
    public $search;
    public $totalData;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    protected $listeners = [
        'refreshTable' => '$refresh',
        'deleteEmployee',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|sometimes|image',
        ]);

        try {
            $this->tempUrl = $this->photo->temporaryUrl();
        } catch (\Exception $e) {
            $this->tempUrl = null; // placeholder photo
        }
    }

    public function render()
    {
        // $query = Employee::latest();
        // $this->totalData = $query->count();
        // return view('livewire.home.index', [
        //     'employee' => $query->paginate($this->paginate)
        // ]);

        if ($this->search) {
            $query = Employee::latest()->where('name', 'like', '%' . $this->search . '%');
            $this->totalData = $query->count();
            return view('livewire.home.index', [
                'employee' => $query->paginate($this->paginate)
            ]);
        } else {
            $query = Employee::latest();
            $this->totalData = $query->count();
            return view('livewire.home.index', [
                'employee' => $query->paginate($this->paginate)
            ]);
        }
    }

    public function getEmployee($id)
    {
        $this->reset(['tempUrl']);
        $employee = Employee::find($id);
        $this->employeeId = $employee->id;
        $this->name = $employee->name;
        $this->email = $employee->email;
        $this->dateOfBirth = $employee->dateOfBirth;
        $this->address = $employee->address;
        $this->department = $employee->department;
        $this->photo = $employee->photo;
    }

    public function update()
    {
        if ($this->employeeId) {
            $employee = Employee::find($this->employeeId);

            if ($this->photo == $employee->photo) {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'dateOfBirth' => 'required|date',
                    'address' => 'nullable'
                ]);
            } else {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'dateOfBirth' => 'required|date',
                    'address' => 'nullable',
                    'department' => 'nullable|in:Finance and Accounting,Human Resources Development,Information Technology,Production,Quality Assurance',
                    'photo' => 'nullable|sometimes|image'
                ]);
            }

            $result = $employee->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'dateOfBirth' => $this->dateOfBirth,
                        'address' => $this->address,
                        'department' => $this->department,
                        'photo' => $this->photo == $employee->photo ? $this->photo : $this->photo->store('image/employee', 'public')
                    ]);
        }

        if ($result) {
            $this->reset(['employeeId', 'name', 'email', 'dateOfBirth', 'address', 'department', 'photo', 'tempUrl']);
            $this->emit('closeEditModalSuccess'); // Close model to using to jquery when Success
        } else {
            $this->emit('closeEditModalFailed'); // Close model to using to jquery when Failed
        }
    }

    public function deleteEmployee($id)
    {
        if ($id) {
            $result = Employee::destroy($id);

            if ($result) {
                $this->emit('displayAlertDeleteSuccess');
            } else {
                $this->emit('displayAlertDeleteFailed');
            }
        }
    }
}
