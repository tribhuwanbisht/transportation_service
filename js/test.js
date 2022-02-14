"Use strict";


const stateArr = new Array("Andaman & Nicobar", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra & Nagar Haveli", "Daman & Diu", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu & Kashmir", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Pondicherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Tripura", "Uttar Pradesh", "Uttarakhand", "West Bengal");

const stateSelectElement = document.querySelector('#countrySelect')
console.log(stateSelectElement.innerHTML);
stateSelectElement.innerHTML = `<option value="" disabled selected>Choose State</option>`;
stateArr.forEach(element => {
    const html = `<option value="${element}">${element}</option>`
    stateSelectElement.insertAdjacentHTML('beforeend', html);
});
console.log(stateSelectElement.innerHTML);