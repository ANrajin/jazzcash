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
            <div class="col-md-6 mx-auto">
                <form
                    action="https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/transectionselection/"
                    method="post">
                    @foreach (Session::get('trxData') as $key => $item)
                        <input type="hidden" name="{{ $key }}" value="{{ $item }}">
                    @endforeach

                    <button type="submit" class="btn btn-primary">Procceed</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
