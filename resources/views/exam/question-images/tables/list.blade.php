<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    Image Library
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button>
                </h4>
                <div class="table-responsive">
                    <table class="table table-centered mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center">Sl.</th>
                            <th>Image</th>
                            <th>Url</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td class="text-center" style="vertical-align: top !important; width: 50px">{{ $loop->iteration }}</td>
                                <td class=""><img style="max-width: 150px; height: auto" src="{{ asset($image->file_url) }}" alt=""></td>
                                <td class="">{{ asset($image->file_url) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>



