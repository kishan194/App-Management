<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600">
                Ensure your account is using a long, random password to stay secure
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

         <div class="col-md-6">
             <div class="form-group">
            <label for="update_password_current_password">Current_Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
            @error('current_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
           </div>

         <div class="col-md-6">
              <div class="form-group">
              <label for="update_password_password">New Password</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
             @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
              <label for="update_password_password_confirmation">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
            @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>

         <div class="d-flex justify-content">
          <button type="submit" class="btn btn-primary" style="width: 100px;margin-left:5px;">Save</button>
                </div>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
