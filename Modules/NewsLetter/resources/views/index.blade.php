@extends('admin::layouts.master')


@section('title', 'Nieuwsbrief')
@section('content')

  <div class="containter">
    <div class="row">
      <div class="col m-4">
        <h2 class="text-white m-2">Nieuwe nieuwsbrief maken</h2>

        <select class="form-select mb-2" aria-label="Default select example">
          <option selected>Voor wie is deze nieuwsbrief bestemd?</option>
          <option value="Donateur">Alle leden</option>
          <option value="Jeugdlid">Jeugd lid</option>
          <option value="Aspirantlid">Aspirant lid</option>
          <option value="Lid">Lid</option>
          <option value="Bestuur">Bestuur</option>
          <option value="Donateur">Donateur</option>
          <hr>
        </select>

        <!-- Place the first <script> tag in your HTML's <head> -->
        <script src="/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    
        <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
        <script>
          tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
          });
        </script>
        <textarea>
          <!-- Text -->
        </textarea>

        <button type="button" class="btn btn-success mt-4 mb-4">Verstuur</button>

      </div>

      <div class="col m-4">
        <h2 class="text-white m-2">Oude nieuwsbrieven</h2>

        <a href="#">nieuwsbrief-15-8-2024.pdf</a><br>
        <a href="#">nieuwsbrief-15-8-2024.pdf</a><br>
        <a href="#">nieuwsbrief-15-8-2024.pdf</a><br>
        <a href="#">nieuwsbrief-15-8-2024.pdf</a><br>
        <a href="#">nieuwsbrief-15-8-2024.pdf</a><br>
        <a href="#">nieuwsbrief-15-8-2024.pdf</a><br>
        <a href="#">nieuwsbrief-15-8-2024.pdf</a><br>
        <a href="#">nieuwsbrief-15-8-2024.pdf</a><br>

      </div>
    </div>
  </div>
@endsection
