<div>
    <div class="container mt-5 bg-white p-2">
        <div class="row g-2">
            <div class="col-12">
                <h3 class="text-center fw-bold">
                    <x-feathericon-menu/>
                    Current Guidelines
                </h3>
            </div>
            <div class="col-12">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $r)
                    <tr>
                        <td class="fw-bold">{{ $r->reservation_id }}</td>
                        <td class="text-capitalize">{{ $r->name }}</td>
                        <td>{{ ucfirst($r->event) }}</td>
                        <td>{{ $r->venue }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
