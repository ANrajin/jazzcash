<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('checkout', $products->id) }}" method="post" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputPassword4" value="ANRajin">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" value="rajin@gmail.com">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                    value="Dhaka">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                    placeholder="Apartment, studio, or floor" value="01782044014">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="inputCity" value="karachi">
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">State</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>Pakistan</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip" value="74200">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Pay now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        In Cart
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $products->name }}</li>
                        <li class="list-group-item text-primary">{{ $products->price }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
