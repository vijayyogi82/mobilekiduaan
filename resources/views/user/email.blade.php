<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Reset Password</title>
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #343a40;
            margin: 0;
            padding: 0;
        }

        .card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }

        .btn-primary {
            background: linear-gradient(90deg, #007bff 0%, #0056b3 100%);
            border: none;
            border-radius: 8px;
            padding: 15px 30px;
            color: white !important;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            display: inline-block;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3 0%, #003d7a 100%);
            transform: translateY(-2px);
            color: white !important;
        }

        .footer {
            margin-top: 30px;
            font-size: 16px;
            color: #6c757d;
            text-align: center;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .header img {
            max-width: 180px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .content {
            padding: 30px;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 26px;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .email-container {
            max-width: 650px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="email-container mb-2">
        <div class="card p-4 mt-5">
            <div class="header">
                <img src="{{ asset('assets/web/images/logo-mobile-50.png') }}" alt="Company Logo">
            </div>
            <div class="content">
                <div class="container p-4">
                    <h1>Hello {{ $user->name }},</h1>
                    <p>
                        You requested to reset your password. To ensure your account remains secure,
                        please use the button below to set a new password:
                    </p>
                    <a href="{{ $url }}" class="btn-primary text-white">Reset Password</a>
                    <p>If you did not request this, please ignore this email or contact support.</p>
                    <p class="footer">Thanks,<br> Mobilekidukaan {{--{{ config('app.name') }}--}}</p>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>