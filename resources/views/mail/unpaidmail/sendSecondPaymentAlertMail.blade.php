<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #f8f8f8;
            padding: 10px;
            text-align: center;
        }
        .header img {
            width: 150px; /* Adjust the size of your logo here */
            height: auto;
        }
        .content {
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }
        .content h3 {
            color: #d9534f;
        }
        .content p {
            margin: 10px 0;
        }
        .highlight {
            color: #d9534f;
            font-weight: bold;
        }
        .footer {
            background-color: #f8f8f8;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            color: #ffffff;
            background-color: #28a745;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer a {
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section with Logo -->
        <div class="header">
            <img src="https://www.examcentrelondon.co.uk/uploads/logo/logo_1662996021.png" alt="ECL Exam Centre London Logo">
        </div>

        <!-- Main Content Section -->
        <div class="content">
            <h3>Dear {{ $user['name'] }},</h3>
            <p>This is your <span class="highlight">final reminder!</span> You have just <span class="highlight">24 hours left</span> to complete your payment and secure your place for your upcoming exams. To make it even more enticing, we're now offering an <span class="highlight">exclusive 10% discount</span> if you act fast!</p>
            
            <h4>Act Now – Only 24 Hours Remaining!</h4>
            <ul>
                <li><strong>🔥 10% Off Your Total Exam Fees:</strong> Use the code <span class="highlight">{{ $user['coupon'] }}</span> when making your payment—this is a limited-time offer, valid for the next 24 hours only!</li>
                <li><strong>📚 Free Premium Study Resources:</strong> (Worth £19.99) Essential materials to help you prepare effectively.</li>
                <li><strong>📝 Free Access to Exam Scripts:</strong> Save up to £120 per subject—a total of £360 for three subjects!</li>
            </ul>
            
            <h4>Urgent: Complete Your Payment Within 24 Hours</h4>
            <p>To keep your exam booking and enjoy these valuable benefits, you <strong>must</strong> complete your payment within the next <strong>24 hours</strong>. After this period, your booking may be cancelled, and this exclusive offer will no longer be available.</p>

           
            
            <h3>Complete Your Payment in 5 Easy Steps:</h3>
            <ol>
                <li><strong>Go to</strong>  the User Dashboard.</li>
                <li><strong>Navigate</strong>to the "All Exam Requests" section.</li>
                <li><strong>Click the</strong> "Pay" button next to your selected exam.</li>
                <li><strong>Apply</strong> the discount code <span class="discount-code">{{ $user['coupon'] }}</span></li>
                <li><strong>Complete Your Payment</strong> .</li>
            </ol>

            <p>We're here to assist if you have any questions or need help. Don't miss out on this final opportunity to save big and secure your exam place!</p>

            <p>Thank you for your immediate attention to this matter.</p>
            <p>Kind regards,<br>
            Exam Centre London</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Contact us: <a href="mailto:info@examcentrelondon.com">info@examcentrelondon.com</a> | Phone: 0208 616 2526</p>
            <p>© 2024 Exam Centre London. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
