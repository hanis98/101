@extends('layouts.app')

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    {!! $progress_chart->script() !!}
    @if(!empty($approval_chart))
        {!! $approval_chart->script() !!}
    @endif
    @if(!empty($authorize_chart))
        {!! $authorize_chart->script() !!}
    @endif
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    {!! $progress_chart->container() !!}
                </div>
            </div>
        </div>
        @can('can approve')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        @if(!empty($approval_chart))
                            {!! $approval_chart->container() !!}
                        @else
                            <p class="alert alert-info text-center">Tiada Maklumat Permohonan Kelulusan</p>
                        @endif
                    </div>
                </div>
            </div>
        @endcan
        @can('can authorize')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        @if(!empty($authorize_chart))
                            {!! $authorize_chart->container() !!}
                        @else
                            <p class="alert alert-info text-center">Tiada Maklumat Permohonan Pelepasan</p>
                        @endif
                    </div>
                </div>
            </div>
        @endcan
    </div>
</div>
@endsection