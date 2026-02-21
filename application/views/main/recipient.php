<?php

$supporter_name = "Alok Kharkar";
$recipient_name = "Pranav Kumar";

$schoolName = "Pune Uni";
$standard = "3rd";

$location = "Pune";
$photoUrlName = "example1.jpg";


if (isset($supporter) && !empty($supporter[0])) {
    $supporter_name = $supporter[0]["name"];
}


if (isset($recipient) && !empty($recipient[0])) {
    // $supporter_name = $supporter[0]["name"];
    $recipient_name = $recipient[0]["studentName"];
    $schoolName = $recipient[0]["schoolName"];
    $standard = $recipient[0]["standard"];
    $location = $recipient[0]["location"];
    $photoUrlName = $recipient[0]["photoUrl"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipient Details</title>
    <!-- Tailwind CSS CDN -->
</head>

<body class="m-0 p-0 font-sans bg-[#222] min-h-screen flex justify-center items-center">
    
    <!-- 
      Responsive Container:
      - Mobile: Full width, min-height 100vh.
      - Desktop: Centered card, max-width 500px.
    -->
    <div class="w-full max-w-[500px] bg-white min-h-screen flex flex-col relative">

        <!-- Header Strip -->
        <div class="bg-[#FF8C00] p-[15px] text-center">
            <h2 class="text-white m-0 text-lg font-bold">Recipient Details</h2>
        </div>

        <!-- Scrollable Content -->
        <div class="p-5 flex-1 flex flex-col overflow-y-auto">

            <!-- Title -->
            <div class="text-center mb-5">
                <p class="text-[#666] text-sm m-0">Bicycle supported by</p>
                <h2 class="text-[#2E8B57] mt-[5px] text-2xl font-bold"><?php echo $supporter_name; ?></h2>
            </div>

            <!-- Event Photo (Rectangular & Large) -->
            <div class="mb-[25px]">
                <div class="w-full h-[250px] bg-[#f0f0f0] border border-[#ddd] rounded-lg overflow-hidden flex items-center justify-center">
                    <!-- Placeholder image representing the event photo -->
                    <!-- Added ID for JS -->
                    <img id="recipient-image" src="<?php echo base_url('assets/images/' . $photoUrlName); ?>" alt="Event Photo" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Recipient Info Card -->
            <div class="bg-[#f9fdf9] p-[15px] rounded-lg border border-[#e0e0e0] mb-5">
                <h3 class="mb-2.5 text-[#333] text-xl font-bold"><?php echo $recipient_name; ?></h3>
                <p class="my-[5px] text-[#555]"><strong>School:</strong> <?php echo $schoolName; ?></p>
                <p class="my-[5px] text-[#555]"><strong>Standard:</strong> <?php echo $standard; ?> Standard</p>
            </div>

            <!-- Map Location -->
            <div class="flex-1 min-h-[180px] mb-5">
                <label class="block mb-2 font-bold text-[#555] text-sm">Location</label>
                <div class="w-full h-[200px] border border-[#ccc] rounded-lg overflow-hidden">
                    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $location; ?>&t=&z=12&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
            </div>

            <!-- Download Button -->
            <!-- Added onclick handler -->
            <button onclick="downloadImage()" class="w-full p-[15px] bg-[#2E8B57] text-white border-none rounded-lg text-base font-bold cursor-pointer flex items-center justify-center gap-2.5 mt-auto shadow-[0_4px_6px_rgba(0,0,0,0.1)] hover:bg-[#257a4a] transition-colors">
                <!-- Download Icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                Download Photo
            </button>

        </div>
    </div>

    <!-- JavaScript for Download Functionality -->
    <script>
        async function downloadImage() {
            const imgElement = document.getElementById('recipient-image');
            const imageSrc = imgElement.src;
            
            // Extract filename from URL or default to specific name
            const fileName = imageSrc.substring(imageSrc.lastIndexOf('/') + 1) || 'recipient-photo.jpg';

            try {
                const response = await fetch(imageSrc);
                const blob = await response.blob();
                const url = window.URL.createObjectURL(blob);
                
                const link = document.createElement('a');
                link.href = url;
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                
                document.body.removeChild(link);
                window.URL.revokeObjectURL(url);
            } catch (error) {
                console.error('Download failed, trying fallback:', error);
                // Fallback: open in new tab if CORS prevents fetching blob
                window.open(imageSrc, '_blank');
            }
        }
    </script>
</body>

</html>