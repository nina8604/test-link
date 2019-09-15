@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="http://localhost/{{ $short_link }}">http://localhost/{{ $short_link }}</a>
            </div>
        </div>
    </div>
@endsection
