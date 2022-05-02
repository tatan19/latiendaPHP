<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 class="text-center"> Paises de la región</h1>
    <div class="container">
    <table class="table table-striped"> 
        <thead>
            <br>
            <br>
            <tr>
                <th>
                    <h2>País</h2>
                </th>
                <th>
                    <h2>Capital</h2>
                </th>
                <th>
                    <h2>moneda</h2>
                </th>
                <th>
                    <h2>poblacion</h2>
                </th>
                <th>
                    <h2>Ciudades</h2>
                </th>
            </tr>
            </tr>
            </tr>
    </thead>
        <tbody>
            @foreach($paises as $pais => $infopais)
            <tr>
                <td class="text-warning" rowspan='{{ count($infopais["ciudades"]) }}'>
                    <h2>{{$pais}}</h2>
                </td>
                <td class="text-primary" rowspan='{{ count($infopais["ciudades"]) }}'>
                    <h2>{{$infopais["capital"]}}</h2>
                </td>
                <td class="text-danger" rowspan='{{ count($infopais["ciudades"]) }}'>
                    <h2>{{$infopais["modeda"]}}</h2>
                </td>
                <td rowspan='{{ count($infopais["ciudades"]) }}'>
                    <h2>{{$infopais["poblacion"]}}</h2>
                </td>
                @foreach($infopais["ciudades"] as $ciudad)
                  
                      <td class="table-danger">
                          <h2>{{$ciudad}}</h2>
                      </td>
                  </tr>
                @endforeach
            
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
    </div>
</body>
</html>