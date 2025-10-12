<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Results Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 100%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            background-color: #17314c; /* Header background color */
            color: white;
            padding: 30px 0;
            border-radius: 10px 10px 0 0; /* Rounded top corners */
        }

        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        h1 {
            margin: 10px 0;
            font-size: 28px;
            font-weight: bold;
        }

        .contact-info {
            font-size: 14px;
        }

        .contact-info a {
            color: #ffdd57; /* Link color */
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-info a:hover {
            text-decoration: underline;
            color: #ffcc00; /* Hover color */
        }

        .student-info {
            margin: 20px 0;
            font-size: 16px;
            background-color: #e8f0fe; /* Light background */
            padding: 15px;
            border-radius: 8px;
        }

        .info-container {
            display: flex;
            justify-content: space-between; /* Space between the two columns */
        }

        .info-left, .info-right {
            width: 48%; /* Each column takes up 48% of the width */
        }

        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 16px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e6f7ff; /* Highlight row on hover */
        }

        .subject-section {
            margin: 20px 0;
            padding: 10px;
            background-color: #e7f3ff; /* Light blue background */
            border-left: 4px solid #0044cc; /* Left border */
        }

        footer {
            text-align: center;
            background-color: #17314c; /* Footer background color */
            color: white;
            padding: 20px 0;
            border-radius: 0 0 10px 10px; /* Rounded bottom corners */
            margin-top: 20px;
        }

        .footer-info {
            margin: 10px 0;
            font-size: 14px;
        }

        footer a {
            color: #ffdd57; /* Footer link color */
            text-decoration: none;
            transition: color 0.3s;
        }

        footer a:hover {
            text-decoration: underline;
            color: #ffcc00; /* Hover color */
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="https://www.examcentrelondon.co.uk/uploads/logo/logo_1662996021.png" alt="Your Logo" class="logo">
            <h1>Results by Student Report</h1>
        </header>
        
        <section class="student-info">
            <div class="info-container">
                <div class="info-left">
                    <p><strong>Name:</strong> {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</p>
                    <p><strong>Date of Birth:</strong> {{ $data->date_of_birth }}</p>
                    <p><strong>Exam:</strong>{{ $data->main_exam_type }}</p>
                    <p><strong>Centre Number:</strong>13289</p>
                </div>
                <div class="info-right">
                    <p><strong>Candidate No:</strong> {{ $data->Candidate_number }}</p>
                    <p><strong>Season:</strong> Summer 2024</p>
                    <p><strong>UCI:</strong>  {{ $data->uci_number }} </p>
                    <p><strong>ULN:</strong> {{ $data->uln_number }}</p>
                
                </div>
            </div>
        </section>

        <div class="subject-section">
            <h2>Subject Results</h2>
        </div>

        <table class="results-table">
            <thead>
                <tr>
                    <th>Exam</th>
                    <th>Board</th>
                    <th>Exam Level</th>
                    <th>Result</th>
                    <th>Mark</th>
                    <th>Endorse</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $mainresult)
                <tr>
                    <td>{{ $mainresult->subject }}</td>
                    <td>{{ $mainresult->exam_board }}</td>
                    <td>{{ $mainresult->main_exam_type }}</td>
                    <td>{{ $mainresult->grade }}</td>
                    <td>{{ $mainresult->mark }}</td>
                    <td>{{ $mainresult->endrosment }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <footer>
            <div class="footer-info">
                <p><strong>Address:</strong> 54 Upton Lane, London E7 9LN</p>
                <p><strong>Our Phone:</strong> Forest Gate: 0208 616 2526 | Ilford: 0208 478 9988</p>
                <p><strong>Our Email:</strong> <a href="mailto:info@examcentrelondon.co.uk">info@examcentrelondon.co.uk</a></p>
            </div>
            <p>&copy; 2024 Merit Tutors | All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>
