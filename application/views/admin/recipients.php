<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Recipient</title>
     
</head>

<body class="m-0 p-0 font-sans min-h-screen flex justify-center items-start bg-gradient-to-b from-[#87CEEB] via-[#e0f7fa] to-[#556B2F]">

    <!-- Main Container (Increased max-width to accommodate larger maps/photos) -->
    <div class="bg-white w-[95%] max-w-[1300px] mt-[50px] mb-[50px] p-10 rounded-lg shadow-2xl border-t-8 border-[#FF8C00]">

        <!-- Header -->
        <div class="mb-8 border-b-2 border-gray-100 pb-4">
            <h1 class="text-[#2E8B57] m-0 text-3xl font-bold">View Recipient</h1>
            <!-- PHP Variable check for display safety -->
            <h3 class="text-gray-600 mt-2 text-lg font-normal">
                Supporter: <span class="text-[#FF8C00] font-bold"><?php echo $supporter[0]['name'];?></span>
            </h3>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse mb-8 min-w-[1000px]" id="recipientTable">
                <thead>
                    <tr class="bg-[#2E8B57] text-white text-left">
                        <th class="p-4 border-b-2 border-gray-200 w-16">Sr.No</th>
                        <th class="p-4 border-b-2 border-gray-200">Recipient</th>
                        <th class="p-4 border-b-2 border-gray-200">School</th>
                        <th class="p-4 border-b-2 border-gray-200 w-24">Std</th>
                        <!-- Widen the location column -->
                        <th class="p-4 border-b-2 border-gray-200 w-64">Location</th>
                        <!-- Widen the photo column -->
                        <th class="p-4 border-b-2 border-gray-200 text-center w-48">Photo</th>
                        <th class="p-4 border-b-2 border-gray-200 text-center w-48">Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">

                    <?php
                    $i = 1;
                    if(isset($recipients) && is_array($recipients)) {
                        foreach ($recipients as $key => $value) {
                            // PHP: Construct Map URL
                            $locationUrl = "https://maps.google.com/maps?q=".$value["location"]."&t=&z=10&ie=UTF8&iwloc=&output=embed";
                    ?>
                        <!-- 'data-row' class for jQuery pagination -->
                        <tr class="data-row border-b border-gray-100 hover:bg-gray-50 transition-colors align-top">
                            <td class="p-4 text-gray-800 font-bold"><?php echo $i; ?></td>
                            
                            <td class="p-4">
                                <div class="text-gray-800 font-bold text-lg"><?php echo $value["studentName"]; ?></div>
                            </td>
                            
                            <td class="p-4 text-gray-600"><?php echo $value["schoolName"]; ?></td>
                            <td class="p-4 text-gray-600"><?php echo $value["standard"]; ?></td>

                            <!-- Map Location (Larger & Styled) -->
                            <td class="p-4">
                                <!-- <div class="mb-1 text-xs text-gray-500 truncate w-60"><?php echo $value["location"]; ?></div> -->
                                <!-- Increased height to h-32 (128px) and added rounded corners -->
                                <div class="border-2 border-[#87CEEB] rounded-lg overflow-hidden h-32 w-full shadow-sm">
                                    <iframe class="w-full h-full" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $locationUrl; ?>"></iframe>
                                </div>
                            </td>

                            <!-- Photo (Larger & Rectangular with rounded corners) -->
                            <td class="p-4 text-center">
                                <!-- Changed from rounded-full to rounded-lg, increased size to h-32/w-full to match map -->
                                <img src="<?php echo base_url('assets/images/'.$value["photoUrl"]); ?>" 
                                     alt="Recipient" 
                                     class="w-full h-32 object-cover rounded-lg border-2 border-gray-200 shadow-sm mx-auto">
                            </td>

                            <!-- Actions -->
                            <td class="p-4 text-center">
                                <div class="flex flex-col gap-2 justify-center h-full pt-6">
                                    <a href="<?php echo base_url('admin/add_recipients/'. $supporterId. '/'. $value["id"])?>"
                                       class="px-4 py-2 bg-[#4682B4] text-white rounded font-bold hover:brightness-95 transition text-sm text-center no-underline">
                                        Edit
                                    </a>
                                    <a 
                                    href="<?php echo base_url("admin/delete_recipient/".$supporterId.'/'.$value['id']);?>"
                                    class="px-4 py-2 bg-[#CD5C5C] text-white rounded font-bold hover:brightness-95 transition text-sm cursor-pointer border-none">
                                        Delete
                                    </a>
                                </div>
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

        <!-- Footer Actions (Add Button + Pagination) -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-5 pt-4">

            <!-- Add Recipient Button -->
            <div>
                <a href="<?php echo base_url('admin/add_recipients/'.$supporterId);?>" class="px-6 py-3 bg-[#FF8C00] text-white rounded-md font-bold shadow-md hover:bg-orange-600 transition cursor-pointer border-none text-base">
                    + Add Recipient
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
            const $rows = $tableBody.find('.data-row'); // Select by class to ensure specific targeting
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
                currentPage = 1; 
                renderTable();
            });

            // Initial render
            renderTable();
        });
    </script>

</body>

</html>