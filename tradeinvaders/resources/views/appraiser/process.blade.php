@extends('layouts.appraiser')

@section('content')
<div class="container">
    <h3>Processing of Trade-In</h3>
    <div class="row justify-content-center">
        <div class="col-4 pt-5">
            
        </div>
        <div class="col-8 p-5 d-flex align-items-center">
            {{-- <form action="/appraiser/search" method="GET" class="w-100"> --}}
                <div class="input-group">
                    <input type="text" name="search_tradein" id="search_tradein" class="form-control" placeholder="Search Now">
                    
                    {{-- <div class="input-group-append">
                        <button id="buttoncustsearch" class="btn btn-primary" type="submit">Search</button>
                    </div> --}}
                </div>
                <i id="customersearch" class="fa-solid fa-magnifying-glass"></i>
            {{-- </form> --}}
        </div>
    </div> 

    @if (session('success'))
    <div id="alertbox" class="float-right alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-12">
            <h3 align="left">Total Data : <span id="total_tradein"></span></h3>
            <table id="pogi1" class="table table-bordered table-responsive-xl table-hover center">
              <thead class="userthead">
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>birthday</th>
                    <th>Plate</th>
                    <th>YrModel</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead >
            <tbody id="tradeinlist">

            </tbody>
        </table>
        <div class="row float-right">
        
        </div>
            
        </div>
    </div>
    
    
    
</div>

@endsection
