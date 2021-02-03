    <div wire:ignore.self class="modal fade" id="createModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Insert Data Employee<div style="font-size: 12px;"><span
                                class="text-red"><strong> * Field wajib diisi</strong></span></div>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form class="form-horizontal" wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Full Name: <span
                                        class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" wire:model="name"
                                        class="form-control @error('name') is-invalid state-invalid @enderror"
                                        id="idCreateName" placeholder="Name">
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
                                        id="idCreateEmail" placeholder="Email">
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
                                        id="idCreateDateOfBirth">
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
                                    <input type="text" wire:model="address" class="form-control" id="idCreateAddress"
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
                                    <select class="custom-select" id="idCreateDepartment" wire:model="department">
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
