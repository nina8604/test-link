@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                <form action="{{ route('links.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="full_link" class="col-sm-2 col-form-label">Full link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="full_link"
                                   name="full_link" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
