@extends('master')
@section('title') Home @endsection
@section('page-title') Dashboard @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Home @endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4 text-center text-success">Welcome to {{ siteInfo('title') }}</h3>



                    @if($hasRunningEvent)
                        @php($catAPart=0)
                        @php($catBPart=0)
                        @php($catCPart=0)
                        <h4 class="text-info"><i class="fa fa-check-square"></i> {{ App\Models\BdPhO::find(runningEventId())->code }} Division wise Registration Summary</h4>
                        @php($eventTotal=0)
                        @foreach(divisions() as $division)
                            @php($divisionTotal=0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Division: {{ $division->name }}</th>
                                    <th class="text-center">No. of Participant</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(categories() as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    @php($participantCount = participantCount(runningEventId(),$division->id,$category->id))
                                    @php($divisionTotal += $participantCount)
                                    @php($eventTotal += $participantCount)

                                    @if($category->code=='A')@php($catAPart += $participantCount)
                                    @elseif($category->code=='B')@php($catBPart += $participantCount)
                                    @elseif($category->code=='C')@php($catCPart += $participantCount)
                                    @endif

                                    <td class="text-center" style="width: 150px">{{ $participantCount }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Total:</th>
                                    <th class="text-center">{{ $divisionTotal }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        @endforeach
                    @endif
                @if(runningEventId() != null)
                    <!-- end table-responsive -->

                        <h4 class="text-info"><i class="fa fa-check-square"></i> {{ App\Models\BdPhO::find(runningEventId())->code }} Registration Summary</h4>
                        <table class="table table-bordered table-striped">
                            <tr><th>Category Name</th><th class="text-center" style="width: 150px">Total Registration</th></tr>
                            <tr><td>Category A</td><td class="text-center" style="width: 150px">{{ $catAPart }}</td></tr>
                            <tr><td>Category B</td><td class="text-center" style="width: 150px">{{ $catBPart }}</td></tr>
                            <tr><td>Category C</td><td class="text-center" style="width: 150px">{{ $catCPart }}</td></tr>
                            <tr><th>Total</th><th class="text-center" style="width: 150px">{{ $eventTotal }}</th></tr>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
