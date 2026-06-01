<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClinicDesk</title>

    <style>
        body{
            font-family: Arial;
            background:#f5f5f5;
            text-align:center;
            padding-top:100px;
        }

        .box{
            background:white;
            width:500px;
            margin:auto;
            padding:40px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h1{
            color:#2c3e50;
        }

        p{
            color:#555;
        }

        .btn{
            display:inline-block;
            margin-top:20px;
            padding:12px 25px;
            background:#3498db;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }

        .btn:hover{
            background:#2980b9;
        }
    </style>
</head>

<body>

    <div class="box">
        <h1>ClinicDesk</h1>

        <p>
            نظام إدارة العيادات الطبية
        </p>

        <a class="btn" href="views/auth/login.php">
            دخول النظام
        </a>
    </div>

</body>
</html>