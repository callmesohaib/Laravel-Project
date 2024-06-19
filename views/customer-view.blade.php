<!doctype html>
<html lang="en">

<head>
    <title>Customers Data</title>
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
            <a class="navbar-brand" href="#">
                @if (session()->has('name'))
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
                    <li>
                        <a href="{{ url('/customer/trash') }}">
                            <button type="button" class="btn btn-danger">Trash View</button>
                        </a>
                    </li>
                    <form action="">
                        <div class="d-flex">
                            <div class="form-group mx-2">
                                <input type="search" name="search" value="{{ $search }}" id=""
                                    class="form-control" placeholder="Search" aria-describedby="helpId">
                                </div>
                                <button type="submit" class="btn btn-primary" style="height: 40px;">Search</button>
                                <a href="{{url('customer/view')}}">
                                    <button type="button" class="btn btn-danger mx-2" style="height: 40px;">Reset</button>
                                </a>

                        </div>
                    </form>
                </ul>
            </div>
        </nav>


        <div class="container text-center">
            <h1>Customers Data</h1>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $cus)
                    <tr>
                        <td>{{ $cus->name }}</td>
                        <td>{{ $cus->email }}</td>
                        <td>
                            @if ($cus->gender == 'M')
                                Male
                            @else
                                Female
                            @endif
                        </td>
                        {{-- by using helper.php --}}
                        {{-- <td>{{ get_format_date($cus->dob,'M-d-Y') }}</td> --}}

                        {{-- by using Acessor function --}}
                        <td>{{ $cus->dob }}</td>
                        <td>
                            @if ($cus->status == 1)
                                <button class="btn btn-success">Active</button>
                            @else
                                <button class="btn btn-danger">Inactive</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('customer.delete', ['id' => $cus->customer_id]) }}">
                                <button class="btn btn-danger">Trash</button>
                            </a>
                            <a href="{{ route('customer.edit', ['id' => $cus->customer_id]) }}">
                                <button class="btn btn-primary">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="row">
            {{$customer->links()}}
        </div> --}}
    </div>
</body>

</html>
