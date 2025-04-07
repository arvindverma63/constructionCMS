  // Preview Form Data
  document.getElementById('addContractorForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    let preview = '<div class="row g-3">';
    formData.forEach((value, key) => {
        if (key !== 'image' && value) {
            preview += `<div class="col-12 col-md-6"><strong>${key.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase())}:</strong> ${value}</div>`;
        }
    });
    preview += '</div>';
    if (formData.get('image')) {
        preview += '<div class="mt-3"><strong>Image:</strong> <span>Selected</span></div>';
    }
    document.getElementById('previewContent').innerHTML = preview;
    new bootstrap.Modal(document.getElementById('previewModal')).show();
});

// Submit from Preview Modal
document.getElementById('submitPreview').addEventListener('click', function() {
    document.getElementById('addContractorForm').submit();
});

// Checkbox Selection
document.getElementById('selectAll').addEventListener('change', function() {
    document.querySelectorAll('.contractorCheckbox').forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    // Note: 'deleteSelected' button is not present; adjust if needed
});

document.querySelectorAll('.contractorCheckbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // Note: 'deleteSelected' button is not present; adjust if needed
    });
});

// Table Search
document.getElementById('searchBtn').addEventListener('click', function() {
    const searchTerm = document.getElementById('searchTable').value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// Tooltip for Images
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
[...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

// Delete Confirmation
document.getElementById('confirmDelete').addEventListener('click', function() {
    const id = document.querySelector('[data-bs-target="#deleteModal"]').getAttribute('data-id');
    if (id) {
        window.location.href = `/delete/contractor/${id}`;
    }
});
