@extends('layouts.appraiser')

@section('content')
<div class="container">
    <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Customer Data</h4>
            <form method="post" action="/appraiser/createcustomer" enctype="multipart/form-data">
                @csrf
              <p class="card-description">
                Personal info
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name:</label>
                    <div class="col-sm-9">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name">
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
                      <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">
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
                      <select class="form-control @error('Gender') is-invalid @enderror" id="Gender" name="Gender" value="{{ old('Gender') }}">
                        <option selected value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
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
                      <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}"  autocomplete="birthday">
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
                      <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address">
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
                    <label class="col-sm-3 col-form-label">Baranggay</label>
                    <div class="col-sm-9">
                      <input id="baranggay" type="text" class="form-control @error('baranggay') is-invalid @enderror" name="baranggay" value="{{ old('baranggay') }}"  autocomplete="baranggay">
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
                      <input id="City" type="text" class="form-control @error('City') is-invalid @enderror" name="City" value="{{ old('City') }}"  autocomplete="City">
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
                      <input id="Province" type="text" class="form-control @error('Province') is-invalid @enderror" name="Province" value="{{ old('Province') }}"  autocomplete="Province">
                        @error('Province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
            <div  style="float: right;" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
        </div>
        
    </div>
</div>

@endsection
