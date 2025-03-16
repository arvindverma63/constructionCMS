document.addEventListener("DOMContentLoaded", function () {
  // --------- LOGIN FUNCTIONALITY ----------
  const loginForm = document.querySelector("#loginTab form");
  if (!loginForm) {
    console.error("Login form not found.");
    return;
  }

  loginForm.addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent form from reloading the page

    const emailElem = document.getElementById("loginEmail");
    const passwordElem = document.getElementById("loginPassword");
    const email = emailElem ? emailElem.value.trim() : "";
    const password = passwordElem ? passwordElem.value.trim() : "";

    if (!email || !password) {
      alert("Please fill in both fields.");
      return;
    }

    fetch("/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify({ email, password })
    })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      if (data.success) {
        // Hide the Authentication Modal
        const authModalEl = document.getElementById("authModal");
        if (authModalEl) {
          const authModal = new bootstrap.Modal(authModalEl);
          authModal.hide();
        } else {
          console.error("Authentication modal element not found.");
        }

        // Show the OTP Modal
        const otpModalEl = document.getElementById("otpModal");
        if (otpModalEl) {
          const otpModal = new bootstrap.Modal(otpModalEl);
          otpModal.show();
        } else {
          console.error("OTP modal element not found.");
        }
      } else {
        // Show error message in a dedicated element if available
        const errorElem = document.getElementById("errorMessage");
        if (errorElem) {
          errorElem.innerText = data.message || "Login failed. Please try again.";
        } else {
          alert(data.message || "Login failed. Please try again.");
        }
      }
    })
    .catch(error => {
      console.error("Login error:", error);
      alert("Something went wrong. Please try again later.");
    });
  });

  // --------- OTP FUNCTIONALITY ----------
  // Auto-move to next input on typing
  window.moveToNext = function (current, nextID) {
    if (current.value.length === 1 && nextID) {
      const nextElem = document.getElementById(nextID);
      if (nextElem) {
        nextElem.focus();
      }
    }
  };

  // Verify OTP via AJAX
  window.verifyOTP = function () {
    let otp = "";
    for (let i = 1; i <= 4; i++) {
      const otpField = document.getElementById("otp" + i);
      if (otpField) {
        otp += otpField.value;
      }
    }

    if (otp.length !== 4) {
      alert("Please enter a valid 4-digit OTP.");
      return;
    }

    const verifyOtpBtn = document.getElementById("verifyOtpBtn");
    if (verifyOtpBtn) {
      verifyOtpBtn.innerText = "Verifying...";
      verifyOtpBtn.disabled = true;
    }

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
      if (verifyOtpBtn) {
        verifyOtpBtn.innerText = "Verify OTP";
        verifyOtpBtn.disabled = false;
      }

      if (data.success) {
        alert("OTP Verified Successfully!");
        window.location.href = data.redirect;
      } else {
        alert(data.message || "Invalid OTP, please try again.");
      }
    })
    .catch(error => {
      console.error("OTP verification error:", error);
      if (verifyOtpBtn) {
        verifyOtpBtn.innerText = "Verify OTP";
        verifyOtpBtn.disabled = false;
      }
      alert("Something went wrong. Please try again.");
    });
  };

  // Resend OTP Function
  window.resendOTP = function () {
    const resendBtn = document.getElementById("resendBtn");
    if (resendBtn) {
      resendBtn.disabled = true;
      resendBtn.innerText = "Resending...";
    }

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
        if (resendBtn) {
          resendBtn.disabled = false;
          resendBtn.innerText = "Resend OTP";
        }
      }
    })
    .catch(error => {
      console.error("OTP resend error:", error);
      alert("Something went wrong while resending OTP.");
      if (resendBtn) {
        resendBtn.disabled = false;
        resendBtn.innerText = "Resend OTP";
      }
    });
  };

  // Start countdown for resend button
  window.startResendTimer = function () {
    let timer = 30;
    const timerSpan = document.getElementById("timer");
    const resendBtn = document.getElementById("resendBtn");

    if (timerSpan) {
      timerSpan.innerText = timer;
    }
    if (resendBtn) {
      resendBtn.innerText = "Resend OTP in 30s";
    }

    const countdown = setInterval(function () {
      timer--;
      if (timerSpan) {
        timerSpan.innerText = timer;
      }
      if (timer <= 0) {
        clearInterval(countdown);
        if (resendBtn) {
          resendBtn.disabled = false;
          resendBtn.innerText = "Resend OTP";
        }
      }
    }, 1000);
  };

  // Start countdown when the OTP modal is opened
  const otpModalEl = document.getElementById("otpModal");
  if (otpModalEl) {
    otpModalEl.addEventListener("shown.bs.modal", function () {
      startResendTimer();
    });
  }

  // --------- PASSWORD TOGGLE FUNCTION ----------
  window.togglePassword = function (passwordId, toggleIconId) {
    const passwordField = document.getElementById(passwordId);
    const toggleIcon = document.getElementById(toggleIconId);
    if (!passwordField || !toggleIcon) {
      console.error("Password field or toggle icon not found.");
      return;
    }
    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
      passwordField.type = "password";
      toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
    }
  };
});
