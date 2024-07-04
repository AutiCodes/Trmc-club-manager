@extends('admin::layouts.master')	

@section('content')

  <div class="container-fluid mt-3">
    <div class="row">

      <div class="col bg-dark p-2 m-4 rounded bg-opacity-75">
        <h4 class="text-white">Nieuwe aanmeldingen (3)</h4>

        <table class="table text-white text-center">
          <thead>
            <tr>
              <th scope="col">Naam</th>
              <th scope="col">Adres</th>
              <th scope="col">Email</th>
              <th scope="col">Wil lid worden op</th>
              <th scope="col">-></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Kelvin de Reus</th>
              <td>Straatnaam postcode huisnummer woonplek</td>
              <td>mail@provider.nl</td>
              <td>04-07-2024</td>
              <td>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTest">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                </svg>
              </a>
              </td>
            </tr>
            <tr>
            <th scope="row">Kelvin de Reus</th>
              <td>Straatnaam postcode huisnummer woonplek</td>
              <td>mail@provider.nl</td>
              <td>04-07-2024</td>
              <td>
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTest">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                </svg>
              </a>
              </td>              
            </tr>
            <tr>
            <th scope="row">Kelvin de Reus</th>
              <td>Straatnaam postcode huisnummer woonplek</td>
              <td>mail@provider.nl</td>
              <td>04-07-2024</td>
              <td>
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTest">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                </svg>
              </a>
              </td>              
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <!-- Modals -->
  <div class="modal fade" id="modalTest" tabindex="-1" role="dialog" aria-labelledby="modalTest" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Aanmelding van Kelvin de Reus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <div class="col-md-12">
              <h4>Beheer lidmaatschap aanmelding</h4>
              
              <div class="row mb-2">
                <p>Aanmelding status: <span class="badge bg-danger">Wachten op betaling</span></p>
                <div class="col">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">Wachten op betaling</option>
                  <option value="2">Wachten op nader contact</option>
                </select>                  
                </div>
              </div>

              <div class="row">
                <p>Aanmelding acties:</p>
                <div class="col">
                  <button type="button" class="btn btn-success" onclick="return confirm('Weet je zeker dat je dit lid wilt accepteren?')">Accepteren</button>
                </div>
                <div class="col">
                  <button type="button" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze aanmelding wilt afwijzen?')">Afwijzen</button>
                </div>                
              </div>
            </div>   

          <hr>

          <div class="row">
            <div class="col-md-12">
              <h4>Persoonlijke gegevens:</h4>
              
              <p class="">
                <strong>Naam:</strong> <br>
                <strong>Geboortedatum:</strong> <br>
                <strong>Adres:</strong><br>
                <strong>Postcode:</strong><br>
                <strong>Stad:</strong><br>
                <strong>Email:</strong><br>
                <strong>Telefoonnummer:</strong><br>
                <strong>Geboortedatum:</strong><br>
                <strong>Nationaliteit:</strong><br>
              </p>
            </div>

            <hr>

            <div class="col-md-12">
              <h4>Brevetten gehaald:</h4>
              <p class="">
                <strong>Zweef A:</strong> <span class="badge bg-danger">Nee</span> <br>
                <strong>Motor A:</strong> <span class="badge bg-danger">Nee</span> <br>
                <strong>Helicopter A:</strong> <span class="badge bg-danger">Nee</span> <br>
                <strong>Drone EU A1/A3:</strong> <span class="badge bg-success">Ja</span> <br>
                <strong>Drone EU A2:</strong> <span class="badge bg-success">Ja</span> <br>
              </p>
            </div>

            <hr>

            <div class="col-md-12">
              <h4>Overig</h4>
              <p class="">
                <strong>RDW registratie nummer:</strong> <br>
                <strong>Lid van een andere modelvliegclub:</strong> <br>
                <strong>Zo ja, bij welke modelvliegclub:</strong> <br>
                <strong>KNVvl lid:</strong> <br>
                <strong>Zo ja, KNVvl registratienummer:</strong> <br>
                <strong>Wilt lid worden per:</strong> <br>
              </p>
            </div>    
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
        </div>
      </div>
    </div>
  </div>
@stop