@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">@foreach($applicant as $applicant)
                <div class="card-header">{{ $applicant->title }}</div>

                <div class="card-body">

                    <table class="table"> 


                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Bio</th>
                                <th>CV</th>
                                <th>Resume</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicant->users as $user)
                            <tr>
                                <td> <img src="{{ asset('uploads/avatar/') }}/{{ $user->profile->avatar }}"
                                        class="rounded-circle" width="50"></td>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{$user->profile->address }}</td>
                         
                                <td>{{ $user->profile->bio }}</td>
                            

                                @if(!empty($user->profile->cover_letter))
                                <td><a href="{{ Storage::url($user->profile->cover_letter) }}">Cover Letter</a></td>
                                @else
                                <td>N/A</td>

                                @endif
                                @if(!empty($user->profile->resume))
                                <td><a href="{{ Storage::url($user->profile->resume) }}">Resume</a></td>
                                @else
                                <td>N/A</td>

                                @endif
                            </tr>
                            @endforeach
                         
                        </tbody>
                    </table>

                </div>
         
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
