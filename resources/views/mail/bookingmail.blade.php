<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />
    <title>{{ $companyInformation->company_mail_name }}</title>
  </head>
  <body
    style="
      font-family: Inter, sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
      font-size: 15px;
      line-height: 1.5;
    "
  >
    <style>
      .hoverbtn {
        padding: 8px 24px !important;
        font-size: 14px;
      }
      .hoverbtn:hover {
        background-color: #096d25 !important;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      }
      .hover:hover {
        opacity: 0.8;
      }
      @media all and (max-width: 575px) {
        table {
          padding: 20px 30px 30px 30px !important;
        }
        .hoverbtn {
          margin: 20px 0 !important;
        }
        .logostyle {
          padding: 15px 0px 10px 0px !important;
        }
        .logostyle a img {
            width: 140px !important;
        }
        .header {
          padding-bottom: 12px !important;
          font-size: 24px !important;
        }
        p {
          font-size: 13px !important;
        }
        .paddingBottom {
          padding-bottom: 18px !important;
        }
        .icons {
          padding: 10px 0 !important;
          border-top: 1px solid #d9d9d9 !important;
          border-bottom: 1px solid #d9d9d9 !important;
        }
        .copyright {
          margin-top: 15px !important;
          margin-bottom: 25px !important;
        }
        .copyrightBottom p {
          font-size: 11px !important;
        }
      }
    </style>
    <table
      width="100%"
      align="center"
      style="
        background: #ffffff;
        max-width: 767px;
        padding: 40px 50px 50px 50px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      "
    >
      <tr>
        <td class="logostyle" style="padding: 20px 0px 35px 0px;">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left">
                <a href="https://examcentrelondon.co.uk">
                  <img
                    style="width: 190px; height: auto"
                    src="{{ asset('uploads/logo/'.$companyInformation->logo) }}"
                    alt="logo"
                  />
                </a>
              </td>
              <td align="right">
                <a href="https://merittutors.co.uk">
                  <img
                    style="width: 190px; height: auto"
                    src="https://merittutors.co.uk/frontend/update-design/assets/images/home/logo.png"
                    alt="logo"
                  />
                </a>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <h2 class="header" style="margin:0; color:#000; font-size:16px; font-weight:500; padding-bottom:30px;">
            Dear Candidate,
          </h2>
          <p style="margin:0; color:#333; font-size:15px; font-weight:400;">
            Thank you for choosing{{ $companyInformation->company_mail_name }} for your upcoming exams. We are pleased to confirm that your exam booking has been successfully received and secured.
          </p>
          <p style="margin-top:15px; color:#333;">
           Your booking is now confirmed, but in order to receive your exam registration and other necessary documents, payment must be made immediately. As your booking is legally binding, the exam fee is now due. We kindly request that you make the payment promptly to avoid any delays, complications, the risk of losing your place, or incurring late fees.

          </p>
          <p style="text-align:center; margin:30px 0;">
            <a
              class="hoverbtn"
              href="{{ $companyInformation->website }}"
              style="
                background-color:#247e3d;
                color:white;
                padding:11px 26px;
                text-decoration:none;
                border-radius:24px;
                display:inline-block;
                font-size:15px;
                font-weight:300;
                transition:all 0.3s ease-in-out;
              "
              >Visit Website</a>
          </p>

 
          <p style="margin:0; color:#333; font-size:15px; font-weight:400;">
            If you have any questions or require assistance, please do not hesitate to contact us. We are here to support you.

          </p>
          <p style="margin-top:12px; color:#333;">
            Thank you once again for choosing {{ $companyInformation->company_mail_name }}. We look forward to assisting you with your exam preparations and wish you every success in your upcoming exams.

          </p>
       

          <p style="color:#333; font-size:15px; font-weight:400; margin:0;">Best regards,</p>
          <p style="color:#247e3d; font-size:15px; font-weight:500; margin:0; padding-bottom:45px;">
            The {{ $companyInformation->company_mail_name }} Team
          </p>
        </td>
      </tr>

      <tr>
        <td
          class="icons"
          style="
            text-align:center;
            padding:18px 0;
            border-top:1.5px solid #d9d9d9;
            border-bottom:1.5px solid #d9d9d9;
          "
        >
          <a href="{{ $social->facebook }}" class="hover"><img src="https://i.postimg.cc/76KTDD41/facebook.png" alt="Facebook" width="34" /></a>
          <a href="{{ $social->instagram }}" class="hover"><img src="https://i.postimg.cc/d3XkkBLL/instagram.png" alt="Instagram" width="34" /></a>
          <a href="{{ $social->twitter }}" class="hover"><img src="https://i.postimg.cc/ZKByk1M3/x.png" alt="Twitter" width="34" /></a>
          <a href="{{ $social->linkend }}" class="hover"><img src="https://i.postimg.cc/j2CnS9qp/linkedin.png" alt="LinkedIn" width="34" /></a>
        </td>
      </tr>

      <tr class="copyrightBottom">
        <td style="text-align:center; font-size:12px; color:#888; padding:0;">
          <p class="copyright" style="font-size:11px; color:#000; margin-top:18px; margin-bottom:32px;">
            &copy; {{ \Carbon\Carbon::now()->format('Y') }} {{ $companyInformation->company_mail_name }}. All rights reserved.
          </p>
          <p style="color:#000; margin:0 auto; font-size:11px; font-weight:400; max-width:536px;">
            You are receiving this mail because you registered to join the {{ $companyInformation->company_mail_name }} platform as a candidate. This also shows that you agree to our Terms of Use and Privacy Policies. If you no longer want to receive emails from us, click the unsubscribe link below to unsubscribe.
          </p>
          <p style="margin-top:10px;">
            <a href="{{ url('/privacy-policy') }}" style="color:#333; font-size:11px; text-decoration:underline;">Privacy Policy</a> ·
            <a href="{{ url('/terms-condition') }}" style="color:#333; font-size:11px; text-decoration:underline;">Terms of Service</a> ·
            <a href="{{ url('/contact') }}" style="color:#333; font-size:11px; text-decoration:underline;">Help Centre</a>
          </p>
        </td>
      </tr>
    </table>
  </body>
</html>
