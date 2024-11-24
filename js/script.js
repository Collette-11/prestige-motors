// Function for Vehicle Search
function searchVehicles() {
    var input = document.getElementById('searchInput').value.toUpperCase();
    var vehicles = document.getElementsByClassName('vehicle-card');
    for (var i = 0; i < vehicles.length; i++) {
        var vehicleName = vehicles[i].getElementsByTagName('h3')[0];
        if (vehicleName) {
            var textValue = vehicleName.textContent || vehicleName.innerText;
            if (textValue.toUpperCase().indexOf(input) > -1) {
                vehicles[i].style.display = "";
            } else {
                vehicles[i].style.display = "none";
            }
        }
    }
}

// Function to open the modal with car details
function openModal(carName, carDescription, carImage) {
    document.getElementById('carName').textContent = carName;
    document.getElementById('carDescription').textContent = carDescription;
    document.getElementById('carImage').src = carImage;
    document.getElementById('carModal').style.display = "block";
}

// Function to close the modal
function closeModal() {
    document.getElementById('carModal').style.display = "none";
}

// Form validation for login
function validateForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    if (email == "" || password == "") {
        alert("Please fill out all fields.");
        return false;
    }
    return true;
}
