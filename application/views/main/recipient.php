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

    <!-- Primary Meta Tags -->
    <meta name="description"
        content="Support <?php echo htmlspecialchars($supporterName); ?>! Check out their profile and QR code.">

    <!-- Facebook / LinkedIn / WhatsApp (Open Graph) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo base_url('admin/add_supporters/' . $supporterId); ?>">
    <meta property="og:title" content="Support <?php echo htmlspecialchars($supporterName); ?>">
    <meta property="og:description" content="Check out this supporter profile. Scan the QR code to learn more.">
    <!-- Replace this image URL with a link to your logo or a generic badge image -->
    <meta property="og:image" content="https://your-website.com/assets/images/preview-card.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo base_url('admin/add_supporters/' . $supporterId); ?>">
    <meta property="twitter:title" content="Support <?php echo htmlspecialchars($supporterName); ?>">
    <meta property="twitter:description" content="Check out this supporter profile.">
    <meta property="twitter:image" content="https://your-website.com/assets/images/preview-card.jpg">
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
                <div
                    class="w-full h-[250px] bg-[#f0f0f0] border border-[#ddd] rounded-lg overflow-hidden flex items-center justify-center">
                    <!-- Placeholder image representing the event photo -->
                    <img id="recipient-image" src="<?php echo base_url('assets/images/' . $photoUrlName); ?>"
                        alt="Event Photo" class="w-full h-full object-cover">
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
                    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?q=<?php echo $location; ?>&t=&z=12&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
            </div>

            <!-- ACTION BUTTONS CONTAINER (Flex Row) -->
            <div class="mt-auto flex gap-3 items-center">

                <!-- Download Button (Takes available space) -->
                <button onclick="downloadImage()"
                    class="flex-1 p-[15px] bg-[#2E8B57] text-white border-none rounded-lg text-base font-bold cursor-pointer flex items-center justify-center gap-2.5 shadow-[0_4px_6px_rgba(0,0,0,0.1)] hover:bg-[#257a4a] transition-colors">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Download
                </button>

                <!-- Share Button Container (Relative for Popover) -->
                <div class="relative">

                    <!-- Social Options Popover (Hidden by default, appears above) -->
                    <div id="share-options"
                        class="hidden absolute bottom-full right-0 mb-3 bg-white border border-gray-200 shadow-xl rounded-lg p-2 flex flex-col gap-2 min-w-[160px] z-50">
                        <!-- Twitter/X -->
                        <a href="#" id="share-twitter" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100 rounded text-sm text-gray-700 no-underline">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                            Twitter
                        </a>
                        <!-- Facebook -->
                        <a href="#" id="share-fb" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100 rounded text-sm text-gray-700 no-underline">
                            <svg class="w-5 h-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                            Facebook
                        </a>
                        <!-- LinkedIn -->
                        <a href="#" id="share-linkedin" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100 rounded text-sm text-gray-700 no-underline">
                            <svg class="w-5 h-5 text-[#0A66C2]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                            LinkedIn
                        </a>
                        <!-- WhatsApp -->
                        <a href="#" id="share-whatsapp" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100 rounded text-sm text-gray-700 no-underline">
                            <svg class="w-5 h-5 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.374-5.03c0-5.429 4.417-9.868 9.869-9.868 2.64 0 5.121 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.429-4.417 9.869-9.865 9.869" />
                            </svg>
                            WhatsApp
                        </a>
                    </div>

                    <!-- Toggle Button -->
                    <button onclick="toggleShareMenu(event)"
                        class=" h-14 px-[15px] bg-[#f0f0f0] text-[#333] border border-[#ccc] rounded-lg cursor-pointer hover:bg-[#e0e0e0] flex items-center justify-center transition-colors shadow-[0_4px_6px_rgba(0,0,0,0.05)]">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="18" cy="5" r="3"></circle>
                            <circle cx="6" cy="12" r="3"></circle>
                            <circle cx="18" cy="19" r="3"></circle>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                        </svg>
                    </button>
                </div>

            </div>

        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // --- 1. Download Logic (Existing) ---
        async function downloadImage() {
            const imgElement = document.getElementById('recipient-image');
            const imageSrc = imgElement.src;
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
                window.open(imageSrc, '_blank');
            }
        }

        // --- 2. Share Logic (New) ---
        function toggleShareMenu(e) {
            e.stopPropagation(); // Prevent immediate closing
            const menu = document.getElementById('share-options');
            menu.classList.toggle('hidden');
        }

        // Close menu when clicking outside
        document.addEventListener('click', function (event) {
            const menu = document.getElementById('share-options');
            const shareBtn = document.querySelector('button[onclick="toggleShareMenu(event)"]');

            if (!menu.classList.contains('hidden') && !menu.contains(event.target) && !shareBtn.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Initialize Share Links
        document.addEventListener('DOMContentLoaded', function () {
            // Get current page URL
            const currentUrl = encodeURIComponent(window.location.href);
            // Optional: Create a generic message
            const recipientName = "<?php echo $recipient_name; ?>";
            const shareText = encodeURIComponent(`Check out ${recipientName}'s details supported by <?php echo $supporter_name; ?>!`);

            // Update HREFs
            document.getElementById('share-twitter').href = `https://twitter.com/intent/tweet?text=${shareText}&url=${currentUrl}`;
            document.getElementById('share-fb').href = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;
            document.getElementById('share-linkedin').href = `https://www.linkedin.com/sharing/share-offsite/?url=${currentUrl}`;
            document.getElementById('share-whatsapp').href = `https://api.whatsapp.com/send?text=${shareText}%20${currentUrl}`;
        });
    </script>
</body>

</html>