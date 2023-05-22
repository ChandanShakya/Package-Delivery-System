function showSuccessPasswordModal() {
    $('#successPasswordModal').modal('show');
}
function showSuccessProfileModal() {
    $('#successProfileModal').modal('show');
}
function showSuccessRequestModal(){
    $('#successRequestModal').modal('show');
}
function showSuccessAssignModal(){
    $('#successAssignModal').modal('show');
}
function showSuccessCancelModal(){
    $('#successCancelModal').modal('show');
}

$(document).ready(function () {
    // Check if the URL contains the success parameter
    const urlParams = new URLSearchParams(window.location.search);
    const successPassword = urlParams.get('successPassword');
    const successProfile = urlParams.get('successProfile');
    const successRequest = urlParams.get('successRequest');
    const successAssign = urlParams.get('successAssign');
    const successCancel = urlParams.get('successCancel');

    if (successPassword === 'true') {
        showSuccessPasswordModal();
    }
    if (successProfile === 'true') {
        showSuccessProfileModal();
    }
    if (successRequest === 'true'){
        showSuccessRequestModal();
    }
    if (successAssign === 'true'){
        showSuccessAssignModal();
    }
    if (successCancel === 'true'){
        showSuccessCancelModal();
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

function closeSuccessAssignModal(){
    $('#successAssignModal').modal('hide');
}

function closeSuccessCancelModal(){
    $('#successCancelModal').modal('hide');
}