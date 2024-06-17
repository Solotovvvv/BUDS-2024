const form = document.getElementById('form');
const busName = document.getElementById('busName');
const BusinessLogo = document.getElementById('BusinessLogo');
const BusinessEmail = document.getElementById('BusinessEmail');
const BusinessBranch = document.getElementById('BusinessBranch');
const BusinessEstablish = document.getElementById('BusinessEstablish');
const BusinessCapital = document.getElementById('BusinessCapital');
const BusinessDescrip = document.getElementById('BusinessDescrip');
const BusinessNumber = document.getElementById('BusinessNumber');
const BusinessOpenHour = document.getElementById('BusinessOpenHour');
const BusinessCloseHour = document.getElementById('BusinessCloseHour');
const BusinessAddress = document.getElementById('BusinessAddress');
const BusinessZone = document.getElementById('BusinessZone');
const BusinessDistrict = document.getElementById('BusinessDistrict');
const filter = document.getElementById('filter');
const BusinessFb = document.getElementById('BusinessFb');
const BusinessIg = document.getElementById('BusinessIg');
const BusinessTiktok = document.getElementById('BusinessTiktok');
const category = document.getElementById('category');
const subcategory = document.getElementById('subcategory');
const uploadBrgyClearance = document.getElementById('uploadBrgyClearance');
const uploadDTIPermit = document.getElementById('uploadDTIPermit');
const uploadSanitaryPermit = document.getElementById('uploadSanitaryPermit');
const uploadCedula = document.getElementById('uploadCedula');
const uploadBusinessPermit = document.getElementById('uploadBusinessPermit');

form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
});


const setError = (element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');

}
const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');

}
const validateInputs = () => {
    const busNameValue = busName.value.trim();
    const BusinessLogoValue = BusinessLogo.value.trim();
    const BusinessEmailValue = BusinessEmail.value.trim();
    const BusinessBranchValue = BusinessBranch.value.trim();
    const BusinessEstablishValue = BusinessEstablish.value.trim();
    const BusinessCapitalValue = BusinessCapital.value.trim();
    const BusinessDescripValue = BusinessDescrip.value.trim();
    const BusinessNumberValue = BusinessNumber.value.trim();
    const BusinessOpenHourValue = BusinessOpenHour.value.trim();
    const BusinessCloseHourValue = BusinessCloseHour.value.trim();
    const BusinessAddressValue = BusinessAddress.value.trim();
    const BusinessZoneValue = BusinessZone.value.trim();
    const BusinessDistrictValue = BusinessDistrict.value.trim();
    const filterValue = filter.value.trim();
    const BusinessFbValue = BusinessFb.value.trim();
    const BusinessIgValue = BusinessIg.value.trim();
    const BusinessTiktokValue = BusinessTiktok.value.trim();
    const categoryValue = category.value.trim();
    const subcategoryValue = subcategory.value.trim();
    const uploadBrgyClearanceValue = uploadBrgyClearance.value.trim();
    const uploadDTIPermitValue = uploadDTIPermit.value.trim();
    const uploadSanitaryPermitValue  = uploadSanitaryPermit.value.trim();
    const uploadCedulaValue = uploadCedula.value.trim();
    const uploadBusinessPermitValue = uploadBusinessPermit.value.trim();

    if(busNameValue === ''){
        setError(busName, 'Name of business is required');
    }else{
        setSuccess(busName);
    }

}