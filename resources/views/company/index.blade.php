@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            @if(empty($company->cover_photo))
            <img src="{{asset('cover\tumblr-image-sizes-banner.png')}}" style="width:100%;">
            @else
            <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%;">
            @endif
            <div class="company-desc">
                @if(empty($company->logo))
                <img src="{{asset('avatar/man.jpg')}}" class="rounded-circle" style="width: 10%;">
                @else
                <img src="{{asset('uploads/logo')}}/{{$company->logo}}" class="rounded-circle"
                    style="width: 10%;">
                    @endif
                    <p><br>{{ $company->description }}</p>
                    
                    <h1>{{ $company->cname }}</h1>
                <p>Slogan-{{ $company->slogan }}&nbsp;
                    Address-{{ $company->address }}&nbsp;
                    Phone-{{ $company->phone }}&nbsp;
                    Website{{ $company->website }}</p>
            </div>
        </div>
        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                @foreach ($company->jobs as $job)


                <tr>
                    <td>   @if(empty($company->logo))
                        <img width="100" src="{{asset('avatar/serwman1.jpg')}}">
                        @else
                        <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}">
                        @endif
                        
                    </td>
                    <td>Position: {{$job->position}}
                        <br>
                        <i class="fa fa-clock-o"></i>&nbsp;Fulltime
                    </td>
                    <td><i class="fa fa-map-marker"></i>&nbsp;Address: {{ $job->address }}</td>
                    <td><i class="fa fa-globe"></i>&nbsp;Date: {{ $job->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('jobs.show',[$job->id,$job->slug]) }}">
                            <button class="btn btn-success btn-sm">Apply</button>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>


@endsection
