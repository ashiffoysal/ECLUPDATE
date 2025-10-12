<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Collection Notification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        .header {
            background-color: #222;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .container {
            max-width: 700px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container p {
            margin: 10px 0;
        }
        .container ul {
            list-style: none;
            padding: 0;
        }
        .container ul li {
            background: #f4f4f9;
            margin: 5px 0;
            padding: 10px;
            border-left: 5px solid #0066cc;
        }
        .container ol {
            margin: 10px 0;
            padding-left: 20px;
        }
        .container strong {
            color: #0066cc;
        }
        .footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
        .footer a {
            color: #00ccff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://www.examcentrelondon.co.uk/uploads/logo/logo_1662996021.png" alt="Exam Centre London Logo">
       
    </div>

    <div class="container">
        <p>Dear <strong>{{ $data['first_name'] }} {{ $data['middle_name'] }} {{ $data['last_name'] }}</strong>,</p>
        <p>We are pleased to inform you that we have received your {{ $data['main_exam_type'] }} Certificate. You may collect your certificate from our Centre during the following hours:</p>
        <ul>
            <li><strong>Days:</strong> Monday to Friday</li>
            <li><strong>Time:</strong> 10:00 AM to 12:30 PM</li>
        </ul>
        <p><strong>Collection Address:</strong></p>
        <p>
            54 Upton Lane<br>
            London, E7 9LN
        </p>
        <p>If you are unable to collect the certificate in person, we can send it to you via guaranteed special delivery for a fee of £20. To arrange this, please follow these steps:</p>
        <ol>
            <li>Make a payment of £20 to the account details provided below.</li>
            <li>Reply to this email with your full UK postal address.</li>
        </ol>
        <p><strong>Bank Details:</strong></p>
        <p>
            Account Name: <strong>EDU SERVICE LIMITED</strong><br>
            Sort Code: <strong>04-06-05</strong><br>
            Account Number: <strong>18901601</strong><br>
            Reference: <strong>[Your Name]</strong>
        </p>
        <p>If you have any questions or need further assistance, feel free to reach out to us.</p>
        <p>Kind regards,</p>
        <p><strong>Exam Team</strong><br>Exam Centre London</p>
    </div>

    <div class="footer">
        <p><strong>Exam Centre London</strong> | 54 Upton Lane, London, E7 9LN</p>
        <p>Email: <a href="mailto:info@examcentrelondon.com">info@examcentrelondon.com</a> | Tel: +44 20 1234 5678</p>
    </div>
</body>
</html>
