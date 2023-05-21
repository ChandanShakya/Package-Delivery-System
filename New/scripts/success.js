
// Function to show the success modal
function showSuccessPasswordModal() {
    $('#successPasswordModal').modal('show');
}

// Function to show the success modal
function showSuccessProfileModal() {
    $('#successProfileModal').modal('show');
}
function showSuccessRequestModal(){
    $('#successRequestModal').modal('show');
}

$(document).ready(function () {
    // Check if the URL contains the success parameter
    const urlParams = new URLSearchParams(window.location.search);
    const successPassword = urlParams.get('successPassword');
    const successProfile = urlParams.get('successProfile');
    const successRequest = urlParams.get('successRequest');
    if (successPassword === 'true') {
        showSuccessPasswordModal();
    }
    if (successProfile === 'true') {
        showSuccessProfileModal();
    }
    if (successRequest === 'true'){
        showSuccessRequestModal();
    }
});

// on click of close button on success modal

function closeSuccessPasswordModal() {
    $('#successPasswordModal').modal('hide');
}

function closeSuccessProfileModal() {
    $('#successProfileModal').modal('hide');
}

function closeSuccessRequestModal(){
    $('#successRequestModal').modal('hide');
}