@extends('admin::layouts.master')

@section('title', 'Vluchten PDFs')

@section('content')
  <div class="container">
    <div class="row">
      <!-- Manual PDF generation -->
      <div class="col bg-dark bg-opacity-75 rounded p-2 m-2">
        <h5 class="text-white">Handmatig PDF's genereren</h5>

        <form action="/export-flights/generate-manual-pdf" method="POST">
          @csrf
          <div class="form-group">
            <label for="date" class="text-white font-weight-bold">Begin datum:</label>
            <input type="date" id="date" name="start_date" class="form-control" required>
          </div>

          <div class="form-group mt-2">
            <label for="date" class="text-white font-weight-bold">Eind datum:</label>
            <input type="date" id="date" name="end_date" class="form-control" required>
          </div>
          
          <button type="submit" class="btn btn-primary mt-2">Genereer PDF</button>
        </form>
      </div>

      <!-- See/download generated PDF's -->
      <div class="col bg-dark bg-opacity-75 rounded p-2 m-2">
        <h5 class="text-white">Gegenereerde PDF's</h5>

        <div class="overflow-auto p-3 bg-body-tertiary" style="max-height: 250px;">
          @foreach (File::files(public_path('flightExport-pdfs/')) as $file)
            <a href="flightExport-pdfs/{{ basename($file) }}" target="_blank">{{ basename($file) }}</a><br>
          @endforeach
        </div>
      </div>
      
      <!-- Settings for PDF automation -->
      <div class="col bg-dark bg-opacity-75 rounded p-2 m-2">
        <h5 class="text-white">Automatisch genereren/mailen (Work in progress)</h5>

        <form action="export-flights/automatic-generator" method="POST">
          @csrf
          <div class="form-check form-switch mb-2">
            <input class="form-check-input" value=1 type="checkbox" id="switch_auto_gen_pdf" name="switch_auto_gen_pdf">
            <label class="form-check-label text-white" for="switch_auto_gen_pdf">Automatisch maandelijke PDF's genereren</label>
          </div>
          <div class="form-group">
            <label for="date" class="text-white font-weight-bold">Op welke datum moet de PDF gegenereerd worden?</label>
            <input type="date" id="date" name="date" class="form-control" >
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
