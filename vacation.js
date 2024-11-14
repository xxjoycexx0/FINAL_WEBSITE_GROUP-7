document.addEventListener('DOMContentLoaded', function () {
    const selectButtons = document.querySelectorAll('.select-button');
    const inquireButtons = document.querySelectorAll('.inquire-button');
    const roomSelectionModal = document.getElementById('room-selection-modal');
    const inquiryModal = document.getElementById('inquiry-modal');
    const closeButtons = document.querySelectorAll('.close-button');
    const roomButtons = document.querySelectorAll('.room-button');
    const selectedRoomsTableBody = document.querySelector('#selected-rooms-table tbody');
    const selectedRoomsInput = document.getElementById('selected_rooms_input');
    const selectedHotelInput = document.getElementById('selected_hotel');

    // Added: Search input
    const searchInput = document.getElementById('searchInput');

    let currentHotel = '';
    let selectedRooms = [];

    // Manage "Select" buttons
    selectButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            selectButtons.forEach(btn => btn.classList.remove('selected'));
            inquireButtons.forEach(btn => btn.disabled = true);
            button.classList.add('selected');
            inquireButtons[index].disabled = false;
            currentHotel = button.parentElement.querySelector('h3').textContent;
            selectedHotelInput.value = currentHotel;
        });
    });

    // Manage "Inquire" buttons
    inquireButtons.forEach((button) => {
        button.addEventListener('click', () => {
            inquiryModal.classList.remove('hidden');
            selectedRoomsInput.value = JSON.stringify(selectedRooms);
        });
    });

    // Room selection functionality
    roomButtons.forEach(button => {
        button.addEventListener('click', () => {
            const roomName = button.getAttribute('data-room');
            if (!selectedRooms.includes(roomName)) {
                selectedRooms.push(roomName);
                updateSelectedRoomsTable();
            }
            roomSelectionModal.classList.remove('hidden');
        });
    });

    // Manage "View Notes" buttons with SweetAlert
    const toggleNotesButtons = document.querySelectorAll('.toggle-notes');

    toggleNotesButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const notesDiv = button.parentElement.querySelector('.notes');
            Swal.fire({
                title: "Notes",
                html: notesDiv.innerHTML, // Use inner HTML for content
                icon: "info",
                confirmButtonText: "Close"
            });
        });
    });

    // Close modal functionality
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            inquiryModal.classList.add('hidden');
            roomSelectionModal.classList.add('hidden');
        });
    });

    // Handle form submission for inquiry
    const inquiryForm = document.querySelector('#inquiry-form');
    inquiryForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(inquiryForm);

        fetch('process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            Swal.fire({
                title: "Booking created successfully!",
                icon: "success"
            });
            inquiryModal.classList.add('hidden');
            inquiryForm.reset();
            selectedRooms = [];
            updateSelectedRoomsTable();
        })
        .catch(error => {
            Swal.fire({
                title: "Error!",
                text: "Something went wrong. Please try again.",
                icon: "error"
            });
        });
    });

    function updateSelectedRoomsTable() {
        selectedRoomsTableBody.innerHTML = '';
        selectedRooms.forEach(room => {
            const row = document.createElement('tr');
            const cell = document.createElement('td');
            cell.textContent = room;
            row.appendChild(cell);
            selectedRoomsTableBody.appendChild(row);
        });
        selectedRoomsInput.value = JSON.stringify(selectedRooms);
    }

    // Live search functionality
    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();
        const hotelCards = document.querySelectorAll('.hotel-card');

        hotelCards.forEach(card => {
            const hotelName = card.querySelector('h3').textContent.toLowerCase();
            if (hotelName.includes(searchTerm)) {
                card.style.display = "flex"; // Show the card if matched
            } else {
                card.style.display = "none"; // Hide the card if not matched
            }
        });
    });
});
