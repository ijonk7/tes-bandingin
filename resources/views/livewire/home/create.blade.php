    <div wire:ignore.self class="modal fade" id="createModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Insert Data<div style="font-size: 12px;"><span
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
                            <!-- select -->
                            <div class="form-group row">
                                <label for="bookId" class="col-sm-2 col-form-label">Book: <span class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" wire:model="bookId">
                                        <option>--Select--</option>
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
                            <!-- select -->
                            <div class="form-group row">
                                <label for="libraryId" class="col-sm-2 col-form-label">Library: <span class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" wire:model="libraryId">
                                        <option>--Select--</option>
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
