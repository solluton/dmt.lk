<?php
// DataTables CSS and JS includes
?>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<!-- Custom DataTables Configuration -->
<script>
$(document).ready(function() {
    // Default DataTable configuration
    $.extend(true, $.fn.dataTable.defaults, {
        responsive: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "No entries available",
            infoFiltered: "(filtered from _MAX_ total entries)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });

    // Initialize Contact Leads Table
    if ($('#contactLeadsTable').length) {
        $('#contactLeadsTable').DataTable({
            order: [[4, 'desc']], // Sort by date column (index 4) descending
            columnDefs: [
                {
                    targets: [3], // Status column
                    render: function(data, type, row) {
                        // Don't modify the display, let the original HTML render as-is
                        return data;
                    }
                },
                {
                    targets: [5], // Action column
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        // Don't modify the display, let the original HTML render as-is
                        return data;
                    }
                }
            ],
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="fi fi-rr-file-excel me-1"></i>Export Excel',
                    className: 'btn btn-success btn-sm'
                },
                {
                    extend: 'csv',
                    text: '<i class="fi fi-rr-file-csv me-1"></i>Export CSV',
                    className: 'btn btn-info btn-sm'
                }
            ]
        });
    }

    // Initialize Blog Posts Table
    if ($('#blogPostsTable').length) {
        $('#blogPostsTable').DataTable({
            order: [[5, 'desc']], // Sort by updated date descending
            columnDefs: [
                { 
                    targets: [6], // Actions column
                    orderable: false,
                    searchable: false
                },
                {
                    targets: [2], // Popular column
                    render: function(data, type, row) {
                        // Don't modify the display, let the original HTML render as-is
                        return data;
                    }
                },
                {
                    targets: [3], // Status column
                    render: function(data, type, row) {
                        // Don't modify the display, let the original HTML render as-is
                        return data;
                    }
                }
            ],
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="fi fi-rr-file-excel me-1"></i>Export Excel',
                    className: 'btn btn-success btn-sm'
                }
            ]
        });
    }

    // Initialize Blog Categories Table
    if ($('#blogCategoriesTable').length) {
        $('#blogCategoriesTable').DataTable({
            order: [[3, 'desc']], // Sort by created date descending
            columnDefs: [
                { 
                    targets: [4], // Actions column
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

    // Initialize URL Redirects Table
    if ($('#urlRedirectsTable').length) {
        $('#urlRedirectsTable').DataTable({
            order: [[4, 'desc']], // Sort by created date descending
            columnDefs: [
                { 
                    targets: [5], // Actions column
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

    // Initialize Email Queue Tables
    if ($('#pendingEmailsTable').length) {
        $('#pendingEmailsTable').DataTable({
            order: [[5, 'asc']], // Sort by scheduled date ascending
            columnDefs: [
                {
                    targets: [4], // Priority column
                    render: function(data, type, row) {
                        // Don't modify the display, let the original HTML render as-is
                        return data;
                    }
                }
            ]
        });
    }

    if ($('#recentEmailsTable').length) {
        $('#recentEmailsTable').DataTable({
            order: [[5, 'desc']], // Sort by created date descending
            columnDefs: [
                {
                    targets: [1], // Status column
                    render: function(data, type, row) {
                        // Don't modify the display, let the original HTML render as-is
                        return data;
                    }
                }
            ]
        });
    }

    // Initialize Legal Pages Table
    if ($('#legalPagesTable').length) {
        $('#legalPagesTable').DataTable({
            order: [[0, 'asc']], // Sort by page name ascending
            columnDefs: [
                {
                    targets: [1], // Type column
                    render: function(data, type, row) {
                        // Don't modify the display, let the original HTML render as-is
                        return data;
                    }
                },
                {
                    targets: [3], // Actions column
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        // Don't modify the display, let the original HTML render as-is
                        return data;
                    }
                }
            ],
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="fi fi-rr-file-excel me-1"></i>Export Excel',
                    className: 'btn btn-success btn-sm'
                }
            ]
        });
    }
});

// Custom styling for DataTables
document.addEventListener('DOMContentLoaded', function() {
    // Add custom classes to DataTables elements
    const style = document.createElement('style');
    style.textContent = `
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            margin-left: 0.5rem;
        }
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            margin: 0 0.5rem;
        }
        .dataTables_wrapper .dataTables_info {
            padding-top: 0.75rem;
        }
        .dataTables_wrapper .dataTables_paginate {
            padding-top: 0.5rem;
        }
        
        /* Reset DataTables pagination to use Bootstrap pagination styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.375rem 0.75rem !important;
            margin-left: 0.125rem !important;
            border: 1px solid #dee2e6 !important;
            border-radius: 0.375rem !important;
            background: white !important;
            color: #0d6efd !important;
            text-decoration: none !important;
            display: inline-block !important;
            line-height: 1.5 !important;
        }
        
        /* Reset anchor elements inside pagination buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button a {
            padding: 0 !important;
            margin: 0 !important;
            border: none !important;
            background: transparent !important;
            color: inherit !important;
            text-decoration: none !important;
        }
        
        /* Active page styling with multiple selectors for better compatibility */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:focus,
        .dataTables_wrapper .dataTables_paginate .current,
        .dataTables_wrapper .dataTables_paginate .current:hover {
            background-color: #0d6efd !important;
            background: #0d6efd !important;
            color: white !important;
            border-color: #0d6efd !important;
            border: 1px solid #0d6efd !important;
        }
        
        /* Ensure text inside active buttons is white */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current a,
        .dataTables_wrapper .dataTables_paginate .current a,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current span,
        .dataTables_wrapper .dataTables_paginate .current span {
            color: white !important;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
            background: #e9ecef !important;
            border-color: #adb5bd !important;
            color: #0d6efd !important;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background: white !important;
            color: #6c757d !important;
            border-color: #dee2e6 !important;
            cursor: not-allowed !important;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
            background: white !important;
            color: #6c757d !important;
            border-color: #dee2e6 !important;
        }
        
        /* Remove extra padding from pagination container */
        .dataTables_wrapper .dataTables_paginate .pagination {
            margin: 0 !important;
            padding: 0 !important;
        }
        
        /* Preserve original badge and button styling */
        .dataTables_wrapper .badge {
            display: inline-block !important;
            padding: 0.35em 0.65em !important;
            font-size: 0.75em !important;
            font-weight: 700 !important;
            line-height: 1 !important;
            color: #fff !important;
            text-align: center !important;
            white-space: nowrap !important;
            vertical-align: baseline !important;
            border-radius: 0.375rem !important;
        }
        
        /* Preserve button styling */
        .dataTables_wrapper .btn {
            display: inline-block !important;
            font-weight: 400 !important;
            line-height: 1.5 !important;
            color: #212529 !important;
            text-align: center !important;
            text-decoration: none !important;
            vertical-align: middle !important;
            cursor: pointer !important;
            border: 1px solid transparent !important;
            padding: 0.375rem 0.75rem !important;
            font-size: 1rem !important;
            border-radius: 0.375rem !important;
        }
        
        /* Improve action button hover states for better contrast */
        .dataTables_wrapper .btn-outline-primary:hover {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
            color: white !important;
        }
        
        .dataTables_wrapper .btn-outline-danger:hover {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
            color: white !important;
        }
        
        .dataTables_wrapper .btn-outline-warning:hover {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
            color: #000 !important;
        }
        
        .dataTables_wrapper .btn-outline-info:hover {
            background-color: #0dcaf0 !important;
            border-color: #0dcaf0 !important;
            color: #000 !important;
        }
        
        .dataTables_wrapper .btn-outline-success:hover {
            background-color: #198754 !important;
            border-color: #198754 !important;
            color: white !important;
        }
        
        .dataTables_wrapper .btn-outline-secondary:hover {
            background-color: #6c757d !important;
            border-color: #6c757d !important;
            color: white !important;
        }
        
        /* Small button variants */
        .dataTables_wrapper .btn-sm:hover {
            transform: none !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
        }
        
        /* Don't let DataTables override table cell content */
        .dataTables_wrapper td .badge,
        .dataTables_wrapper td .btn {
            margin: 0 !important;
        }
        
        /* Additional active page selectors for different DataTables versions */
        .dataTables_wrapper .dataTables_paginate .pagination .page-item.active .page-link,
        .dataTables_wrapper .dataTables_paginate .pagination .active,
        .dataTables_wrapper .dataTables_paginate span.current {
            background-color: #0d6efd !important;
            color: white !important;
            border-color: #0d6efd !important;
        }
        
        /* Force active state on all possible elements */
        .dataTables_wrapper .dataTables_paginate [aria-current="page"] {
            background-color: #0d6efd !important;
            color: white !important;
            border-color: #0d6efd !important;
        }
        
        /* Fix overflow issues in modals and containers */
        .modal .dataTables_wrapper {
            overflow-x: auto !important;
        }
        
        .modal .dataTables_wrapper .dataTables_scroll {
            overflow-x: auto !important;
        }
        
        .modal .table-responsive {
            overflow-x: auto !important;
            max-width: 100% !important;
        }
        
        /* Fix single row table overflow */
        .dataTables_wrapper .dataTables_scrollBody {
            overflow-x: auto !important;
            overflow-y: visible !important;
        }
        
        /* Ensure table fits in modal */
        .modal-dialog .dataTables_wrapper table {
            width: 100% !important;
            table-layout: auto !important;
        }
        
        /* Fix pagination in modals */
        .modal .dataTables_wrapper .dataTables_paginate {
            overflow: visible !important;
            white-space: nowrap !important;
        }
        
        /* Responsive table in modals */
        .modal .table-responsive .dataTables_wrapper {
            min-height: auto !important;
        }
        
        /* Make main content fill available height */
        .main-wrapper {
            min-height: 100vh !important;
            display: flex !important;
        }
        
        #edash-main {
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
            min-height: 100vh !important;
        }
        
        .edash-page-container {
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
        }
        
        .edash-container {
            flex: 1 !important;
        }
        
        /* Ensure cards and content stretch to fill space */
        .card {
            height: auto !important;
        }
        
        .card-body {
            flex: 1 !important;
        }
    `;
    document.head.appendChild(style);
});
</script>
