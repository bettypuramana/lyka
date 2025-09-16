<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 Service Unavailable</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="d-flex min-vh-100 align-items-center justify-content-center bg-light">

    <!-- Main Content Container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <!-- All styling is now done with Bootstrap classes -->
                <div class="card text-center p-4 p-sm-5 rounded-4 shadow-lg border-0">

                    <!-- Large "404" Number -->
                    <h1 class="display-1 fw-bold text-primary">500</h1>

                    <!-- Heading -->
                    <h2 class="h1 fw-bold text-dark mt-3">Site Is Temporarily Down</h2>

                    <!-- Descriptive Message -->
                    <p class="lead text-muted mt-3">
                       We're currently performing some scheduled maintenance or experiencing a temporary outage.
                        We should be back online shortly. Thanks for your patience!
                    </p>

                    <!-- "Go Home" Button -->
                    {{-- <a href="/" class="btn btn-primary mt-4 mx-auto fw-semibold rounded-pill py-2 px-4">
                        <!-- Home Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill me-2" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                        </svg>
                        Return to Homepage
                    </a> --}}

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle (needed for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

