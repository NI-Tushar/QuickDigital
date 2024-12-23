<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation | WiseCorporation</title>
    <link rel="icon" href="{{ url ('icon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .cancel-box {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            width: 400px;
            text-align: center;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }
        .cancel-icon {
            border:3px solid #d9534f;
            height:50px;
            width:50px;
            margin:auto;
            display:flex;
            border-radius:50%;
        }
        .cancel-icon p{
            color: #d9534f; /* Cancel icon color */
            font-size: 30px;
            margin-bottom:5px;
            padding:0;
            margin:auto;
            text-align:center;
        }
        h2 {
            margin-top:10px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
        p {
            font-size: 12px;
            color: #666;
            margin-bottom: 20px;
        }
        .btn-status {
            background-color: #d9534f; /* Button color */
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-status:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

<div class="cancel-box">
    <div class="cancel-icon"><p>✖</p></div> <!-- Cancel icon -->
    <h2>আপনার অর্ডারটি বাতিল হয়েছে!</h2>
    <p>"দুঃখিত, আপনাকে জানাতে হচ্ছে যে আপনার অর্ডারটি বাতিল করা হয়েছে।"<br>অনুগ্রহ করে আবার চেস্টা করবেন</p>
    <a href="{{ url('/') }}" class="btn-status">হোম পেইজ</a>
</div>

</body>
</html>
