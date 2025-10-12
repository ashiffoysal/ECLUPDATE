<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #FF4500;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            position: relative;
        }
        .header img {
            position: absolute;
            top: 10px;
            left: 20px;
            height: 40px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            font-size: 16px;
            line-height: 1.6;
            padding: 20px;
        }
        .benefits {
            margin: 20px 0;
        }
        .benefits span {
            font-weight: bold;
        }
        .benefits .discount {
            color: #FF4500;
        }
        .benefits .revision {
            color: #1E90FF;
        }
        .benefits .scripts {
            color: #32CD32;
        }
        .additional-discount {
            color: #FF4500;
            font-weight: bold;
        }
        .footer {
            background-color: #FF4500;
            color: #fff;
            text-align: center;
            padding: 15px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            margin-top: 20px;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
       <div class="new" style="text-align:center;padding-bottom:20px;padding-top:20px;">
                <img src="https://www.examcentrelondon.co.uk/uploads/logo/logo_1662996021.png" alt="Exam Centre London Logo">
            </div>
        <div class="header">
            <h1>Don’t Miss Out! Exclusive Exam Booking Discounts!</h1>
        </div>
        <div class="content">
            <p>Dear {{ $user['name'] }},</p>
            <p>We noticed you haven’t taken action since receiving our welcome email, and we want to ensure you don’t miss out on an incredible opportunity!</p>
            <p>You have been selected to receive <strong>exclusive benefits</strong> on your exam booking with us, available for a limited time only – <strong>just 72 hours</strong>:</p>
            <div class="benefits">
                <p><span class="discount">5% Discount on Exam Booking:</span> Save on your exam fees and secure your place today!</p>
                <p><span class="revision">Free Premium Revision Booklet:</span> A comprehensive guide featuring recent past papers and detailed mark schemes, <strong>worth £19.99 – yours for free!</strong></p>
                <p><span class="scripts">Free Access to Your Original Exam Scripts:</span> Review your scripts at no cost, <strong>saving £40 on the usual admin fee.</strong></p>
            </div>
            <p>But that’s not all! If you also decide to book any courses or tuition with us, you will receive an <span class="additional-discount">additional 5% discount</span> on:</p>
            <ul>
                <li><span class="revision">Course Booking</span></li>
                <li><span class="scripts">Tuition Fees</span></li>
            </ul>
            <p>These additional benefits are designed to give you even more support in your preparation journey. Whether you’re looking for extra guidance or resources, we’re here to help you every step of the way.</p>
            <p><span class="discount">Remember, this exclusive offer is valid for the next 72 hours only!</span> Don’t miss your chance to take advantage of these special discounts and benefits. Click the link below to book your exam and secure these valuable offers!</p>
            <p>If you have any questions or need assistance, please don’t hesitate to contact us. We are here to support you on your journey to success.</p>
        </div>
        <div class="footer">
            <p>Best regards,<br>
            The Exam Centre London Team</p>
            <p><a href="mailto:info@examcentrelondon.co.uk">Email:info@examcentrelondon.co.uk</a></p>
            <p><a href="">Phone: 0208 616 2526</a></p>
        </div>
    </div>
</body>
</html>
