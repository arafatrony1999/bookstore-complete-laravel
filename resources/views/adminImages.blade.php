@extends('layouts.adminLayout')
@section('content')
    <main class="admin_main">
        {{-- <div class="d-flex justify-content-center bs-spinner">
            <div class="spinner-border bs-spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
        </div> --}}

        <div class="first-group">
            <form action="/adminImageUpload" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="adminImageUpload" id="">
                <button type="submit" class="btn btn-info">Upload</button>
            </form>
        </div>

        <div class="image-container">
            
        </div>

    </main>
@endsection



@section('script')



@endsection