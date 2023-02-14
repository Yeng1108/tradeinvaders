@extends('layouts.appraiser')

@section('content')
<div class="container">
    <h3>Customer Data</h3>
    <div  class="row justify-content-center">
        <div class="col-4 pt-5">
            <a href="{{ url('/appraiser/addcustomer') }}"><button class="btn btn-info btn-md"><i class="fa-solid fa-user-plus"> Add Record</i></button></a>
         
        </div>
        <div class="col-8 p-5">
            <i id="customersearch"class="fa-solid fa-magnifying-glass"></i><input type="text" id="myInput" class="form-control" placeholder="Search Now">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <table id="pogi1" class="table table-bordered table-responsive-xl table-hover center">
                <thead class="userthead">
                    <tr>
                        <th>AssignVehicle</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>birthday</th>
                        {{-- <th>Unit</th>
                        <th>YrModel</th> --}}
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allcustomer as $customer) 
                    <tr>
                        <td><a href="{{ url('/appraiser/'.$customer->id.'/assignvehicle') }}"><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-car"></i> </a></td>
                        <td>{{ $customer->CustomerName }}</td>
                        <td>{{ $customer->Contact }}</td>
                        <td>{{ $customer->birthday }}</td>
                        {{-- <td>{{ $customer->CustomerName }}</td>
                        <td>{{ $customer->CustomerName }}</td> --}}
                        <td>
                            <div class="d-flex flex-row">
                            <a href="{{ url('/admin//edit') }}"><button id="actionbutton" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                            <a href="{{ url('/admin//edit') }}"><button id="actionbutton" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button></a>
                            <a href="{{ url('/admin//delete') }}"  onclick="return confirm('Are you sure you want to delete this user?');"><button id="actionbutton" class="btn btn-danger btn-sm"><i class="fa-solid fa-user-slash"></i></button></a>
                            </div>
                        </td>
                        
                    </tr>
                   @endforeach
                   
                </tbody>
                
            </table>
        </div>
    </div>
    
    
    
</div>

@endsection
