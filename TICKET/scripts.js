document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('searchForm')) {
        populateRegions();
        
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            searchBuses();
        });
    }

    if (document.getElementById('customerForm')) {
        document.getElementById('customerForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch('submit_customer_info.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = `payment.html?booking_id=${data.booking_id}`;
}
});
});
}
});
