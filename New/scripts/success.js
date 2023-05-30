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
function showSuccessRegisterModal(){
    $('#successRegisterModal').modal('show');
}
function showSuccessRegisterDrModal(){
    $('#successRegisterDrModal').modal('show');
}
function showSuccessDeleteModal(){
    $('#successDeleteModal').modal('show');
}
function showSuccessDeleteDrModal(){
    $('#successDeleteDrModal').modal('show');
}
function showSuccessAdminUpdateModal(){
    $('#successAdminUpdateModal').modal('show');
}
function showSuccessAdminUpdateDrModal(){
    $('#successAdminUpdateDrModal').modal('show');
}

$(document).ready(function () {
    // Check if the URL contains the success parameter
    const urlParams = new URLSearchParams(window.location.search);
    const successPassword = urlParams.get('successPassword');
    const successProfile = urlParams.get('successProfile');
    const successRequest = urlParams.get('successRequest');
    const successAssign = urlParams.get('successAssign');
    const successCancel = urlParams.get('successCancel');
    const successRegister = urlParams.get('successRegister');
    const successRegisterDr = urlParams.get('successRegisterDr');
    const successDelete = urlParams.get('successDelete');
    const successDeleteDr = urlParams.get('successDeleteDr');
    const successAdminUpdate = urlParams.get('successAdminUpdate');
    const successAdminUpdateDr = urlParams.get('successAdminUpdateDr');


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
    if (successRegister === 'true'){
        showSuccessRegisterModal();
    }
    if (successRegisterDr === 'true'){
        showSuccessRegisterDrModal();
    }

    if (successDelete === 'true'){
        showSuccessDeleteModal();
    }
    if (successDeleteDr === 'true'){
        showSuccessDeleteDrModal();
    }
    if (successAdminUpdate === 'true'){
        showSuccessAdminUpdateModal();
    }
    if (successAdminUpdateDr === 'true'){
        showSuccessAdminUpdateDrModal();
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

function closeSuccessRegisterModal(){
    $('#successRegisterModal').modal('hide');
}

function closeSuccessRegisterDrModal(){
    $('#successRegisterDrModal').modal('hide');
}

function closeSuccessDeleteModal(){
    $('#successDeleteModal').modal('hide');
}
function closeSuccessDeleteDrModal(){
    $('#successDeleteDrModal').modal('hide');
}
function closeSuccessAdminUpdateModal(){
    $('#successAdminUpdateModal').modal('hide');
}
function closeSuccessAdminUpdateDrModal(){
    $('#successAdminUpdateDrModal').modal('hide');
}