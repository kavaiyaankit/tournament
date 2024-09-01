<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 4</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
