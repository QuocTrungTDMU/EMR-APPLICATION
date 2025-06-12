@extends('admin.layouts.app')

@section('title', 'eCommerce Dashboard | TailAdmin')

@section('content')
<div class="p-4 mx-auto max-w-7xl md:p-6">
  <div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-7">
      <!-- Metrics Group -->
      @include('admin.partials.metric-group.metric-group-01')

      <!-- Chart One -->
      @include('admin.partials.chart.chart-01')
    </div>

    <div class="col-span-12 xl:col-span-5">
      <!-- Chart Two -->
      @include('admin.partials.chart.chart-02')
    </div>

    <div class="col-span-12">
      <!-- Chart Three -->
      @include('admin.partials.chart.chart-03')
    </div>

    <div class="col-span-12 xl:col-span-5">
      <!-- Map -->
      @include('admin.partials.map-01')
    </div>

    <div class="col-span-12 xl:col-span-7">
      <!-- Table -->
      @include('admin.partials.table.table-01')
    </div>
  </div>
</div>
@endsection