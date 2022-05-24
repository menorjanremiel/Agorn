@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(!empty(Auth::user()->profile->avatar))
            <img src="{{ asset('uploads/avatar/') }}/{{ Auth::user()->profile->avatar }}" class="rounded-circle"
                width="100" style="width: 100%">
            @else
            <img src="{{ asset('avatar/serwman1.jpg') }}" width="100" style="width: 100%">
            @endif


            <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <br>
                <div class="card">
                    <div class="card-header">Update Avatar</div>
                    <div class="card-body">
                        <input type="file" class="form-control {{ $errors->has('avatar') ? ' is-invalid' : '' }}"
                            name="avatar" id="">
                        <br>
                        <button class="btn btn-success float-end">Update</button>
                        @if ($errors->has('avatar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </form>
        </div>
        <div class="col-md-5">

            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Update Your Profile
                </div>
                <form method="POST" action="{{ route('profile.create') }}">
                    @csrf
                    <div class="card-body">



                        <div class="form-group py-2">
                            <label for="address">Address:</label>
                            <input type="text" name="address"
                                class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                value="{{ Auth::user()->profile->address }}">
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group py-2">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number"
                                class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                value="{{ Auth::user()->profile->phone_number }}">
                            @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group py-2">
                            <label for="experience">Experience:</label>
                            <textarea name="experience"
                                class="form-control {{ $errors->has('experience') ? ' is-invalid' : '' }}">{{ Auth::user()->profile->experience }}</textarea>
                            @if ($errors->has('experience'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('experience') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group py-2">
                            <label for="bio">Bio:</label>
                            <textarea name="bio"
                                class="form-control {{ $errors->has('bio') ? ' is-invalid' : '' }}">{{ Auth::user()->profile->bio }}</textarea>
                            @if ($errors->has('bio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bio') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <br>
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    About You
                </div>
                <div class="card-body">
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Address: {{ Auth::user()->profile->address }}</p>
                    <p>Phone Number: {{ Auth::user()->profile->phone_number }}</p>
                    <p>Gender: {{ Auth::user()->profile->gender }}</p>
                    <p>Experience: {{ Auth::user()->profile->experience }}</p>
                    <p>Bio: {{ Auth::user()->profile->bio }}</p>
                    <p>Member On: {{date('F d Y',strtotime( Auth::user()->created_at)) }}</p>

                    @if(!empty(Auth::user()->profile->cover_letter))
                    <p><a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Cover Letter</a></p>
                    @else
                    <p>Please upload cover letter</p>

                    @endif
                    @if(!empty(Auth::user()->profile->resume))
                    <p><a href="{{ Storage::url(Auth::user()->profile->resume) }}">Resume</a></p>
                    @else
                    <p>Please upload cover letter</p>

                    @endif
                </div>
            </div>
            <br>
            <form action="{{ route('cover.letter') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Upadate Coverletter
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control {{ $errors->has('cover_letter') ? ' is-invalid' : '' }}"
                            name="cover_letter" id="">
                        <br>
                        <button class="btn btn-success float-end">Update</button>
                        @if ($errors->has('cover_letter'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cover_letter') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </form>
            <br>
            <form action="{{ route('resume') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Update Resume</div>
                    <div class="card-body">
                        <input type="file" class="form-control {{ $errors->has('resume') ? ' is-invalid' : '' }}"
                            name="resume" id="">
                        <br>
                        <button class="btn btn-success float-end">Update</button>
                        @if ($errors->has('resume'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('resume') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection
