@extends('layouts.appraiser')

@section('content')
<div class="container">
    <div class="col-12 grid-margin">
        <div id="" class="card">
          <div class="card-body">
            <h4 class="card-title">Customer Data</h4>
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
    </div>
    <div class="col-12 grid-margin mt-3">
     
      <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa-sharp fa-solid fa-plus"></i> Vehicle
      </a>
   
      <div class="collapse card mt-3" id="collapseExample">
        <div class="card-body">
          <h4 class="card-title">Customer Vehicle</h4>
          <form method="post" action="/appraiser/{{ $customer->id }}/assigned" enctype="multipart/form-data">
            @csrf
          <p class="card-description">
            vehicle info 
          </p>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Car Image:</label>
                <div class="col-sm-5 ml-3">
                  <input type="file" class="custom-file-input @error('carimage') is-invalid @enderror" name="carimage" id="customFile"> <label class="custom-file-label" for="customFile">Upload Car Image</label>
                    @error('carimage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Unit:</label>
                <div class="col-sm-9">
                  <input id="unit" type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}"  autocomplete="unit">
                    @error('unit')
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
                <label class="col-sm-3 col-form-label">Plate Number:</label>
                <div class="col-sm-9">
                  <input id="plateno" type="text" class="form-control @error('plateno') is-invalid @enderror" name="plateno" value="{{ old('plateno') }}"  autocomplete="plateno">
                    @error('plateno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Brand</label>
                <div class="col-sm-9">
                  <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}"  autocomplete="brand">
                  @error('brand')
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
                <label class="col-sm-3 col-form-label">Variant</label>
                <div class="col-sm-9">
                  <input id="variant" type="text" class="form-control @error('variant') is-invalid @enderror" name="variant" value="{{ old('variant') }}"  autocomplete="variant">
                    @error('variant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Year Model</label>
                <div class="col-sm-9">
                  <select class="form-control @error('yearmodel') is-invalid @enderror" id="yearmodel" name="yearmodel" value="{{ old('yearmodel') }}">
                    <option disabled selected value="">Select Year Model</option>
                    @for ($year = date('Y'); 1995 <= $year; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                  </select>
                    @error('yearmodel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            </div>
          </div>
          <p class="card-description">
            Trade-In Details
          </p>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Trade-in Value</label>
                <div class="col-sm-9">
                  <input id="tvalue" type="number" class="form-control @error('tvalue') is-invalid @enderror" name="tvalue" value="{{ old('tvalue') }}"  autocomplete="tvalue">
                    @error('tvalue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Customer Price</label>
                <div class="col-sm-9">
                  <input id="customerprice" type="number" class="form-control @error('customerprice') is-invalid @enderror" name="customerprice" value="{{ old('customerprice') }}"  autocomplete="customerprice">
                    @error('customerprice')
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
                <label class="col-sm-3 col-form-label">MP</label>
                <div class="col-sm-9">
                  <input id="mp" type="text" class="form-control @error('mp') is-invalid @enderror" name="mp" value="{{ old('mp') }}"  autocomplete="mp">
                    @error('mp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">GRM</label>
                <div class="col-sm-9">
                  <input id="grm" type="text" class="form-control @error('grm') is-invalid @enderror" name="grm" value="{{ old('grm') }}"  autocomplete="grm">
                    @error('grm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            </div>
          </div>
        <div  style="float: right;" >
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
        </div>
      </div>

     
    </div>
</div>

@endsection
