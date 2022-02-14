<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
{{--                <h4 class="card-title mb-4">BDPhO Division List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>--}}
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Property</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Type</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($siteInfos as $siteInfo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siteInfo->property }}</td>
                                <td>{{ $siteInfo->name }}</td>
                                <td>{{ $siteInfo->value }}</td>
                                <td>
                                    @if($siteInfo->type=='file')
                                        <a target="_blank" href="{{ $siteInfo->value }}">{{ $siteInfo->type }}</a>
                                    @else
                                        {{ $siteInfo->type }}
                                    @endif
                                </td>
                                <td class="text-center"><button class="btn btn-sm btn-primary" onclick="edit({{ $siteInfo }})"><i class="fa fa-edit"></i></button></td>
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
