<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Exam Details</title>
<style>
    body {
        font-family: Inter, Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
        font-size: 15px;
        line-height: 1.5;
        color: #101112;
    }
    .container {
        max-width: 680px;
        margin: 40px auto;
        background: #ffffff;
        border-radius: 8px;
        padding: 40px 50px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    h1,h2,h3,h4,h5,h6 {
        margin: 0 0 16px 0;
        color: #247e3d;
    }
    p {
        margin: 0 0 12px 0;
    }
    .details {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .details th, .details td {
        text-align: left;
        padding: 8px 0;
    }
    .details th {
        width: 40%;
        font-weight: 600;
        color: #247e3d;
    }
    .bank {
        margin-top: 20px;
        font-weight: 500;
    }
    .footer {
        margin-top: 30px;
        text-align: center;
        font-size: 12px;
        color: #888;
    }
    .social-icons img {
        width: 34px;
        margin: 0 5px;
    }
    @media (max-width: 575px) {
        .container {
            padding: 20px 30px;
        }
        h1 {
            font-size: 20px;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <table width="100%" style="margin-bottom:20px;">
            <tr>
                <td align="left">
                    <img src="https://examcentrelondon.co.uk/uploads/logo/logo_1662996021.png" alt="Exam Centre London" style="width:180px; height:auto;">
                </td>
                <td align="right">
                    <img src="https://i.postimg.cc/QCMKGSg3/merit-tutors-logo.png" alt="Merit Tutors" style="width:180px; height:auto;">
                </td>
            </tr>
        </table>

        <!-- Greeting -->
        <p>Dear Candidate,</p>
        <p>{{ $user['details'] }}</p>

        <!-- Exam Details -->
        <table class="details">
            <tr>
                <th>Exam</th>
                <td>{{ $user['exam_type'] }}</td>
            </tr>
            <tr>
                <th>Subject</th>
                <td>{{ $user['subject'] }}</td>
            </tr>
            <tr>
                <th>Exam Date & Time</th>
                <td>{{ $user['exam_date'] }} , {{ $user['exam_time'] }}</td>
            </tr>
            <tr>
                <th>Exam Venue</th>
                <td>{{ $user['exam_branch'] }}</td>
            </tr>
            <tr>
                <th>Requirements</th>
                <td>{{ $user['requirments'] }}</td>
            </tr>
            <tr>
                <th>Rescheduling</th>
                <td>{{ $user['rescheduling'] }}</td>
            </tr>
            <tr>
                <th>Cancellation</th>
                <td>Not Allowed</td>
            </tr>
        </table>

        <!-- Bank Details -->
        <div class="bank">
            <p><strong>Our Bank Details:</strong></p>
            <p>Edu Service Limited</p>
            <p>Sort Code: 04-06-05</p>
            <p>Account Number: 18901601</p>
            <p>Reference: Your name</p>
        </div>

        <!-- Closing -->
        <p style="margin-top:20px;">Kind regards,</p>
        <p style="color:#247e3d; font-weight:500;">M Helal, Exam Officer</p>
        <p>Exam Centre London / Merit Tutors</p>
        <p><a href="https://examcentrelondon.co.uk">https://examcentrelondon.co.uk</a></p>

        <!-- Footer -->
        <div class="footer">
            <div class="social-icons">
                <a href="#"><img src="https://i.postimg.cc/76KTDD41/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="https://i.postimg.cc/d3XkkBLL/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="https://i.postimg.cc/ZKByk1M3/x.png" alt="Twitter"></a>
                <a href="#"><img src="https://i.postimg.cc/j2CnS9qp/linkedin.png" alt="LinkedIn"></a>
            </div>
            <p>&copy; 2025 Exam Centre London. All rights reserved.</p>
            <p>You are receiving this mail because you registered to join the Exam Centre London platform as a candidate. <br> By receiving this, you agree to our Terms of Use and Privacy Policies. <br> <a href="https://www.examcentrelondon.co.uk/privacy-policy">Privacy Policy</a> · <a href="https://www.examcentrelondon.co.uk/terms-condition">Terms of Service</a></p>
        </div>
    </div>
</body>
</html>
