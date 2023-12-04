
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form method="post" action="{{ route('verify.otp.submit') }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <label for="otp">Enter OTP:</label>
    <input type="text" id="otp" name="otp" required>
    <button type="submit">Verify OTP</button>
</form>
