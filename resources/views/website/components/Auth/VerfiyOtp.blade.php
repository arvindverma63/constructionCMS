<style>
    .modal-content {
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .otp-input {
        width: 50px;
        height: 50px;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        border: 2px solid #ddd;
        border-radius: 8px;
        margin: 0 5px;
    }
    .otp-input:focus {
        border-color: #0d6efd;
        outline: none;
    }
    .resend-text {
        font-size: 14px;
        margin-top: 10px;
        color: #555;
    }
    .resend-btn {
        border: none;
        background: none;
        color: #0d6efd;
        font-weight: bold;
        cursor: pointer;
    }
    .resend-btn:disabled {
        color: #aaa;
        cursor: not-allowed;
    }
</style>

<!-- OTP Verification Modal -->
<div class="modal fade" id="otpModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">Verify OTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Enter the 4-digit OTP sent to your email</p>

                <!-- OTP Inputs -->
                <div class="d-flex justify-content-center">
                    <input type="text" class="otp-input form-control" maxlength="1" oninput="moveToNext(this, 'otp2')" id="otp1">
                    <input type="text" class="otp-input form-control" maxlength="1" oninput="moveToNext(this, 'otp3')" id="otp2">
                    <input type="text" class="otp-input form-control" maxlength="1" oninput="moveToNext(this, 'otp4')" id="otp3">
                    <input type="text" class="otp-input form-control" maxlength="1" id="otp4">
                </div>

                <!-- Verify Button -->
                <div class="mt-3">
                    <button type="button" class="btn btn-primary w-100" id="verifyOtpBtn" onclick="verifyOTP()">Verify OTP</button>
                </div>

                <!-- Resend OTP -->
                <div class="resend-text">
                    Didn't receive the OTP?
                    <button class="resend-btn" id="resendBtn" onclick="resendOTP()" disabled>Resend OTP in <span id="timer">30</span>s</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-move to next input on typing
    function moveToNext(current, nextID) {
        if (current.value.length === 1 && nextID) {
            document.getElementById(nextID).focus();
        }
    }

    // Verify OTP via AJAX
    function verifyOTP() {
        let otp = "";
        for (let i = 1; i <= 4; i++) {
            otp += document.getElementById("otp" + i).value;
        }

        if (otp.length !== 4) {
            alert("Please enter a valid 4-digit OTP.");
            return;
        }

        document.getElementById("verifyOtpBtn").innerText = "Verifying...";
        document.getElementById("verifyOtpBtn").disabled = true;

        fetch("/verify-otp", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ otp: otp })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("verifyOtpBtn").innerText = "Verify OTP";
            document.getElementById("verifyOtpBtn").disabled = false;

            if (data.success) {
                alert("OTP Verified Successfully!");
                window.location.href = data.redirect; // Redirect user to dashboard or user admin page
            } else {
                alert(data.message || "Invalid OTP, please try again.");
            }
        })
        .catch(error => {
            console.error("OTP verification error:", error);
            document.getElementById("verifyOtpBtn").innerText = "Verify OTP";
            document.getElementById("verifyOtpBtn").disabled = false;
            alert("Something went wrong. Please try again.");
        });
    }

    // Resend OTP Function
    function resendOTP() {
        document.getElementById("resendBtn").disabled = true;
        document.getElementById("resendBtn").innerText = "Resending...";

        fetch("/resend-otp", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("OTP Resent Successfully!");
                startResendTimer();
            } else {
                alert("Failed to resend OTP. Please try again later.");
                document.getElementById("resendBtn").disabled = false;
                document.getElementById("resendBtn").innerText = "Resend OTP";
            }
        })
        .catch(error => {
            console.error("OTP resend error:", error);
            alert("Something went wrong while resending OTP.");
            document.getElementById("resendBtn").disabled = false;
            document.getElementById("resendBtn").innerText = "Resend OTP";
        });
    }

    // Start countdown for resend button
    function startResendTimer() {
        let timer = 30;
        document.getElementById("timer").innerText = timer;
        document.getElementById("resendBtn").innerText = "Resend OTP in 30s";

        let countdown = setInterval(() => {
            timer--;
            document.getElementById("timer").innerText = timer;
            if (timer === 0) {
                clearInterval(countdown);
                document.getElementById("resendBtn").disabled = false;
                document.getElementById("resendBtn").innerText = "Resend OTP";
            }
        }, 1000);
    }

    // Start countdown when modal is opened
    document.getElementById("otpModal").addEventListener("shown.bs.modal", () => {
        startResendTimer();
    });
</script>
