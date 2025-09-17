<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px;
        }
        .email-container {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        h2 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
        }
        p {
            margin: 8px 0;
            font-size: 14px;
            color: #444;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $data['message'] }}</p>

        <div class="footer">
            This message was sent via your website contact form.
        </div>
    </div>
</body>
</html>
