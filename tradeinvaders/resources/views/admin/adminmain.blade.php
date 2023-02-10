@extends('layouts.admin')

@section('content')


    <div class="row">
        {{-- <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" alt="" class="w-100 rounded-circle">
        </div> --}}
        <div class="col-12 p-5">
            <h3>User Management {{ auth()->user()->id }}</h3>
            <div class="d-flex justify-content-between align-items-baseline">
                
                <div class="d-flex align-items-center pb-4">
                
                    
                 
                </div> 
                @if (Auth::user()->acct_type=='admin') 
                {{-- <a href="/p/create" class="btn btn-primary"> Add User</a>  --}}
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add User
                  </button>
                  
                  
                @endif
                @can('update', auth()->user()->id)
                 
                 @endcan
            </div>
            {{-- @can('update', $user->profile)
            
            
            @endcan --}}
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $user->count() }}</strong>&nbspUser</div>
                <div class="pr-3"><strong></strong>&nbspActive</div>
                <div class="pr-3"><strong></strong>&nbspInactive</div>
            </div>
            <table id="pogi1" class="table table-bordered table-responsive table-hover center">
                <thead class="userthead">
                    <tr>
                        <th >Full Name</th>
                        <th >Username</th>
                        <th >Email</th>
                        <th >Department</th>
                        <th >Account type</th>
                        <th >Created At</th>
                        <th >Updated At</th>
                        <th >action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alluser as $alluser)
                    <tr>
                        <td>{{ $alluser->name }}</td>
                        <td>{{ $alluser->username }}</td>
                        <td>{{ $alluser->email }}</td>
                        <td>{{ $alluser->department }}</td>
                        <td>{{ $alluser->acct_type }}</td>
                        <td>{{ $alluser->created_at }}</td>
                        <td>{{ $alluser->updated_at }}</td>
                        <td>
                            <div class="d-flex flex-row">
                            <a href="{{ url('/admin/' .$alluser->id. '/edit') }}"><button id="actionbutton" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                            <a href="{{ url('/admin/' .$alluser->id. '/edit') }}"><button id="actionbutton" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button></a>
                            <a href="{{ url('/admin/' .$alluser->id. '/delete') }}"  onclick="return confirm('Are you sure you want to delete this user?');"><button id="actionbutton" class="btn btn-danger btn-sm"><i class="fa-solid fa-user-slash"></i></button></a>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                   
                </tbody>
                
            </table>
        </div>
    </div>

    
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-4">
            <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <form method="POST" action="/admin/createuser">
            <div class="modal-body">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">User Name</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}"  autocomplete="department">

                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="acct_type" class="col-md-4 col-form-label text-md-right">Account Type</label>

                            <div class="col-md-6">
                            <select class="form-control @error('acct_type') is-invalid @enderror" id="text" name="acct_type" value="{{ old('acct_type') }}">
                            <option selected value="">Select Account Type</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            </select>
                           

                            @error('acct_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add new User</button>
            </div>
        </form>
          </div>
        </div>
      </div>

@endsection
