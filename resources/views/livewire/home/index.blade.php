<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <select wire:model="paginate" class="form-control form-control-md w-auto">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="col">
                                <input wire:model="search" type="text" class="form-control form-control-md" placeholder="Search by name">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Date of birth</th>
                                    <th>Address</th>
                                    <th>Department</th>
                                    <th>Photo</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach($employee as $data)
                                    @php
                                        $no++;
                                    @endphp
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ date("d F Y", strtotime($data->dateOfBirth)) }}
                                        </td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->department }}</td>
                                        <td><img src="{{ $data->photo !== null ? asset('storage/' . $data->photo) : asset('storage/image/employee/no-image-available.png') }}"
                                                width="100" height="100"></td>
                                        <td>
                                            <div class="btn-list" style="display: flex; justify-content: center; align-items: center;">
                                                <button type="button" wire:click="getEmployee({{ $data->id }})" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i> Edit</button>
                                                <button type="button" onclick="deleteModal({{ $data->id }})" class="btn btn-danger mr-2"><i class="far fa-trash-alt"></i> Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                        {{ $employee->links() }}

                        @if($totalData)
                            <div>Showing 1 to {{ $employee->count() }} of {{ $totalData }} entries</div>
                        @else
                            <div>Showing 0 to {{ $employee->count() }} of {{ $totalData }} entries</div>
                        @endif

                        <br>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <div wire:ignore.self class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Employee<div style="font-size: 12px;"><span
                                class="text-red"><strong> * Field wajib diisi</strong></span></div>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">
                        <input type="hidden" wire:model="employeeId">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Full Name: <span
                                        class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" wire:model="name"
                                        class="form-control @error('name') is-invalid state-invalid @enderror"
                                        id="idEditName" placeholder="Name">
                                    @error('name')
                                        <div class="bg-danger-transparent-2 text-danger" role="alert">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email: <span
                                        class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" wire:model="email"
                                        class="form-control @error('email') is-invalid state-invalid @enderror"
                                        id="idEditEmail" placeholder="Email">
                                    @error('email')
                                        <div class="bg-danger-transparent-2 text-danger" role="alert">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateOfBirth" class="col-sm-2 col-form-label">Date of birth: <span
                                        class="text-red">*</span></label>
                                <div class="col-sm-3">
                                    <input type="date" wire:model="dateOfBirth"
                                        class="form-control @error('dateOfBirth') is-invalid state-invalid @enderror"
                                        id="idEditDateOfBirth">
                                    @error('dateOfBirth')
                                        <div class="bg-danger-transparent-2 text-danger" role="alert">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-7">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address:</label>
                                <div class="col-sm-10">
                                    <input type="text" wire:model="address" class="form-control" id="idEditAddress"
                                        placeholder="Address">
                                    @error('address')
                                        <div class="bg-danger-transparent-2 text-danger" role="alert">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- select -->
                            <div class="form-group row">
                                <label for="department" class="col-sm-2 col-form-label">Department: </label>
                                <div class="col-sm-10">
                                    <select class="custom-select" id="idEditDepartment" wire:model="department">
                                        <option>--Select--</option>
                                        <option value="Finance and Accounting">Finance and Accounting</option>
                                        <option value="Human Resources Development">Human Resources Development</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Production">Production</option>
                                        <option value="Quality Assurance">Quality Assurance</option>
                                    </select>
                                    @error('department')
                                        <div class="bg-danger-transparent-2 text-danger" role="alert">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-label">Photo:</label>
                                <div class="col-sm-10">
                                    @if($tempUrl)
                                        @if($errors->first('photo'))
                                            <div class="mb-2"></div>
                                        @else
                                            <div class="mb-2">
                                                <img src="{{ $tempUrl }}" width="100" height="100">
                                            </div>
                                        @endif
                                    @elseif($photo)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/'.$photo) }}" width="100"
                                                height="100">
                                        </div>
                                    @endif
                                    <input type="file" wire:model="photo"
                                        class="form-control @error('photo') is-invalid state-invalid @enderror">
                                    @error('photo')
                                        <div class="bg-danger-transparent-2 text-danger" role="alert">{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="progress" style="margin-top: 5px;">
                                        <div wire:loading wire:target="photo"
                                            class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                            role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 100%">
                                            <span style="line-height: 20px; font-size: 14px;">Uploading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @section('js')
    <!-- bs-custom-file-input -->
    <script
        src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        Livewire.on('closeCreateModalSuccess', () => {
            $('#createModal').modal('hide');
            Swal.fire(
                'Success!',
                'Your data has been insert.',
                'success'
            )
        });

        Livewire.on('closeCreateModalFailed', () => {
            $('#createModal').modal('hide');
            Swal.fire(
                'Oops...!',
                'Insert data Failed!',
                'error'
            )
        });

        Livewire.on('closeEditModalSuccess', () => {
            $('#editModal').modal('hide');
            Swal.fire(
                'Success!',
                'Your data has been update.',
                'success'
            )
        });

        Livewire.on('closeEditModalFailed', () => {
            $('#editModal').modal('hide');
            Swal.fire(
                'Oops...!',
                'Edit data failed!',
                'error'
            )
        });

        function deleteModal(employeeId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteEmployee', employeeId)
                }
            })
        }

        Livewire.on('displayAlertDeleteSuccess', () => {
            Swal.fire(
                'Success!',
                'Your data has been deleted.',
                'success'
            )
        });

        Livewire.on('displayAlertDeleteFailed', () => {
            Swal.fire(
                'Oops...!',
                'Delete data failed!',
                'error'
            )
        });

    </script>
    @endsection
</div>
