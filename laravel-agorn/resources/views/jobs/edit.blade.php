@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Update a job</div>
                <div class="card-body">

                    <form action="{{route('job.update',[$job->id])}}" method="POST">@csrf

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title"
                                class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                value="{{ $job->title}}">
                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="role">Description:</label>
                            <textarea name="description"
                                class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $job->description }}</textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="role">Role:</label>
                            <textarea name="roles"
                                class="form-control {{ $errors->has('roles') ? ' is-invalid' : '' }}">{{ $job->roles}}</textarea>
                            @if ($errors->has('roles'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category_id" class="form-select">
                                @foreach(App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}" {{$cat->id==$job->category_id?'selected':''}}>
                                    {{$cat->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" name="position"
                                class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}"
                                value="{{ $job->position}}">
                            @if ($errors->has('position'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('position') }}</strong>
                            </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address"
                                class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                value="{{ $job->address}}">
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="number_of_vacancy">No of vacancy:</label>
                            <input type="text" name="number_of_vacancy"
                                class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}"
                                value="{{ $job->number_of_vacancy }}">
                            @if ($errors->has('number_of_vacancy'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="experience">Year of experience:</label>
                            <input type="text" name="experience"
                                class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"
                                value="{{ $job->experience }}">
                            @if ($errors->has('experience'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('experience') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender:</label>

                            <select class="form-select" name="gender">
                                <option value="any" {{$job->gender=='any'?'selected':''}}>Any</option>
                                <option value="male" {{$job->gender=='male'?'selected':''}}>Male</option>
                                <option value="female" {{$job->gender=='female'?'selected':''}}>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="salary">Salary/year:</label>
                            <select class="form-select" name="salary">
                                <option value="negotiable">Negotiable</option>
                                <option value="2000-5000"{{$job->salary=='2000-5000'?'selected':''}}>2000-5000</option>
                                <option value="50000-10000"{{$job->salary=='50000-100000'?'selected':''}}>5000-10000</option>
                                <option value="10000-20000"{{$job->salary=='10000-20000'?'selected':''}}>10000-20000</option>
                                <option value="30000-500000"{{$job->salary=='50000-500000'?'selected':''}}>50000-500000</option>
                                <option value="500000-600000"{{$job->salary=='500000-600000'?'selected':''}}>500000-600000</option>

                                <option value="600000 plus">600000 plus</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select class="form-select" name="type">
                                <option value="fulltime" {{$job->type=='fulltime'?'selected':''}}>Fulltime</option>
                                <option value="partime" {{$job->type=='partime'?'selected':''}}>Partime</option>
                                <option value="casual" {{$job->type=='casual'?'selected':''}}>Casual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-select" name="status">
                                <option value="1" {{$job->status=='1'?'selected':''}}>Live</option>
                                <option value="0" {{$job->status=='0'?'selected':''}}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="lastdate">Last date:</label>
                            <input type="date" name="last_date"
                                class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}"
                                value="{{ $job->last_date }}">
                            @if ($errors->has('last_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_date') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>




                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
