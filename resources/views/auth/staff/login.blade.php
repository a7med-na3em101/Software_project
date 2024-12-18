            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>@yield('title')</title>
                <!-- Add any CSS links if needed -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom Styles -->
                <style>
                    body {
                        background-color: #f4f6f9;
                        font-family: 'Arial', sans-serif;
                    }

                    .card {
                        border-radius: 10px;
                        border: none;
                        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    }

                    .card-body {
                        padding: 30px;
                    }

                    .form-label {
                        font-weight: bold;
                    }

                    .form-control {
                        border-radius: 5px;
                        box-shadow: none;
                        border: 1px solid #ccc;
                        padding: 10px;
                    }

                    .form-control:focus {
                        border-color: #007bff;
                        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
                    }

                    .btn-primary {
                        background-color: #007bff;
                        border-color: #007bff;
                        padding: 10px;
                        font-size: 16px;
                        border-radius: 5px;
                    }

                    .btn-primary:hover {
                        background-color: #0056b3;
                        border-color: #004085;
                    }

                    .card .text-center {
                        color: #007bff;
                        font-weight: bold;
                    }

                    .text-center a {
                        color: #007bff;
                        text-decoration: none;
                    }

                    .text-center a:hover {
                        text-decoration: underline;
                    }

                    .container {
                        margin-top: 80px;
                    }

                    @media (max-width: 576px) {
                        .card {
                            width: 90%;
                        }
                    }
                </style>
            </head>

            <body>
                <div class="container my-5">
                    <div class="card mx-auto shadow-sm" style="max-width: 400px;">
                        <div class="card-body">
                            <h4 class="text-center mb-4">Staff Login</h4>
                            <form method="POST" action="{{ route('staff.login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" required placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required placeholder="Enter your password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                                <div style="text-align: center; margin-top: 10px;">
                                    If you don't have an account <a href="{{ route('staff.register') }}">Click here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Add JavaScript files if needed -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </body>

            </html>