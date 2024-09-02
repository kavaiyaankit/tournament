@extends('main')
@section('content')
<div class="container mt-5">
        <h3 class="text-center mb-4"> 2 Winning Teams</h3>
        <form action="{{ route('tournament.stepFourSave') }}" method="POST">
            @csrf
            <div class="row">
                @php 
                    $i = 0;
                @endphp
                @foreach ($winners as $value)
                    <div class="form-group col-md-12">
                        <input type="text" name="teams[]"  value="{{$value}}" class="form-control" required readonly>
                    </div>
                    @php 
                        $i++;
                    @endphp
                @endforeach
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection
