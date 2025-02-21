<style>
        .modal-content {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 10px;
        }
        .social-login {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .social-login a {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 1px solid #ddd;
            transition: 0.3s;
        }
        .social-login a:hover {
            background: #f8f9fa;
        }
        .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            font-weight: 500;
        }
        .nav-tabs .nav-link.active {
            border-bottom: 2px solid #0d6efd;
        }
    </style>

    @include('website.components.Auth.VerfiyOtp')
<!-- Authentication Modal -->
<div class="modal fade" id="authModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Authentication</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Tabs for Login & Signup -->
                <ul class="nav nav-tabs nav-justified" id="authTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginTab" type="button" role="tab">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signupTab" type="button" role="tab">Sign Up</button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="authTabsContent">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="loginTab" role="tabpanel">
                        <form>
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="loginEmail" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
                                    <span class="input-group-text" onclick="togglePassword('loginPassword', 'toggleLoginPassword')">
                                        <i class="fas fa-eye" id="toggleLoginPassword"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="#" class="text-decoration-none">Forgot password?</a>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </div>
                        </form>
                    </div>

                    <!-- Sign Up Form -->
                    <div class="tab-pane fade" id="signupTab" role="tabpanel">
                        <form>
                            <div class="mb-3">
                                <label for="signupName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="signupName" placeholder="Enter your full name" required>
                            </div>
                            <div class="mb-3">
                                <label for="signupEmail" class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="signupEmail" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="signupPassword" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="signupPassword" placeholder="Create a password" required>
                                    <span class="input-group-text" onclick="togglePassword('signupPassword', 'toggleSignupPassword')">
                                        <i class="fas fa-eye" id="toggleSignupPassword"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success w-100">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Social Login -->
                <div class="text-center mt-3">
                    <p>or continue with</p>
                    <div class="social-login">
                        <a href="#" class="text-dark"><i class="fab fa-google"></i></a>
                        <a href="#" class="text-dark"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("#loginTab form").addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent form from reloading the page

            let email = document.getElementById("loginEmail").value.trim();
            let password = document.getElementById("loginPassword").value.trim();

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
                    // Show OTP Modal
                    var authModal = new bootstrap.Modal(document.getElementById("authModal"));
                    authModal.hide();

                    var otpModal = new bootstrap.Modal(document.getElementById("otpModal"));
                    otpModal.show();
                } else {
                    alert(data.message || "Login failed. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Something went wrong. Please try again later.");
            });
        });
    });
</script>
<script>
    function togglePassword(passwordId, toggleIconId) {
        const passwordField = document.getElementById(passwordId);
        const toggleIcon = document.getElementById(toggleIconId);
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>
