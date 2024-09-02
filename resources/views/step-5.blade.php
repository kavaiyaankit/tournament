@extends('main')
@section('content')
<div class="container mt-5">
        <h3 class="text-center mb-4">Winner</h3>
        <div class="row">
            @foreach ($winners as $value)
                <div class="form-group col-md-12">
                    <input type="text" name="teams[]"  value="{{$value}}" class="form-control" required readonly>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{route('tournament.showTeams')}}" class="btn btn-primary">Go Back</A>
        </div>
    </div>
@endsection