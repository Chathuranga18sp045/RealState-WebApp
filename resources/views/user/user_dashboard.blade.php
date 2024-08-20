<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealState</title>
    
<!-- Fav Icon -->
<link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

<!-- Link Fontawsom -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!--custom Css  -->
<link href="{{ asset('frontend/asset/customcss/logo.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/customcss/header.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/customcss/navbar.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/customcss/footer.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/customcss/firstimage.css') }}" rel="stylesheet">



</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <!-- Header Link -->
            @include('user.body.header')

            <!-- Section Area -->
            @yield('user')

            <!-- Footer Link -->
            @include('user.body.footer')
        </div>
    </div>


    <!-- toaster.js -->
	 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
	<!-- Script for Delete alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code/code.js')}}"></script>
<script src="{{ asset('backend/assets/js/code/validate.min.js')}}"></script>


<!-- Custom JavaScript -->
<script src="{{ asset('frontend/asset/customjs/header.js') }}"></script>
<script src="{{ asset('frontend/asset/customjs/logo.js') }}"></script>
<script src="{{ asset('frontend/asset/customjs/navbar.js') }}"></script>
<script src="{{ asset('frontend/asset/customjs/footer.js') }}"></script>
<script src="{{ asset('frontend/asset/customjs/firstimage.js') }}"></script>

 
<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>