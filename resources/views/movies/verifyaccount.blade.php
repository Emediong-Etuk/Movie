
<div class="container">
        <div class="email-verification">
            <h3> Email Verification</h3>
        </div>

        <form action="{{route('verifyotp')}}" method='post' >
            @csrf
            <div class="inputs">
                <label for="">Enter OTP</label>
                <input type="number" name="otp" placeholder="Enter OTP">
                <button type="submit">Submit</button>
            </div>
        </form>
</div>
