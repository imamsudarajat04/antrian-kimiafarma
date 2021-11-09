@extends('layouts.user.master')

@section('antrian','active')
@section('title','Halaman Antrian')

@push('customcss')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush
    
@section('content')
<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Tekan Tombol Untuk Tiket Antrian</h1>
    
      {{-- <form class="contact-form mt-5">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="fullName">Name</label>
            <input type="text" id="fullName" class="form-control" placeholder="Full name..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Email</label>
            <input type="text" id="emailAddress" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="subject">Subject</label>
            <input type="text" id="subject" class="form-control" placeholder="Enter subject..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Message</label>
            <textarea id="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary wow zoomIn">Send Message</button>
      </form> --}}
      <div class="contact-form mt-5">
          <div class="row justify-content-center">
            <div onclick="antrian('K')" id="antrian('K')" class="col-lg-5 mt-3 btn btn-primary btn-lg wow fadeInUp">

                <h1>Antrian Kimia Farma</h1>
    
            </div>
            {{-- <a href="{{ route('antrian-baru.antrianbaru') }}" class="col-lg-5 mt-3 btn btn-primary btn-lg btn-block">Antrian Kimia Farma</a> --}}
          </div>
      </div>
    </div>
  </div>
@endsection

@push('customjs')
    <script>
        function antrian(kode){
          $.ajax({
              url: '/antrian-baru/' +kode,
              type: "GET",
              dataType: "html",
              success: function(data) {
                  alert('Berhasil Mengambil Antrian');
                  // console.log(nama);
              }
          });
        }
    </script>
@endpush