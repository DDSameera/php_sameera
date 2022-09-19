@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Add Sales Representative</h5>
        <div class="card-body">
            <form action="{{route('salesrep.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="container h-100">
                        <div class="d-flex h-100">

                            <div class="align-self-end ml-auto">
                                <a href="{{route('salesrep.index')}}" type="button" class="btn btn-dark">
                                    Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-10">


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Full Name"
                                       value="{{old('name')}}">


                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" placeholder="Email Address"
                                       value="{{old('email')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" name="telephone" class="form-control" placeholder="Telephone"
                                       value="{{old('telephone')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Joined Date</label>
                            <div class="col-sm-10">
                                <input type="text" name="joined_date" class="form-control" placeholder="Joined Date"
                                       value="{{old('joined_date')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Current Routes</label>
                            <div class="col-sm-10">
                                <select name="route_id" class="form-control">
                                    @foreach($routes as $r)
                                        <option  value="{{$r->id}}">{{$r->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Comments</label>
                            <div class="col-sm-10">
                                <textarea name="comments" class="form-control">
                                 {{old('comments')}}
                                </textarea>
                            </div>
                        </div>


                    </div>
                    <div class="container h-100">
                        <div class="d-flex h-100">

                            <div class="align-self-end ml-auto">
                                <button type="submit" class="btn btn-dark">Save Record</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
