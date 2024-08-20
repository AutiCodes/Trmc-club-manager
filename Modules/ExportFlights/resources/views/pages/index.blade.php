@extends('admin::layouts.master')

@section('title', 'Vluchten PDFs')

@section('content')
  <div class="container">
    <div class="row">
      <!-- Manual PDF generation -->
      <div class="col bg-dark bg-opacity-75 rounded p-2 m-2">
        <h5 class="text-white">Handmatig PDF's genereren</h5>

        <form action="#" method="POST">
          @csrf
          <div class="form-group">
            <label for="date" class="text-white font-weight-bold">Begin datum:</label>
            <input type="date" id="date" name="date" class="form-control" required>
          </div>

          <div class="form-group mt-2">
            <label for="date" class="text-white font-weight-bold">Eind datum:</label>
            <input type="date" id="date" name="date" class="form-control" required>
          </div>
          
          <button type="submit" class="btn btn-primary mt-2">Genereer PDF</button>
        </form>
      </div>

      <!-- See/download generated PDF's -->
      <div class="col bg-dark bg-opacity-75 rounded p-2 m-2">
        <h5 class="text-white">Gegenereerde PDF's</h5>

        <select class="form-select mt-2 mb-2" aria-label="Default select example">
          <option selected>Selecteer een jaar....</option>
          <option value="1">2024</option>
        </select>

        <div class="overflow-auto p-3 bg-body-tertiary" style="max-height: 250px;">
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>
          <a href="#">00-00-2024 - 00-00-2024</a><br>          
        </div>
      </div>
      
      <!-- Settings for PDF automation -->
      <div class="col bg-dark bg-opacity-75 rounded p-2 m-2">
        <h5 class="text-white">Automatisch genereren/mailen</h5>

        <form action="#" method="POST">
          <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Automatisch maandelijke PDF's genereren</label>
          </div>
          <div class="form-group">
            <label for="date" class="text-white font-weight-bold">Op welke datum moet de PDF gegenereerd worden?</label>
            <input type="date" id="date" name="date" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label text-white">Op welk email adres moet de PDF gestuurd worden?</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          </div>
          
          <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
      </div>
    </div>
  </div>

  <style>
    ::-webkit-scrollbar {
      width: 5px;
    }

    ::-webkit-scrollbar-thumb {
      background: #0d6efd; 
      border-radius: 10px;
    }
  </style>
@endsection
