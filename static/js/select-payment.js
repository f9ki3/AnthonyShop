
document.addEventListener('DOMContentLoaded', function() {
    // Get the elements
    const codRadio = document.getElementById('cod');
    const gcashRadio = document.getElementById('gcash');
    const gcashDiv = document.getElementById('g-cash-div');

    // Show G-Cash div when G-Cash is selected, hide it otherwise
    gcashRadio.addEventListener('change', function() {
      if (gcashRadio.checked) {
        gcashDiv.style.display = 'block'; // Show G-Cash section
      }
    });

    codRadio.addEventListener('change', function() {
      if (codRadio.checked) {
        gcashDiv.style.display = 'none'; // Hide G-Cash section
      }
    });

    // Ensure the default selection shows the correct div on page load
    if (codRadio.checked) {
      gcashDiv.style.display = 'none'; // Hide G-Cash section
    }
  });