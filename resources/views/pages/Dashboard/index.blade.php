@extends('layouts.app')
@section('content')
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="index.html">Bracket</a>
                <span class="breadcrumb-item active">Blank Page</span>
            </nav>
        </div><!-- br-pageheader -->

        <x-page-header
            title="Dashboard"
            subtitle="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, molestiae?"
        />

        <div class="br-pagebody">

            <!-- start you own content here -->

        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
@stop
@push('footer-js')

@endpush
