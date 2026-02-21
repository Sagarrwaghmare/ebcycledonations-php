<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Supporter</title>
    <!-- Tailwind CSS -->
</head>

<body class="m-0 p-0 font-sans min-h-screen flex justify-center items-center bg-gradient-to-b from-[#87CEEB] via-[#e0f7fa] to-[#556B2F]">

    <?php
    // --- 1. LOGIC HANDLER ---
    
    // Default values (Create Mode)
    $isCreate = true;
    $supporterId = '';
    $supporterName = '';
    $pageTitle = 'Add New Supporter';
    $btnText = 'Save Supporter';

    // This is a placeholder for the base_url() function. 
    // In a real CodeIgniter/Laravel environment, this function would return the base URL of your application.

    // Check if data exists and if we are in edit mode
    if (isset($data)) {
        // The boolean check
        if (isset($data['create']) && $data['create'] === false) {
            $isCreate = false;
            $pageTitle = 'Edit Supporter';
            $btnText = 'Update Supporter';

            // Extract supporter details if available
            if (isset($data['supporter']) && !empty($data['supporter'][0])) {
                $supp = $data['supporter'][0];
                $supporterId = $supp['id'] ?? '123'; // Example ID for edit mode
                $supporterName = $supp['name'] ?? 'John Doe'; // Example name for edit mode
            }
        }
    }

    // Construct the URL for the QR code
    $qrDataUrl = base_url('supporter/' . ($supporterId ?: ''));

    ?>

    <!-- Main Card Container -->
    <div class="bg-white w-[90%] max-w-[900px] p-10 rounded-lg shadow-2xl border-t-8 border-[#FF8C00] my-10">

        <!-- Header -->
        <div class="mb-8 border-b-2 border-gray-100 pb-4">
            <h2 class="text-[#2E8B57] m-0 text-3xl font-bold"><?php echo $pageTitle; ?></h2>
            <p class="text-gray-600 mt-2 text-sm">Enter details below to generate a QR code for the supporter.</p>
        </div>

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
                        <button type="button" onclick="generateQR()" class="flex-1 py-3 px-4 bg-[#4682B4] text-white rounded font-bold hover:bg-[#36648b] transition">
                            Generate QR
                        </button>
                        <!-- Submit Form -->
                        <button type="submit" class="flex-1 py-3 px-4 bg-[#FF8C00] text-white rounded font-bold shadow-md hover:bg-orange-600 transition">
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
                <button onclick="downloadQR()" class="w-[200px] py-2.5 bg-white text-gray-700 border-2 border-gray-500 rounded font-bold hover:bg-gray-50 transition flex items-center justify-center gap-2">
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