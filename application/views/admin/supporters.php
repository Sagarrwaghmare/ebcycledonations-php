<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title> 
</head>

<!-- Changed body layout to flex-col to stack Navbar on top of Content -->
<body class="m-0 p-0 font-sans min-h-screen flex flex-col items-center bg-gradient-to-b from-[#87CEEB] via-[#e0f7fa] to-[#556B2F]">

    <!-- 1. Header Navbar -->
    <nav class="w-full bg-white shadow-md border-b-4 border-[#FF8C00] px-6 py-3 flex justify-between items-center sticky top-0 z-50">
        
        <!-- Left Side: Home Icon & Page Info -->
        <div class="flex items-center gap-4">
            <!-- Home Icon -->
            <a href="<?php echo base_url('admin'); ?>" class="text-[#2E8B57] hover:text-[#FF8C00] transition transform hover:scale-110" title="Go Home">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>

            <!-- Separator Line (Visual) -->
            <div class="h-8 w-px bg-gray-300 mx-1"></div>

            <!-- Page Info (Moved from inside the card) -->
            <div>
                <h1 class="text-[#2E8B57] m-0 text-xl font-bold leading-tight">Dashboard - Admin</h1>
                <p class="text-gray-500 m-0 text-xs">Manage supporters and donation records.</p>
            </div>
        </div>

        <!-- Right Side: Logout Button -->
        <div>
            <a href="<?php echo base_url('admin/logout'); ?>" class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white text-sm font-bold rounded hover:bg-red-600 transition shadow-sm no-underline">
                <!-- Logout Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </a>
        </div>
    </nav>

    <!-- Main Container -->
    <!-- Removed border-t-8 since navbar has a border now, adjusted margins -->
    <div class="bg-white w-[90%] max-w-[900px] mt-8 mb-10 p-8 rounded-lg shadow-2xl">

        <!-- Old Header removed from here, contents moved to Navbar -->

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse mb-8" id="supporterTable">
                <thead>
                    <tr class="bg-[#2E8B57] text-white text-left">
                        <th class="p-4 border-b-2 border-gray-200">Sr.No</th>
                        <th class="p-4 border-b-2 border-gray-200">Supporter</th>
                        <th class="p-4 border-b-2 border-gray-200">Donations</th>
                        <th class="p-4 border-b-2 border-gray-200 text-center w-64">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    $i = 1;
                    if (isset($supporters) && is_array($supporters)) {
                        foreach ($supporters as $key => $value) {
                    ?>
                            <tr class="data-row border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="p-3 text-gray-800"><?php echo $i; ?></td>
                                <td class="p-3 text-gray-800 font-medium"><?php echo $value["name"]; ?></td>
                                <td class="p-3 text-gray-800"><?php echo $value["total_donation"]; ?></td>

                                <td class="p-3 text-center flex justify-center gap-2">
                                    <a href="<?php echo base_url('admin/recipients/' . $value["id"]); ?>"
                                        class="px-3 py-1.5 bg-[#87CEEB] text-[#003366] rounded text-sm font-bold hover:brightness-95 transition no-underline inline-block">
                                        View
                                    </a>
                                    <a href="<?php echo base_url('admin/add_supporters/' . $value["id"]); ?>"
                                        class="px-3 py-1.5 bg-[#4682B4] text-white rounded text-sm font-bold hover:brightness-95 transition cursor-pointer border-none">
                                        Edit
                                    </a>
                                    <a href="<?php echo base_url('admin/delete_supporter/'. $value["id"])?>" class="px-3 py-1.5 bg-[#696969] text-white rounded text-sm font-bold hover:brightness-95 transition cursor-pointer border-none">
                                        Delete
                                    </a >
                                </td>
                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Footer Actions (Buttons + Pagination) -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-5">

            <!-- Global Action -->
            <div>
                <a href="<?php echo base_url("admin/add_supporters/");?>" class="px-5 py-2.5 bg-[#FF8C00] text-white rounded font-bold shadow-sm hover:bg-orange-600 transition cursor-pointer border-none">
                    Add New
                </a>
            </div>

            <!-- Pagination & Select Input -->
            <div class="flex items-center gap-4 text-gray-800 font-bold">

                <!-- Rows Per Page Select -->
                <div class="flex items-center gap-2 text-sm font-normal">
                    <label for="rowsPerPage">Rows:</label>
                    <select id="rowsPerPage" class="border border-gray-300 rounded p-1 text-sm bg-white focus:outline-none focus:border-[#2E8B57]">
                        <option value="2">2</option>
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="all">All</option>
                    </select>
                </div>

                <!-- Page Numbers -->
                <div id="paginationNumbers" class="flex gap-1">
                    <!-- jQuery will inject buttons here -->
                </div>
            </div>

        </div>

    </div>

    <!-- jQuery Logic for Pagination -->
    <script>
        $(document).ready(function() {
            // Cache DOM elements
            const $tableBody = $('#tableBody');
            const $rows = $tableBody.find('tr');
            const $select = $('#rowsPerPage');
            const $paginationContainer = $('#paginationNumbers');

            let currentPage = 1;

            // Function to render table based on pagination settings
            function renderTable() {
                const limitVal = $select.val();
                const totalRows = $rows.length;

                // Handle "All" selection
                if (limitVal === 'all') {
                    $rows.show();
                    $paginationContainer.empty();
                    return;
                }

                const limit = parseInt(limitVal);
                const totalPages = Math.ceil(totalRows / limit);

                // Reset to page 1 if current page is out of bounds
                if (currentPage > totalPages && totalPages > 0) {
                    currentPage = 1;
                }

                // Hide all rows initially
                $rows.hide();

                // Calculate range
                const start = (currentPage - 1) * limit;
                const end = start + limit;

                // Show rows within range
                $rows.slice(start, end).show();

                // Generate pagination buttons
                renderPagination(totalPages);
            }

            // Function to create pagination buttons
            function renderPagination(totalPages) {
                $paginationContainer.empty();

                for (let i = 1; i <= totalPages; i++) {
                    // Determine styles for active vs inactive buttons
                    let classes = "px-3 py-1 rounded cursor-pointer transition select-none ";
                    if (i === currentPage) {
                        classes += "bg-[#FF8C00] text-white";
                    } else {
                        classes += "hover:bg-gray-200 text-gray-700";
                    }

                    const $btn = $('<span>', {
                        text: i,
                        class: classes,
                        click: function() {
                            currentPage = i;
                            renderTable();
                        }
                    });

                    $paginationContainer.append($btn);
                }
            }

            // Event listener for Select change
            $select.on('change', function() {
                currentPage = 1; // Reset to first page when changing view limit
                renderTable();
            });

            // Initial render
            renderTable();
        });
    </script>

</body>

</html>