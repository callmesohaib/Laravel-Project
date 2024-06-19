<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">@if (session()->has('name'))
                    {{ session()->get('name') }}
                @else
                    Guest
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/customer/create') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/customer/view') }}">Customers</a>
                    </li>
                </ul>
            </div>
        </nav>




        <form action="{{ $url }}" method="POST" autocomplete="on">
            @csrf
            <h1 class="text-center">{{ $title }}</h1>

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id=""
                    @if (strpos($url, 'update') !== false) value="{{ $customer->name }}" @endif value="{{ old('name') }}"
                    class="form-control" placeholder="Name" aria-describedby="helpId">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id=""
                    @if (strpos($url, 'update') !== false) value="{{ $customer->email }}" @endif
                    value="{{ old('email') }}" class="form-control" placeholder="Email" aria-describedby="helpId">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div style="width: 300px;">
                    <select name="gender" id="gender" class="form-control">
                        <option value="M" @if (strpos($url, 'update') !== false && $customer->gender == 'M') selected @endif>Male</option>
                        <option value="F" @if (strpos($url, 'update') !== false && $customer->gender == 'F') selected @endif>Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="">DOB</label>
                <div style="width: 300px;">
                    <input type="date" name="dob" id=""
                        @if (strpos($url, 'update') !== false) value="{{ $customer->dob }}" @endif
                        value="{{ old('dob') }}" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Password"
                    aria-describedby="helpId">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="password_confirmation" id="" class="form-control"
                    placeholder="Password" aria-describedby="helpId">
                <span class="text-danger">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
