<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
<table>
    <thead>
        <th>city</th>
        <th>region</th>
        <tbody>
            @foreach ($content as $region )
                <tr>
                    <td>{{$region->city}}</td>
                    <tr>{{$region->admin_name}}</tr>
                </tr>
            @endforeach
        </tbody>
    </thead>
</table>
        <script src="" async defer></script>
    </body>
</html>
