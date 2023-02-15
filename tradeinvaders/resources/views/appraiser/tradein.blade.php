@extends('layouts.appraiser')

@section('content')
<div class="container">
    <h3>Customer Data</h3>
    <div class="row justify-content-center">
        <div class="col-4 pt-5">
            <a href="{{ url('/appraiser/addcustomer') }}">
                <button class="btn btn-info btn-md">
                  <i class="fa-solid fa-user-plus"></i> Add Record
                </button>
              </a>
        </div>
        <div class="col-8 p-5 d-flex align-items-center">
            {{-- <form action="/appraiser/search" method="GET" class="w-100"> --}}
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Now">
                    
                    {{-- <div class="input-group-append">
                        <button id="buttoncustsearch" class="btn btn-primary" type="submit">Search</button>
                    </div> --}}
                </div>
                <i id="customersearch" class="fa-solid fa-magnifying-glass"></i>
            {{-- </form> --}}
        </div>
    </div> 
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 align="left">Total Data : <span id="total_records"></span></h3>
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
                </thead >
                <tbody id="users-list">
                    {{-- @foreach($allcustomer as $customer) 
                    <tr>
                        <td><a href="{{ url('/appraiser/'.$customer->id.'/assignvehicle') }}"><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-car"></i> </a> &nbsp; ({{ $customer->vehicles()->count() }})</td>
                        <td>{{ $customer->CustomerName }}</td>
                        <td>{{ $customer->Contact }}</td>
                        <td>{{ $customer->birthday }}</td>
                        <td>
                            <div class="d-flex flex-row">
                            <a href="{{ url('/admin//edit') }}"><button id="actionbutton" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                            <a href="{{ url('/admin//edit') }}"><button id="actionbutton" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button></a>
                            <a href="{{ url('/admin//delete') }}"  onclick="return confirm('Are you sure you want to delete this user?');"><button id="actionbutton" class="btn btn-danger btn-sm"><i class="fa-solid fa-user-slash"></i></button></a>
                            </div>
                        </td>
                        
                    </tr>
                   @endforeach --}}
                   
                </tbody>
                
            </table>
        </div>
    </div>
    
    
    
</div>

@endsection
