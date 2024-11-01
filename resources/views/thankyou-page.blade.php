<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce - Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
.centerbox{
    width: 550px;
    height: 250px;
    background-color: rgb(222, 248, 239);
    color: black;
    border: 2px solid red;
}
@media screen and (max-width: 578px) {
.centerbox{
    margin: 0 10px;
}
}
</style>
</head>
<body>

        <div class="d-flex justify-content-center vh-100">
            <div class="centerbox align-self-center p-2">
                <h2 class="text-center">Congratulation</h2>
                <p>Hello,
                    @if (session('name'))
                        {{ session('name') }}
                    @endif
                </p>
                <p class="d-flex justify-content-center">আপনার অর্ডারটি আমাদের ওয়েবসাইটে কনর্ফাম করা হয়েছে, অতিশিগ্রই আমাদের প্রতিনিধি আপনার সাথে ফোনে যোগাযোগ করবে ডেলিভারী সংক্রান্ত বিষয়ে কথা বলার জন্য। </p>
                <div class="d-grid auto-mx">
                    <a href="{{route('home.view')}}" class="btn btn-info">Go Home</a>
                </div>
                
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>    
</body>
</html>