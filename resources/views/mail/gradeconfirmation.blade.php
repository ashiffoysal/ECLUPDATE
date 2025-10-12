<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />
    <title>EXAM CENTRE LONDON</title>
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
      table.grades {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
      }
      table.grades th,
      table.grades td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
      }
      table.grades th {
        background-color: #247e3d;
        color: #fff;
        font-weight: 600;
      }
      table.grades td {
        background-color: #f9f9f9;
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
                <a href="https://www.examcentrelondon.co.uk">
                  <img
                    style="width: 190px; height: auto"
                    src="https://i.postimg.cc/TYz5TCzs/logo.png"
                    alt="logo"
                  />
                </a>
              </td>
              <td align="right">
                <a href="https://www.merittutors.co.uk">
                  <img
                    style="width: 190px; height: auto"
                    src="https://i.postimg.cc/QCMKGSg3/merit-tutors-logo.png"
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
          <h2 class="header" style="margin:0; color:#000; font-size:16px; font-weight:500; padding-bottom:20px;">
            Dear Candidate,
          </h2>
          <p style="margin:0; color:#333; font-size:15px; font-weight:400;">
            Please find below your predicted grades:
          </p>

          <!-- Grades Table -->
<table class="grades" width="100%" cellspacing="0" cellpadding="0" style="margin:25px 0; border-collapse:collapse; font-size:14px;">
  <thead>
    <tr>
      <th style="background:#247e3d; color:#fff; padding:12px; text-align:left; font-weight:600; border:1px solid #ddd;">
        Paper Name
      </th>
      <th style="background:#247e3d; color:#fff; padding:12px; text-align:left; font-weight:600; border:1px solid #ddd;">
        Grade
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $record)
      <tr style="background-color: {{ $loop->odd ? '#f9f9f9' : '#ffffff' }};">
        <td style="padding:10px 12px; border:1px solid #ddd; color:#333;">
          {{ $record->papers_name }}
        </td>
        <td style="padding:10px 12px; border:1px solid #ddd; color:#333;">
          {{ $record->grades }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
          <p style="margin:0; color:#333; font-size:15px; font-weight:400;">
            If you have any questions or require assistance, please do not hesitate to contact us. We are here to support you.
          </p>

          <p style="color:#333; font-size:15px; font-weight:400; margin:0; margin-top:20px;">Best regards,</p>
          <p style="color:#247e3d; font-size:15px; font-weight:500; margin:0; padding-bottom:45px;">
             Exam Centre London
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
          <a href="#" class="hover"><img src="https://i.postimg.cc/76KTDD41/facebook.png" alt="Facebook" width="34" /></a>
          <a href="#" class="hover"><img src="https://i.postimg.cc/d3XkkBLL/instagram.png" alt="Instagram" width="34" /></a>
          <a href="#" class="hover"><img src="https://i.postimg.cc/ZKByk1M3/x.png" alt="Twitter" width="34" /></a>
          <a href="#" class="hover"><img src="https://i.postimg.cc/j2CnS9qp/linkedin.png" alt="LinkedIn" width="34" /></a>
        </td>
      </tr>

      <tr class="copyrightBottom">
        <td style="text-align:center; font-size:12px; color:#888; padding:0;">
          <p class="copyright" style="font-size:11px; color:#000; margin-top:18px; margin-bottom:32px;">
            &copy; 2025 Exam Centre London. All rights reserved.
          </p>
          <p style="color:#000; margin:0 auto; font-size:11px; font-weight:400; max-width:536px;">
            You are receiving this mail because you registered to join the Exam Centre London platform as a candidate. This also shows that you agree to our Terms of Use and Privacy Policies. If you no longer want to receive emails from us, click the unsubscribe link below to unsubscribe.
          </p>
          <p style="margin-top:10px;">
            <a href="https://www.examcentrelondon.co.uk/privacy-policy" style="color:#333; font-size:11px; text-decoration:underline;">Privacy Policy</a> ·
            <a href="https://www.examcentrelondon.co.uk/terms-condition" style="color:#333; font-size:11px; text-decoration:underline;">Terms of Service</a> ·
            <a href="https://www.examcentrelondon.co.uk/contact" style="color:#333; font-size:11px; text-decoration:underline;">Help Centre</a>
          </p>
        </td>
      </tr>
    </table>
  </body>
</html>
