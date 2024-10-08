<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Registration Email</title>
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
                <img src="{{ asset('assets/web/images/logo-mobile-50.png') }}" alt="Logo">
            </div>

            <div class="content">
                <div class="container p-4">
                    <div id="banner" class="my-2">
                        <img src="{{ asset('assets/web/images/banner_1.png') }}" alt="banner">
                    </div>
                    <h1>Hello {{ $user->name ?? '' }},</h1>
                    <div>
                        <p class="mb-2">
                            हमें खुशी है कि आप मोबाइल की दुकान - नेक्स्ट जेनरेशन शॉपिंग सॉल्यूशंस में शामिल हुए।मोबाइल
                            की दुकान में हम स्थानीय विक्रेताओं और ग्राहकों के बीच अंतर को कम करते हैं |
                            <br>
                            खरीदारों और विक्रेताओं का एक जीवंत समुदाय बनाते हैं। सर्वोत्तम हाइपरलोकल
                            लिस्टिंग विकल्प का लाभ का आनंद लें |
                            <br>
                            उत्पाद सूचीकरण, लॉगिन और ऑनबोर्डिंग के लिए, लिंक पर क्लिक करें या हमसे संपर्क करें।
                        </p>
                        <p class="mb-2 mt-4">
                            We're glad to have you join Mobile Ki Dukaan - Next Generation Shopping Solutions.
                            <br>
                            We We at Mobile Ki Dukaan create a vibrant community of buyers and
                            sellers by bridging the gap between local vendors and customers.
                            beneficiated the finest hyperlocal listing options.
                        </p>
                        <p class="mb-2">
                            For product listing, login, and onboarding, click the links or contact us.
                        </p>
                    </div>

                    <div class="mt-4">
                        <a class="btn btn-danger btn-block" href="https://youtu.be/-anVTp1OkdM?feature=shared">
                            Click for product listing, login and onboarding video
                        </a> <br>
                        <a class="btn btn-danger btn-block" href="tel:7014878974">
                            Contact us
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer mt-4">
                <p>If you did not request this, please ignore this email or contact support.</p>
                <p class="footer">Thanks,<br> Mobilekidukaan {{--{{ config('app.name') }}--}}</p>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>

</html>