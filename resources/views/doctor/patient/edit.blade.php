@extends('layouts.app')
@section('title')
Edit Patient
@endsection

@section('breadcrumb1')
Patient Management
@endsection

@section('breadcrumb2')
Pages
@endsection

@section('breadcrumb3')
Patient
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-lg justify-content-center">
            <span class="font-weight-bold">
                Edit Patient Data
            </span>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('patient.update', $patient->id) }}" id="myForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control text-xs" id="name" name="name" value="{{ $patient->name }}" ariadescribedby="name">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="phone" class="form-control text-xs" id="phone" name="phone" value="{{ $patient->phone }}" ariadescribedby="phone">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="address" class="form-control text-xs" id="address" value="{{ $patient->address }}" ariadescribedby="address" name="address">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="age" class="form-control text-xs" id="age" value="{{ $patient->age }}" ariadescribedby="age" name="age">
                </div>
                <div class="mb-3">
                    <label for="profile" class="form-label">profile</label>
                    <input type="hidden" name="oldProfile" value="{{ $patient->profile }}">
                    @if($patient->profile)
                    <img src="{{ asset ('storage/' . $patient->profile) }}" class="profile-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                    <img class="profile-preview img-fluid mb-3 col-sm-5">
                    @endif

                    <input class="form-control" type="file" id="profile" name="profile" onchange="previewImage()">
                    @error('profile')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" class="form-control text-xs" id="username" name="username" value="{{ $patient->username }}" ariadescribedby="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control text-xs" id="password" name="password" value="{{ $patient->password }}" ariadescribedby="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#profile');
        const imgPreview = document.querySelector('.profile-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@stop