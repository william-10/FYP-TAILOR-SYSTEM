<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <style>
    #categories {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #categories td, #categories th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #categories tr:nth-child(even){background-color: #f2f2f2;}

    #categories tr:hover {background-color: #ddd;}

    #categories th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

    <h2>TAILOR RECORDS</h2>
    <hr>
    <div class="table-responsive">
    <table id="categories" width="100%">
    <thead class="table-dark">
      <tr>
      <td>ID</td>
        <td><b>Name</b></td>
        <td><b>Email</b></td>
        <td><b>Phone</b></td>
        <td><b>region</b></td>
        <td><b>status</b></td>     
      </tr>
      </thead>
      <tbody>
      @foreach ($tailor as $tailors)
      <tr>
      <td>{{$loop->index+1}}</td>
        <td>
          {{$tailors->tailor_name}}
        </td>
        <td>
          {{$tailors->email}}
        </td>
        <td>
          {{$tailors->phone}}
        </td>
        <td>
          {{$tailors->region}}
        </td>
        
            @if ($tailors->status ==1)
                <td>ACTIVE</td>            
            @elseif($tailors->status ==0)
            <td>BANNED</td>        
            @endif
          
        
        @endforeach
        
      </tr>
      </tbody>
    </table>
    </div>
    
  </body>
</html>