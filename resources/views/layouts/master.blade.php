<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{assets('css/style.css')}}">
    <link rel="stylesheet" href="{{assets('css/custom.css')}}">
    <link rel="stylesheet" href="{{assets('css/font-awesome-4.7.0/css/font-awesome.css')}}">
</head>
<body>
@yield("content")


<script src="{{assets('js/query.js')}}"></script>
<script src="{{assets('js/popper.js')}}"></script>
<script src="{{assets('js/ajax.js')}}"></script>
<script src="{{assets('js/bootstrap.js')}}"></script>   
<script src="{{assets('js/custom.js')}}"></script> 


@yield("script")

</body>
</html>