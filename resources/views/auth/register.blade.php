<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signup page</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <h3 class="card-header text-center">signup</h3>

                        <div class="card-body">
                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <input type="text" name="fullname" class="form-control" placeholder="Fullname" value="{{ old('fullname') }}"
                                        autofocus>
                                    @if ($errors->has('fullname'))
                                        <span class="text-danger text-left">{{ $errors->first('fullname') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="phone" name="phone" class="form-control" placeholder="phone" value="{{ old('phone') }}"
                                        autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <select name="region_id" id="region_id" class="form-control" placeholder="region">
                                        <option value="" selected disabled>region</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('region'))
                                        <span class="text-danger text-left">{{ $errors->first('region') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"
                                        autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto"></div>
                                <button type="submit" class="btn btn-primary btn-block">sign up</button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
