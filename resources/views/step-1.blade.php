@extends('main')
@section('content')
<div class="container mt-5">
        <h1 class="text-center mb-4">Tournament Bracket</h1>
        <h3 class="text-center mb-4">Add 8 Teams</h3>
      
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tournament.saveTeams') }}" method="POST">
            @csrf
            <div class="row">
                @for ($i = 0; $i < 8; $i++)
                    <div class="form-group col-md-12">
                        <label for="team{{ $i }}">Team {{ $i + 1 }}</label>
                        <input type="text" name="teams[]" id="team{{ $i }}" class="form-control" value="{{ old('teams.' . $i) }}" required>
                    </div>
                @endfor
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection

