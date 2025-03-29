<!-- Social Login Modal -->
<style>
    /* Remove any blur filters if present */
    .modal,
    .modal-backdrop {
      filter: none !important;
      backdrop-filter: none !important;
    }
  </style>
  <!-- Social Login Modal -->
  <div class="modal fade" id="socialLoginModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="socialLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="socialLoginModalLabel">Sign in with Social</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Body -->
        <div class="modal-body text-center">
          <p>Choose your preferred social platform to continue:</p>
          <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('auth.google') }}" class="btn btn-outline-danger">
              <i class="fab fa-google me-2"></i> Google
            </a>
            <a href="/properties" class="btn btn-outline-primary">
              <i class="fab fa-facebook-f me-2"></i> Facebook
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
