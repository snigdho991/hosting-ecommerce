<div class="tile">
    <form action="{{ route('admin.profile.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Update Profile</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="name">Name</label>
                <input
                    class="form-control @error('name') is-invalid @enderror"
                    type="text"
                    placeholder="Enter Name"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                />
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    value="{{ old('email', $user->email) }} " placeholder="E-mail Address">
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('email') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            {{-- <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                    value="{{ old('password', $user->password) }} " placeholder="Password">
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Confirm Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password_confirmation" id="password-confirm" placeholder="Confirm Password"
                    value="{{ old('password', $user->password) }} " required autocomplete="new-password">
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
                </div>
            </div> --}}
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                </div>
            </div>
        </div>
    </form>
</div>