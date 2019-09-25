@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form" action="{{route('links.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="full_link" class="col-sm-2 col-form-label">Full link</label>
                        <div data-container="full_link" class="col-sm-10">
                            <input type="text" class="form-control" id="full_link" name="full_link">
                            <div class="help-block"></div>
                            <div class="response"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input id="submit" type="submit" value="Create" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
