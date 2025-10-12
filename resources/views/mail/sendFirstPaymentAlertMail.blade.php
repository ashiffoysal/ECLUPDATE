<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #003366;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            color: #333333;
        }
        .content p {
            color: #666666;
            line-height: 1.5;
        }
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            background-color: #f8f8f8;
            color: #333333;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            border-top: 1px solid #dddddd;
        }
        .footer p {
            margin: 5px 0;
        }
        .discount-code {
            background-color: #ffeb3b;
            color: #333333;
            padding: 5px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://www.examcentrelondon.co.uk/uploads/logo/logo_1662996021.png" alt="Exam Centre London">
            <h2>Final Reminder: Secure Your Exam Place & Save Big with Our Special Offer! 🌟</h2>
        </div>
        <div class="content">
            <p>Dear {{$message['name']}},</p>
            <p>I hope you’re well! We noticed that you haven't yet completed your payment for your upcoming exams with us. We understand that things can get busy, so we wanted to send a friendly reminder along with an <strong>exclusive offer</strong> to help you finalise your booking!</p>

            <h3>Unlock Your Special Discount and Free Resources:</h3>
            <ul>
                <li><strong>🌟 5% Off Your Total Exam Fees:</strong> Use the code <span class="discount-code">{{$message['coupon']}}</span> </li>
                <li><strong>📚 Free Premium Study Resources:</strong> (Worth £19.99) Receive essential materials to boost your exam preparation.</li>
                <li><strong>📝 Free Access to Exam Scripts:</strong> Usually charged at £40 per exam—save up to <strong>£120 per subject</strong> (a total of <strong>£360 for three subjects!</strong>).</li>
            </ul>

            <h3>Why Take Action Now?</h3>
            <ul>
                <li><strong>Maximise Your Savings:</strong> Grab this offer and save up to <strong>£360</strong> on exam-related costs!</li>
                <li><strong>Enhanced Preparation:</strong> With complimentary study resources and script access, you'll be better prepared to excel.</li>
                <li><strong>Limited-Time Opportunity:</strong> This offer is available for a short period only—don’t miss out!</li>
            </ul>

            <h3>Complete Your Payment in 3 Easy Steps:</h3>
            <ol>
                <li><strong>Log In</strong> to your account on our portal.</li>
                <li><strong>Booked</strong> your exam.</li>
                <li><strong>Enter</strong> the discount code <span class="discount-code">PAY5OFF</span> during payment.</li>
                <li><strong>Complete Your Payment</strong></li>
            </ol>

            <p>We are here to assist you every step of the way! If you have any questions or need help, please don't hesitate to contact our support team.</p>

            <p>Thank you for choosing our exam centre. We look forward to helping you achieve your best results!</p>

            
        </div>
        <div class="footer">
            <p>Exam Centre London</p>
            <p>Contact us: 0208 616 2526 | <a href="mailto:info@examcentrelondon.co.uk">info@examcentrelondon.co.uk</a></p>
        </div>
    </div>
</body>
</html>
