@extends('admin::layouts.master')


@section('title', 'Bestuursleden contact')
@section('content')
  <div class="containter">
    <div class="row">
      <div class="col m-4">
        <h2 class="text-white mt-2 mb-2">Contacteer het bestuur</h2>

        <form action="" class="" method="POST">
          @csrf
          <p class="text-white mb-0">Voor welke bestuursleden is deze nieuwsbrief bestemd?</p>

          @foreach ($management as $managementPerson)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value={{$managementPerson->id }} id="{{$managementPerson->id }}" name="checkbox_send_to[]" checked>
              <label class="form-check-label text-white" for="{{$managementPerson->id }}">
                {{ $managementPerson->name }}
              </label>
            </div>
          @endforeach

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
    </div>
  </div>
@endsection
