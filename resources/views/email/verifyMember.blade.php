<!DOCTYPE html>
<html>

<head>
    <title>Congratulations! Approval Membership</title>
    <style>
        body {
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .card {
            background-color: #fff;
            width: 400px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .card h1 {
            margin-top: 0;
        }

        .card img {
            width: 200px;
            height: 200px;
            margin: 20px auto;
            display: block;
        }

        .card ul {
            list-style: none;
            padding: 0;
            margin: 20px 0 0;
        }

        .card ul li {
            display: inline-block;
            margin-right: 20px;
            font-weight: bold;
        }

        .card ul li:last-child {
            margin-right: 0;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Congratulations! {{ $memberName }}</h1>
        <p>your membership form has been approved by {{ $approvedBy }}.</p>
    </div>
</body>

</html>
