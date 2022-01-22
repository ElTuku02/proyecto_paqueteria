<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>  
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
    body{
        height: 100%; 
        font-family: 'Noto Sans', sans-serif;
        background-color: #031321; 
        
    }

    .contact_form{  
      width: 460px; 
      height: auto;
      margin: 80px auto;
      border-radius: 10px;  
      padding-top: 30px;
      padding-bottom: 20px;  
      background-color: #fbfbfb; 
      padding-left: 30px; 
    }


    input{
      background-color: #fbfbfb; 
      width: 408px; 
      height: 40px; 
      border-radius: 5px;  
      border-style: solid; 
      border-width: 1px; 
      border-color: #ab4493; 
      margin-top: 10px;  
      padding-left: 10px;
      margin-bottom: 20px; 
    }


    textarea{
      background-color: #fbfbfb; 
      width: 405px; 
      height: 150px; 
      border-radius: 5px;  
      border-style: solid; 
      border-width: 1px; 
      border-color: #ab4493; 
      margin-top: 10px;  
      padding-left: 10px;
      margin-bottom: 20px; 
      padding-top: 15px; 
    }


    label{
      display: block; 
      float: center;  
    }


    button{
      height: 45px; 
      padding-left: 5px;
      padding-right: 5px;   
      margin-bottom: 20px; 
      margin-top: 10px;   
      text-transform: uppercase;
      background-color: #2196f3; 
      border-color: #2196f3; 
      border-style: solid; 
      border-radius: 10px;  
      width: 420px;   
      cursor: pointer;
    }


    button p{
      color: #fff; 
      text-align: center;
    }


    span{
      color: #ab4493; 
    }


    .aviso{
      font-size: 13px;  
      color: #0e0e0e;  
    }


    h1{
      font-size: 39px;  
      text-align: letf; 
      padding-bottom: 20px; 
      color: #2196f3;
    }


    h3{
      font-size: 16px; 
      padding-bottom: 30px;
      color: #0e0e0e;   
    }


    p{
      font-size: 14px; 
      color: #0e0e0e; 
    }


    ::-webkit-input-placeholder {
     color: #a8a8a8;
    }


    ::-webkit-textarea-placeholder {
     color: #a8a8a8;
    }


    .formulario input:focus{
      outline:0;
      border: 1px solid #97d848;
    }


    .formulario textarea:focus{
      outline:0;
      border: 1px solid #97d848;
    }
    </style>


</head>
<body>
    
    @yield("titulo")

    <div id="principal">
        @yield("contenido")
    </div>
</body>
</html>