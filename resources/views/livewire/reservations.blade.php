<div>
    <div class="container-fluid">
        <div class="row g-2">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <h3 class="text-center fw-bold">
                    <x-feathericon-menu/>
                    Current Guidelines
                </h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 d-flex justify-content-center align-items-center">
                <button class="btn btn-success btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#store" wire:click="set">
                    <x-feathericon-plus-circle/>
                    Create New Guideline
                </button>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <span class="input-group mb-2">
                    <span class="input-group-text fw-bold">
                        <x-feathericon-search/>
                        <span class="text-nowrap">Search Guideline</span>
                    </span>
                    <input type="text" class="form-control" wire:model="search">
                </span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th class="text-nowrap">Title</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">Content</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $r)
                    <tr>
                        <td class="fw-bold">{{ $r->reservation_id }}</td>
                        <td class="text-capitalize">{{ $r->name }}</td>
                        <td>{{ ucfirst($r->event) }}</td>
                        <td>{{ $r->venue }}</td>
                        <td class="d-flex justify-content-evenly">
                            <button class="btn btn-primary btn-sm fw-bold text-nowrap" data-bs-toggle="modal" data-bs-target="#store" wire:click="set({{$r->reservation_id}})">
                                <x-feathericon-edit/>
                                View or Edit
                            </button>
                            <button class="btn btn-danger btn-sm fw-bold text-nowrap" data-bs-toggle="modal" data-bs-target="#delete" wire:click="set({{$r->reservation_id}})">
                                <x-feathericon-trash-2/>
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Store -->
    <div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="store" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 bg-dark bg-gradient text-white">
                    <h5 class="modal-title fw-bold">
                        <x-feathericon-calendar/>
                        Guideline
                    </h5>
                    <button type="button" class="btn btn-sm" data-bs-dismiss="modal" aria-label="Close">
                        <x-feathericon-x class="text-white"/>
                    </button>
                </div>
                <div class="modal-body border-0 @if (session()->has('success')) bg-success bg-gradient @endif">
                    <div class="container-fluid">
                        @if (session()->has('success'))
                        <div class="bg-success text-white p-2 fw-bold">
                            <x-feathericon-check/>
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <div class="input-group mt-2">
                            <span class="input-group-text fw-bold">
                                <span class="text-danger">*</span>
                                Title of Guideline
                            </span>
                            <input type="text" class="text-capitalize form-control" placeholder="Wearing of Facemask at all times." name="name" wire:model="name">
                        </div>
                        @error('name')
                        <span class="p-1 mb-5 small w-100 text-danger">{{ $message }}</span>
                        @enderror

                        <div class="input-group mt-2">
                            <span class="input-group-text fw-bold">
                                <span class="text-danger">*</span>
                                Short Description
                            </span>
                            <input type="text" class="form-control" placeholder="Ex: This is about on how to wear your facemask properly." wire:model="event">
                        </div>
                        @error('event')
                        <span class="p-1 mb-5 small w-100 text-danger">{{ $message }}</span>
                        @enderror

                        <textarea class="form-control mt-2" placeholder="Main Content Guideline..." rows="4" wire:model="venue"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" wire:click="store">
                        <x-feathericon-save/>
                        Save Record
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 bg-danger bg-gradient text-white">
                    <h5 class="modal-title fw-bold">
                        <x-feathericon-trash-2/>
                        Delete Guideline?
                    </h5>
                    <button type="button" class="btn btn-sm" data-bs-dismiss="modal" aria-label="Close">
                        <x-feathericon-x class="text-white"/>
                    </button>
                </div>
                <div class="modal-body border-0">
                    <div class="container-fluid">
                        <label>Title</label>
                        <input type="text" class="text-capitalize form-control mb-3 fw-bold" disabled  name="name" wire:model="name">

                        <label>Description</label>
                        <input type="text" class="form-control mb-3 fw-bold" disabled wire:model="event">
                    </div>
                </div>
                <div class="modal-footer">
                    @if (session()->has('deleted'))
                        <div class="bg-success text-white p-2 fw-bold">
                            <x-feathericon-check/>
                            {{ session()->get('deleted') }}
                        </div>
                    @else
                    <span class="small fw-bold">Are you sure to delete this record and all related data?</span>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#store" wire:click="set({{ $reservation_id }})">
                        <x-feathericon-edit/>
                        Edit Instead
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="#delete">
                        <x-feathericon-x/>
                        Cancel
                    </button>
                    <button type="button" class="btn btn-success" wire:click="delete({{ $reservation_id }})">
                        <x-feathericon-trash-2/>
                        Yes
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
