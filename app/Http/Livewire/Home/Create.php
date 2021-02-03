<?php

namespace App\Http\Livewire\Home;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $dateOfBirth;
    public $address;
    public $department;
    public $photo;
    public $tempUrl;

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
        return view('livewire.home.create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dateOfBirth' => 'required|date',
            'address' => 'nullable',
            'department' => 'nullable|in:Finance and Accounting,Human Resources Development,Information Technology,Production,Quality Assurance',
            'photo' => 'nullable|sometimes|image'
        ]);

        $imageToShow = $this->photo ?? null;

        $employee = new Employee();
        $employee->name = $this->name;
        $employee->email = $this->email;
        $employee->dateOfBirth = $this->dateOfBirth;
        $employee->address = $this->address;
        $employee->department = $this->department;
        $employee->photo = $this->photo ? $this->photo->store('image/employee', 'public') : $imageToShow;
        $employee->save();

        if ($employee) {
            $this->reset(['name', 'email', 'dateOfBirth', 'address', 'department', 'photo', 'tempUrl']);
            $this->emit('closeCreateModalSuccess'); // Close model to using to jquery when Success
            $this->emit('refreshTable');
        } else {
            $this->emit('closeCreateModalFailed'); // Close model to using to jquery when Failed
            $this->emit('refreshTable');
        }
    }
}
