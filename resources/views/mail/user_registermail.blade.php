<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        /* General styling for email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Header Styling */
        .header {
            background-color: #004080;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .header img {
            max-width: 120px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Email Body Styling */
        .email-body {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
        }
        .email-body h2 {
            color: #004080;
            margin-top: 0;
        }
        .email-body p {
            margin: 10px 0;
        }

        /* Call to Action Button */
        .cta-button {
            display: inline-block;
            background-color: #004080;
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
        }
        .cta-button:hover {
            background-color: #003366;
        }

        /* Footer Styling */
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777777;
        }
        .footer a {
            color: #004080;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        
        <!-- Header Section -->
        <div class="header">
            <img src="https://www.examcentrelondon.co.uk/uploads/logo/logo_1662996021.png" alt="ECL Logo">
            <h1>Exam Centre London</h1>
        </div>
        
        <!-- Body Section -->
        <div class="email-body">
            <h2>Dear Candidate,</h2>
            <p>Thank you for registering with <strong>Exam Centre London</strong>. Your verification code is:</p>
            
            <h3 style="text-align: center; color: #004080; border:1px solid">{{ $code }}</h3>

            <p>Please enter this verification code to complete your exam booking.</p>

            <p>If you didn’t request to register with <strong>Exam Centre London</strong>, please disregard this email.</p>

            <p>If you have any queries, please do not hesitate to contact us. We are more than happy to assist!</p>
        </div>
        
        <!-- Footer Section -->
        <div class="footer">
            <p>📞 Phone: 0208 616 2526</p>
            <p>📧 Email: <a href="mailto:info@examcentrelondon.co.uk">info@examcentrelondon.co.uk</a></p>
            <p>🌐 <a href="https://www.examcentrelondon.co.uk" target="_blank">www.examcentrelondon.co.uk</a></p>
            <p>&copy; {{ \Carbon\Carbon::now()->format('Y') }}
                Exam Centre London. All rights reserved.</p>
        </div>

    </div>
</body>
</html>
