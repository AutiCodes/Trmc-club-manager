<html>
  <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <main>
    <h1>Twente Radio Modelvlieg Club</h1>
    <hr
    <h2>Leden:</h2>

    <table class="table">
      <thead>
      <tr>
        <th scope="col">Nummer</th>
        <th scope="col">RDW nummer</th>
        <th scope="col">Datum en tijd</th>
      </tr>
      </thead>
      <tbody>
      
      @foreach ($members as $member)
        <tr> 
          <th scope="row">{{ $member->id }}</th>
          <td>{{ $member}}</td>
          <td>{{ $member }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h3 class="mb-4"> Totaal aantal leden: {{ $totalFlights->total_flights }}</h3>
    
    <footer class="text-center">
        <p>PDF gegenereerd op {{ date('d-m-Y') }}  door {{ $currentUser }}</p>
        <p>&copy; {{ date('Y') }} Twente Radio Modelvlieg Club</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
  </main>
</html>