@extends('admin::layouts.master')


@section('title', 'Nieuwsbrief')
@section('content')
  <div class="containter">
    <div class="row">
      <div class="col m-4">
        <h2 class="text-white mt-2 mb-2">Nieuwe nieuwsbrief maken</h2>

        <form action="{{ route('newsletter.store') }}" class="" method="POST">
          @csrf
          <p class="text-white mb-0">Voor wie is deze nieuwsbrief bestemd?</p>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=6 id="junior_member" name="checkbox_send_to[]">
            <label class="form-check-label text-white" for="junior_member">
              Jeugd leden
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 id="aspirant_member" name="checkbox_send_to[]">
            <label class="form-check-label text-white" for="aspirant_member">
              Aspirant leden
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=2 id="member" name="checkbox_send_to[]">
            <label class="form-check-label text-white" for="member">
              Leden (Club status is lid, dus niet alle leden!)
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=5 id="donor" name="checkbox_send_to[]">
            <label class="form-check-label text-white" for="donor">
              Donateurs
            </label>
          </div>
          
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value=3 id="management" name="checkbox_send_to[]">
            <label class="form-check-label text-white" for="management">
              Bestuur
            </label>
          </div>
          
          <!-- Place the first <script> tag in your HTML's <head> -->
          <script src="/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
      
          <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
          <script>
            tinymce.init({
              selector: 'textarea',
              plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
              toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
              height: 600,
            });
          </script>
          <textarea name="text_editor">
            <!-- Text -->
          </textarea>

          <button type="submit" class="btn btn-success mt-4 mb-4">Verstuur nieuwsbrief</button>
        </form>
      </div>

      <div class="col m-4">
        <h2 class="text-white mb-2 mt-2">Oude nieuwsbrieven</h2>

        @foreach ($files as $file)
          @if (str_contains($file, 'pdf'))
            <a href="{{ $file }}">{{ $file }}</a><br>
          @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection
