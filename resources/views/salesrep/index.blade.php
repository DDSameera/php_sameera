@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Sales Team</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Current Route</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($salesRep as $sr)
                    <form action="{{route('salesrep.destroy',$sr->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <tr>
                            <td>{{$sr->id}}</td>
                            <td>{{$sr->name}}</td>
                            <td>{{$sr->email}}</td>
                            <td>{{$sr->telephone}}</td>
                            <td>{{$sr->route_id}}</td>
                            <td>
                                <a id="myModal" class="btn btn-primary btn-sm view" href="#"
                                   data-srid="{{$sr->id}}">View</a>
                                <a class="btn btn-info btn-sm" href="{{route('salesrep.edit',$sr->id)}}">Edit</a>

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                            </td>
                        </tr>
                    </form>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>




    <!-- Data Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-secondary text-white ">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_sp_name"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 bg-secondary text-white ">
                    <div class="col-12">
                        <table class="table  table-borderless">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="modal_sr_id"></td>
                            </tr>
                            <tr>
                                <td>Full Name</td>
                                <td id="modal_sr_fullname"></td>
                            </tr>
                            <tr>
                                <td>Email Adress</td>
                                <td id="modal_sr_email"></td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td id="modal_sr_tp"></td>
                            </tr>
                            <tr>
                                <td>Joined Date</td>
                                <td id="modal_sr_joindate"></td>
                            </tr>
                            <tr>
                                <td>Current Routes</td>
                                <td id="modal_sr_route"></td>
                            </tr>
                            <tr>
                                <td>Comments</td>
                                <td id="modal_sr_comments"></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Data Modal -->
@endsection
