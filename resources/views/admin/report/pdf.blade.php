<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>TAILOR RECORDS</h2>
    <div class="table-responsive">
    <table class="table table-bordered table-responsive">
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