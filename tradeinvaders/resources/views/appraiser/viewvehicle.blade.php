@extends('layouts.appraiser')

@section('content')
<div class="container">
    <div class="col-12 grid-margin">
        <div id="" class="card">
          <div class="card-header bg-dark text-white">
              <h4 class="card-title"><i class="fa fa-users"></i> Customer Data</h4>
          </div>
          <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
              <p class="card-description">
                Personal info
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name:</label>
                    <div class="col-sm-9">
                      <input id="name" readonly type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $customer->CustomerName }}"  autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contact No.</label>
                    <div class="col-sm-9">
                      <input id="contact" readonly type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $customer->Contact }}"  autocomplete="contact">
                      @error('contact')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                      <select readonly class="form-control @error('Gender') is-invalid @enderror" id="Gender" name="Gender" value="{{ old('Gender') }}">
                        <option selected readonly value="">{{ $customer->gender }}</option>
                      </select>
                        @error('Gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                      <input id="birthday" readonly type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $customer->birthday }}"  autocomplete="birthday">
                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
              
              <p class="card-description">
                Address
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <input id="address" readonly type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $customer->address }}"  autocomplete="address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Barangay</label>
                    <div class="col-sm-9">
                      <input id="baranggay" readonly type="text" class="form-control @error('baranggay') is-invalid @enderror" name="baranggay" value="{{ $customer->baranggay }}"  autocomplete="baranggay">
                        @error('baranggay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                      <input id="City" readonly type="text" class="form-control @error('City') is-invalid @enderror" name="City" value="{{ $customer->city }}"  autocomplete="City">
                        @error('City')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Province</label>
                    <div class="col-sm-9">
                      <input id="Province" readonly type="text" class="form-control @error('Province') is-invalid @enderror" name="Province" value="{{ $customer->province }}"  autocomplete="Province">
                        @error('Province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
            {{-- <div  style="float: right;" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> --}}
            </form>
          </div>
        </div>
       
        <div class="card mt-4">
          <div class="card-header bg-dark text-white">
            <h4 class="card-title"><i class="fas fa-car"></i> Customer Vehicle</h4>
          </div>
          @foreach ($vehicles as $vehicle)
          <div id="accordion">
            <div class="card mb-2 mt-2">
              <div class="card-header bg-light" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne{{ $vehicle->id }}" aria-expanded="true" aria-controls="collapseOne">
                    <h3><i class="fas fa-car-side"></i> {{ $vehicle->unit }}</h3>
                  </button>
                </h5>
              </div>
              <div id="collapseOne{{ $vehicle->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body bg-light p-5" style="animation: fadeIn 0.5s ease-in;">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="/storage/{{ $vehicle->carimage }}" alt="Vehicle Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                      <h4><i class="fas fa-car"></i> {{ $vehicle->brand }}</h4>
                      <h5 class="mb-2">Unit: {{ $vehicle->unit }}</h5>
                      <h5 class="mb-2">Plate No.: {{ $vehicle->plateno }}</h5>
                      <h5 class="mb-2">Variant: {{ $vehicle->variant }}</h5>
                      <h5 class="mb-2">Year Model: {{ $vehicle->yearmodel }}</h5>
                      <h5 class="mb-2">Trade-in Value: {{ $vehicle->tvalue }}</h5>
                      <h5 class="mb-2">Customer Price: {{ $vehicle->customerprice }}</h5>
                      <h5 class="mb-2">Marketing Professional: {{ $vehicle->mp }}</h5>
                      <h5 class="mb-2">Group Sales Manager: {{ $vehicle->grm }}</h5>
                      
                      
                    @if (isset($vehicle->VehicleStatus) && $vehicle->VehicleStatus->status !== null)
                   
                    @else
                    <p>Vehicle status not available</p>
                    <a href="{{ url('/appraiser/trade-in/' .$vehicle->id. '/process') }}">
                      <button class="btn btn-primary float-right mt-2" id="process-btn" style="animation: pulse 1.5s infinite;">
                        <i class="fas fa-spinner "></i> Process
                      </button>
                    </a>
                    @endif
                    </div>

                    @if (isset($vehicle->VehicleStatus) && $vehicle->VehicleStatus->status !== null)
                    <div class="col-md-12 center mt-3">
                      <h4 class="mb-2" style="color: green; font-weight:600;">The vehicle has already been processed</h4>
                      <h5 style="color: green; font-weight:600;" >Vehicle status: {{ $vehicle->VehicleStatus->status }}</h5>
                    </div>
                    @endif
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>


      </div>
      

        
    </div>
    
</div>

@endsection
