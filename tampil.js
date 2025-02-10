
    $(document).ready(function() {
        // Initialize the DataTable (ensure the table has data)
        var table = $('#data-table').DataTable(); // Use .DataTable() to initialize

        // Initially hide the search input using jQuery
        $('#search').css('display', 'none');

        // Link the search input to DataTable search
        $('#search').on('keyup', function() {
            // Trigger the DataTable search when typing into the hidden input
            table.search(this.value).draw();
        });

        // Show the search box on a specific condition or action (optional)
        // Example: $('#search').css('display', 'inline'); to show it later
    });
