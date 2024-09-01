<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 1</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tournament Bracket</h1>
        <h3 class="text-center mb-4">Add 8 Teams</h3>
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

        <!-- Form to add teams -->
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
