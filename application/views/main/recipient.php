<?php

$supporter_name = "Alok Kharkar";
$supporter_id = 8;
$recipient_name = "Pranav Kumar";

$schoolName = "Pune Uni";
$standard = "3rd";

$location = "Pune";
$photoUrlName = "example1.jpg";


if (isset($supporter) && !empty($supporter[0])) {
    $supporter_name = $supporter[0]["name"];
    $supporter_id = $supporter[0]["id"];
}


if (isset($recipient) && !empty($recipient[0])) {
    $recipient_name = $recipient[0]["studentName"];
    $schoolName = $recipient[0]["schoolName"];
    $standard = $recipient[0]["standard"];
    $location = $recipient[0]["location"];
    $photoUrlName = $recipient[0]["photoUrl"];
}

$pageUrl = base_url('admin/add_supporters/' . $supporter_id);
$imageUrl = base_url('assets/images/' . $photoUrlName);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bicycle Donation – <?php echo htmlspecialchars($recipient_name); ?></title>

    <!-- Primary Meta -->
    <meta name="title" content="Bicycle Donation for <?php echo htmlspecialchars($recipient_name); ?>">
    <meta name="description"
        content="<?php echo htmlspecialchars($supporter_name); ?> supported a bicycle for <?php echo htmlspecialchars($recipient_name); ?> from <?php echo htmlspecialchars($schoolName); ?> in <?php echo htmlspecialchars($location); ?>.">

    <!-- Open Graph / WhatsApp / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Cycle Donation Program">
    <meta property="og:url" content="<?php echo $pageUrl; ?>">
    <meta property="og:title" content="A Bicycle for <?php echo htmlspecialchars($recipient_name); ?>">
    <meta property="og:description"
        content="Supported by <?php echo htmlspecialchars($supporter_name); ?> to help with school travel.">
    <meta property="og:image" content="<?php echo $imageUrl; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $pageUrl; ?>">
    <meta property="twitter:title" content="Bicycle Donation – <?php echo htmlspecialchars($recipient_name); ?>">
    <meta property="twitter:description"
        content="Supported by <?php echo htmlspecialchars($supporter_name); ?>.">
    <meta property="twitter:image" content="<?php echo $imageUrl; ?>">
</head>

<body class="m-0 p-0 font-sans bg-[#222] min-h-screen flex justify-center items-center">

    <div class="w-full max-w-[500px] bg-white min-h-screen flex flex-col relative">

        <div class="bg-[#FF8C00] p-[15px] text-center">
            <h2 class="text-white m-0 text-lg font-bold">Recipient Details</h2>
        </div>

        <div class="p-5 flex-1 flex flex-col overflow-y-auto">

            <div class="text-center mb-5">
                <p class="text-[#666] text-sm m-0">Bicycle supported by</p>
                <h2 class="text-[#2E8B57] mt-[5px] text-2xl font-bold"><?php echo $supporter_name; ?></h2>
            </div>

            <div class="mb-[25px]">
                <div
                    class="w-full h-[250px] bg-[#f0f0f0] border border-[#ddd] rounded-lg overflow-hidden flex items-center justify-center">
                    <img id="recipient-image" src="<?php echo $imageUrl; ?>"
                        alt="Event Photo" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="bg-[#f9fdf9] p-[15px] rounded-lg border border-[#e0e0e0] mb-5">
                <h3 class="mb-2.5 text-[#333] text-xl font-bold"><?php echo $recipient_name; ?></h3>
                <p class="my-[5px] text-[#555]"><strong>School:</strong> <?php echo $schoolName; ?></p>
                <p class="my-[5px] text-[#555]"><strong>Standard:</strong> <?php echo $standard; ?> Standard</p>
            </div>

            <div class="flex-1 min-h-[180px] mb-5">
                <label class="block mb-2 font-bold text-[#555] text-sm">Location</label>
                <div class="w-full h-[200px] border border-[#ccc] rounded-lg overflow-hidden">
                    <iframe width="100%" height="100%" frameborder="0" scrolling="no"
                        src="https://maps.google.com/maps?q=<?php echo $location; ?>&t=&z=12&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
            </div>

            <div class="mt-auto flex gap-3 items-center">

                <button onclick="downloadImage()"
                    class="flex-1 p-[15px] bg-[#2E8B57] text-white border-none rounded-lg text-base font-bold cursor-pointer flex items-center justify-center gap-2.5 shadow-[0_4px_6px_rgba(0,0,0,0.1)] hover:bg-[#257a4a] transition-colors">
                    Download
                </button>

                <div class="relative">

                    <div id="share-options"
                        class="hidden absolute bottom-full right-0 mb-3 bg-white border border-gray-200 shadow-xl rounded-lg p-2 flex flex-col gap-2 min-w-[160px] z-50">

                        <a href="#" id="share-twitter" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100 rounded text-sm text-gray-700 no-underline">
                            Twitter
                        </a>

                        <a href="#" id="share-fb" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100 rounded text-sm text-gray-700 no-underline">
                            Facebook
                        </a>

                        <a href="#" id="share-linkedin" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100 rounded text-sm text-gray-700 no-underline">
                            LinkedIn
                        </a>

                        <a href="#" id="share-whatsapp" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100 rounded text-sm text-gray-700 no-underline">
                            WhatsApp
                        </a>

                    </div>

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

    <script>
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
                window.open(imageSrc, '_blank');
            }
        }

        function toggleShareMenu(e) {
            e.stopPropagation();
            const menu = document.getElementById('share-options');
            menu.classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {
            const menu = document.getElementById('share-options');
            const shareBtn = document.querySelector('button[onclick="toggleShareMenu(event)"]');

            if (!menu.classList.contains('hidden') && !menu.contains(event.target) && !shareBtn.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {

            const currentUrl = encodeURIComponent(window.location.href);
            const recipientName = "<?php echo $recipient_name; ?>";

            const shareText = encodeURIComponent(
                `A bicycle was donated to ${recipientName} thanks to <?php echo $supporter_name; ?>.`
            );

            document.getElementById('share-twitter').href =
                `https://twitter.com/intent/tweet?text=${shareText}&url=${currentUrl}`;

            document.getElementById('share-fb').href =
                `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;

            document.getElementById('share-linkedin').href =
                `https://www.linkedin.com/sharing/share-offsite/?url=${currentUrl}`;

            document.getElementById('share-whatsapp').href =
                `https://api.whatsapp.com/send?text=${shareText}%20${currentUrl}`;
        });
    </script>

</body>

</html>