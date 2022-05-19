@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form class="form-inline row " action="{{route('alljobs')}}" method="GET">


            <div class="input-group col">
                <input type="text" placeholder="Keyword" name="title" class="form-control">
            </div>
            <div class="input-group col">

                <select class="form-select" id="type" name="type">
                    <option value="">-Type-</option>
                    <option value="fulltime">fulltime</option>
                    <option value="parttime">parttime</option>
                    <option value="casual">casual</option>
                </select>

            </div>
            <div class="input-group col">

                <select class="form-select " id="category_id" name="type">
                    <option value="">-Category-</option>

                    @foreach(App\Models\Category::all() as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="input-group col">

                <input type="text" placeholder="Address" name="address" class="form-control">
            </div>


            <div class="form-group col-1">
                <button type="submit" class="btn btn-outline-success">Search</button>
            </div>

        </form>

        <table class="table">

            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="80"></td>
                    <td>{{$job->position}}
                        <br>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$job->address}}</td>
                    <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{$job->created_at->diffForHumans()}}
                    </td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm"> Apply
                            </button>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
       
    </div>

</div>




@endsection
<style>
    .fa {
        color: #4183D7;
    }

</style>
