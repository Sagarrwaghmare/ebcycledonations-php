<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

</head>

<body class="m-0 p-0 font-sans min-h-screen flex justify-center items-start bg-gradient-to-b from-[#87CEEB] via-[#e0f7fa] to-[#556B2F]">

    <!-- Main Container -->
    <div class="bg-white w-[90%] max-w-[900px] mt-[50px] mb-[50px] p-10 rounded-lg shadow-2xl border-t-8 border-[#FF8C00]">

        <!-- Header -->
        <div class="mb-8 flex justify-between items-end">
            <div>
                <h1 class="text-[#2E8B57] m-0 text-3xl font-bold">Dashboard - Admin</h1>
                <p class="text-gray-600 mt-1 text-sm">Manage supporters and donation records.</p>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse mb-8" id="supporterTable">
                <thead>
                    <tr class="bg-[#2E8B57] text-white text-left">
                        <th class="p-4 border-b-2 border-gray-200">Sr.No</th>
                        <th class="p-4 border-b-2 border-gray-200">Supporter</th>
                        <th class="p-4 border-b-2 border-gray-200">Donations</th>
                        <!-- 2. & 3. Actions Column Merged -->
                        <th class="p-4 border-b-2 border-gray-200 text-center w-64">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    $i = 1;
                    // Check if variable exists to prevent PHP errors in this raw HTML view
                    if (isset($supporters) && is_array($supporters)) {
                        foreach ($supporters as $key => $value) {
                    ?>
                            <!-- Added class 'data-row' for jQuery targeting -->
                            <tr class="data-row border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="p-3 text-gray-800"><?php echo $i; ?></td>
                                <td class="p-3 text-gray-800 font-medium"><?php echo $value["name"]; ?></td>
                                <td class="p-3 text-gray-800"><?php echo $value["total_donation"]; ?></td>

                                <!-- 3. Edit & Delete moved here next to View -->
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

            <!-- 4. Pagination & Select Input -->
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

                // Don't show numbers if only 1 page (optional, removed for consistency)
                // if (totalPages <= 1) return; 

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