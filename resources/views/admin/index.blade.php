@extends('layout.dashboard.app')

@section('body')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Content Row -->
    <livewire:admin.stastistis />

    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="card-body shadow col-6">
        <div class="card-body">
                <h1>{{ $chart1->options['chart_title'] }}</h1>
                {!! $chart1->renderHtml() !!}
            </div>
        </div>
    </div>

    <br>

    <!-- Content Row -->
    <livewire:admin.last-posts-or-comment />
</div>
<!-- /.container-fluid -->
@endsection

@push('js')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endpush
 
    
 