<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Supporter</title> 
</head>

<body class="m-0 p-0 font-sans min-h-screen flex flex-col items-center bg-gradient-to-b from-[#87CEEB] via-[#e0f7fa] to-[#556B2F]">

    <?php
    // --- 1. LOGIC HANDLER ---
    
    // Default values (Create Mode)
    $isCreate = true;
    $supporterId = '';
    $supporterName = '';
    $pageTitle = 'Add New Supporter';
    $pageDesc = 'Enter details below to generate a QR code.';
    $btnText = 'Save Supporter';

    // Check if data exists and if we are in edit mode
    if (isset($data)) {
        if (isset($data['create']) && $data['create'] === false) {
            $isCreate = false;
            $pageTitle = 'Edit Supporter';
            $pageDesc = 'Update supporter details and regenerate QR.';
            $btnText = 'Update Supporter';

            // Extract supporter details if available
            if (isset($data['supporter']) && !empty($data['supporter'][0])) {
                $supp = $data['supporter'][0];
                $supporterId = $supp['id'] ?? '123'; 
                $supporterName = $supp['name'] ?? 'John Doe';
            }
        }
    }

    // Construct the URL for the QR code
    $qrDataUrl = base_url('supporter/' . ($supporterId ?: ''));
    ?>

    <!-- 2. Header Navbar -->
    <nav class="w-full bg-white shadow-md border-b-4 border-[#FF8C00] px-6 py-3 flex justify-between items-center sticky top-0 z-50">
        
        <!-- Left Side: Home Icon & Page Info -->
        <div class="flex items-center gap-4">
            <!-- Home Icon -->
            <a href="<?php echo base_url('admin'); ?>" class="text-[#2E8B57] hover:text-[#FF8C00] transition transform hover:scale-110" title="Go Home">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>

            <!-- Separator Line -->
            <div class="h-8 w-px bg-gray-300 mx-1"></div>

            <!-- Page Info (Dynamic Title) -->
            <div>
                <h1 class="text-[#2E8B57] m-0 text-xl font-bold leading-tight"><?php echo $pageTitle; ?></h1>
                <p class="text-gray-500 m-0 text-xs"><?php echo $pageDesc; ?></p>
            </div>
        </div>

        <!-- Right Side: Logout Button -->
        <div class="flex flex-row justify-center items-center space-x-4">

            <a href=<?php echo base_url('admin/admins/1'); ?>>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd" />
                </svg>
            </a>

            <a href="<?php echo base_url('admin/logout'); ?>"
                class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white text-sm font-bold rounded hover:bg-red-600 transition shadow-sm no-underline">
                <!-- Logout Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </a>
        </div>
    </nav>

    <!-- Main Card Container -->
    <!-- Removed border-t-8, added mt-8 -->
    <div class="bg-white w-[90%] max-w-[900px] p-10 rounded-lg shadow-2xl mt-8 mb-10">

        <!-- Old Header removed, title moved to Navbar -->

        <!-- Content Wrapper -->
        <div class="flex flex-col md:flex-row gap-10">

            <!-- LEFT COLUMN: Form Inputs -->
            <div class="flex-1 min-w-[300px]">
                <form action="<?php echo base_url('admin/add_update_supporter/'.$supporterId)?>" method="POST"
                class="h-full flex flex-col justify-around "
                >
                    
                    <!-- Supporter Name -->
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-gray-800 font-bold">Supporter Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="<?php echo htmlspecialchars($supporterName); ?>" 
                            placeholder="Enter full name" 
                            class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700 placeholder-gray-400"
                        >
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-4">
                        <!-- JS Trigger for QR -->
                        <button type="button" onclick="generateQR()" class="flex-1 py-3 px-4 bg-[#4682B4] text-white rounded font-bold hover:bg-[#36648b] transition cursor-pointer">
                            Generate QR
                        </button>
                        <!-- Submit Form -->
                        <button type="submit" class="flex-1 py-3 px-4 bg-[#FF8C00] text-white rounded font-bold shadow-md hover:bg-orange-600 transition cursor-pointer">
                            <?php echo $btnText; ?>
                        </button>
                    </div>

                </form>
            </div>

            <!-- RIGHT COLUMN: QR Display -->
            <div class="w-full md:w-[250px] flex flex-col items-center justify-start md:border-l md:border-gray-100 md:pl-8 mt-8 md:mt-0">
                
                <h3 class="text-gray-800 text-xl font-bold mb-4">QR Preview</h3>
                
                <!-- QR Box -->
                <div class="w-[200px] h-[200px] bg-white border-2 border-[#2E8B57] rounded-lg flex items-center justify-center mb-6 shadow-lg p-2">
                    <!-- Dynamic QR Code Image -->
                    <img id="qrImage" 
                         src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=<?php echo urlencode($qrDataUrl); ?>" 
                         alt="QR Code" 
                         class="w-full h-full opacity-90"
                    >
                </div>

                <!-- Download Button -->
                <button onclick="downloadQR()" class="w-[200px] py-2.5 bg-white text-gray-700 border-2 border-gray-500 rounded font-bold hover:bg-gray-50 transition flex items-center justify-center gap-2 cursor-pointer">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Download QR
                </button>

            </div>

        </div>
    </div>

    <!-- JavaScript to handle QR Code generation and download -->
    <script>
        // Pass PHP variables to JavaScript
        const BASE_URL = '<?php echo base_url(); ?>';
        const SUPPORTER_ID = '<?php echo $supporterId; ?>';

        function generateQR() {
            const supporterName = document.getElementById('name').value;
            const qrImage = document.getElementById('qrImage');

            // Check if a supporter ID exists (i.e., we are in "edit" mode)
            if (SUPPORTER_ID.trim() !== "") {
                const qrData = `${BASE_URL}supporter/${SUPPORTER_ID}`;
                qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=${encodeURIComponent(qrData)}`;
            } else if (supporterName.trim() !== "") {
                // In "add" mode, you might want to encode the name as a placeholder
                // or wait for an ID to be assigned. Here, we'll use the name.
                qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=${encodeURIComponent(supporterName)}`;
            } else {
                alert("Please enter a supporter name first.");
            }
        }

        async function downloadQR() {
            const qrImage = document.getElementById('qrImage');
            const supporterName = document.getElementById('name').value.trim();
            const fileName = supporterName ? `${supporterName.replace(/ /g, '_')}_QR.png` : 'supporter_QR.png';

            try {
                // Fetch the image from the source URL
                const response = await fetch(qrImage.src);
                const blob = await response.blob();

                // Create a temporary link element to trigger the download
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = fileName;
                
                // Append to body, click, and then remove
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                // Clean up the object URL
                URL.revokeObjectURL(link.href);

            } catch (error) {
                console.error('Failed to download QR code:', error);
                alert('Could not download the QR code. Please try again.');
            }
        }
    </script>

</body>
</html>