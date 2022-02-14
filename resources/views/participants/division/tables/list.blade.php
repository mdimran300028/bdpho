<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
{{--                <h4 class="card-title mb-4">BDPhO Division List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>--}}
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Gender</th>
                            <th>Reg. no.</th>
                            <th>Mobile</th>
{{--                            <th>Email</th>--}}
                            <th>Photo</th>
{{--                            <th class="text-center">Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($participants as $participant)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $participant->name }}</td>
                            <td>{{ $participant->class_name }}</td>
                            <td>{{ $participant->gender }}</td>
                            <td>{{ $participant->reg_no }}</td>
                            <td>
                                <span class="badge badge-pill badge-soft-success font-size-12">{{ $participant->mobile }}</span>
                            </td>
{{--                            <td>{{ $participant->participant->email }}</td>--}}
                            <td>
                                <a class="image-popup-no-margins" href="{{ $participant->avatar }}">
                                    <img class="img-fluid" alt="Image" src="{{ $participant->avatar }}" width="25">
                                </a>
{{--                                <a class="image-popup-no-margins" href="{{ imagePath($participant->participant->avatar) }}">--}}
{{--                                    <img class="img-fluid" alt="Image" src="{{ imagePath($participant->participant->avatar) }}" width="25">--}}
{{--                                </a>--}}
                            </td>
{{--                            <td class="text-center">--}}
{{--                                <!-- Button trigger modal -->--}}
{{--                                <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-envelope"></i></button>--}}
{{--                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>--}}
{{--                                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>--}}
{{--                            </td>--}}
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

<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
<script src="{{ asset('assets') }}/js/pages/lightbox.init.js"></script>
