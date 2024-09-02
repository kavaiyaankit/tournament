@extends('main')
@section('content')
<div class="container mt-5">
        <h3 class="text-center mb-4">4 Winning Teams</h3>
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        Form to add teams
        <form action="{{ route('tournament.stepTwoSave') }}" method="POST">
            @csrf
            <div class="row">
                @foreach ($winners as $value)
                    <div class="form-group col-md-12">
                        <input type="text" name="teams[]"  value="{{$value['name']}}" class="form-control" required readonly>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection
