<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Library</th>
                                    <th>Book</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach($books as $data)
                                    @php
                                        $no++;
                                    @endphp
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $data->name }}</td>
                                        @foreach ($books2 as $item)
                                            @if ($data->pivot->book_id == $item->id)
                                                <td>{{ $item->name }}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <div class="btn-list" style="display: flex; justify-content: center; align-items: center;">
                                                <button type="button" wire:click="getBook([{{ $data->pivot->id}},{{ $data->pivot->book_id }}])" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i> Edit</button>
                                                <button type="button" onclick="deleteModal({{ $data->pivot->id }})" class="btn btn-danger mr-2"><i class="far fa-trash-alt"></i> Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

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
                    <h4 class="modal-title">Edit Data<div style="font-size: 12px;"><span
                                class="text-red"><strong> * Field wajib diisi</strong></span></div>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form class="form-horizontal" wire:submit.prevent="update">
                        <input type="hidden" wire:model="bookLibraryId">
                        <div class="card-body">
                            <!-- select -->
                            <div class="form-group row">
                                <label for="libraryId" class="col-sm-2 col-form-label">Library: <span class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" wire:model="libraryId">
                                        <option value="1">Library A</option>
                                        <option value="2">Library B</option>
                                        <option value="3">Library C</option>
                                    </select>
                                    @error('libraryId')
                                        <div class="bg-danger-transparent-2 text-danger" role="alert">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- select -->
                            <div class="form-group row">
                                <label for="bookId" class="col-sm-2 col-form-label">Book: <span class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" wire:model="bookId">
                                        <option value="2">Book A</option>
                                        <option value="19">Book B</option>
                                        <option value="10">Book C</option>
                                        <option value="15">Book D</option>
                                        <option value="26">Book E</option>
                                        <option value="20">Book F</option>
                                        <option value="5">Book G</option>
                                        <option value="13">Book H</option>
                                        <option value="9">Book I</option>
                                        <option value="14">Book J</option>
                                        <option value="25">Book K</option>
                                        <option value="8">Book L</option>
                                        <option value="22">Book M</option>
                                        <option value="4">Book N</option>
                                        <option value="17">Book O</option>
                                        <option value="7">Book P</option>
                                        <option value="12">Book Q</option>
                                        <option value="18">Book R</option>
                                        <option value="16">Book S</option>
                                        <option value="11">Book T</option>
                                        <option value="3">Book U</option>
                                        <option value="24">Book V</option>
                                        <option value="6">Book W</option>
                                        <option value="21">Book X</option>
                                        <option value="23">Book Y</option>
                                        <option value="1">Book Z</option>
                                    </select>
                                    @error('bookId')
                                        <div class="bg-danger-transparent-2 text-danger" role="alert">{{ $message }}
                                        </div>
                                    @enderror
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

        function deleteModal(bookLibraryId) {
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
                    Livewire.emit('deleteBookLibrary', bookLibraryId)
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
