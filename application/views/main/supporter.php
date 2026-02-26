<?php

// print_r($supporter);
$supporter_id = 0;
$supporter_name = "Alok Kharkar";

$positions = [
    "absolute bottom-[16%] left-[63%] z-[5] w-[25%] cursor-pointer text-white hover:text-gray-300",
    "absolute bottom-[16%] left-[30%] z-[5] w-[25%] cursor-pointer text-white hover:text-gray-300",
    "absolute bottom-[2%] left-[47%] z-[5] w-[30%] cursor-pointer text-white hover:text-gray-300",
    "absolute bottom-[30%] left-[58%] z-[5] w-[18%] cursor-pointer text-white hover:text-gray-300",
    "absolute bottom-[25%] left-[5%] z-[5] w-[18%] cursor-pointer text-white hover:text-gray-300"
];


if (isset($supporter) && !empty($supporter[0])) {

    $supporter_id = $supporter[0]['id'];
    $supporter_name = $supporter[0]['name'];
    // echo "all good";
}

$pageUrl = base_url('main/supporter/' . $supporter_id);
$imageUrl = base_url('assets/images/bg.jpg');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($supporter_name); ?>'s Donations - Home</title>

    <!-- Primary Meta -->
    <meta name="title" content="Bicycle Donations by <?php echo htmlspecialchars($supporter_name); ?>">
    <meta name="description"
        content="See the children <?php echo htmlspecialchars($supporter_name); ?> has supported with a bicycle.">

    <!-- Open Graph / WhatsApp / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Cycle Donation Program">
    <meta property="og:url" content="<?php echo $pageUrl; ?>">
    <meta property="og:title" content="Bicycle Donations by <?php echo htmlspecialchars($supporter_name); ?>">
    <meta property="og:description" content="Helping children get to school, one bicycle at a time.">
    <meta property="og:image" content="<?php echo $imageUrl; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $pageUrl; ?>">
    <meta property="twitter:title" content="Bicycle Donations by <?php echo htmlspecialchars($supporter_name); ?>">
    <meta property="twitter:description"
        content="See the children <?php echo htmlspecialchars($supporter_name); ?> has supported with a bicycle.">
    <meta property="twitter:image" content="<?php echo $imageUrl; ?>">

    <style>

    </style>
</head>


<body class="m-0 p-0 font-sans bg-[#222] min-h-screen flex justify-center items-center">

    <div
        class="w-full max-w-[480px] bg-[#87CEEB] h-screen relative flex flex-col overflow-hidden shadow-[0_0_20px_rgba(0,0,0,0.5)]">

        <!-- App Header -->
        <div
            class="absolute top-0 left-0 right-0 z-10 p-4 flex justify-between items-center bg-white  text-white font-bold text-base [text-shadow:_0_1px_3px_rgba(0,0,0,0.3)]">
            <!-- <span>CFTI</span> -->
            <a href="https://cftiindia.com/">
                <!-- <img src="<?php echo base_url("assets/images/cfti_logo_inverse.png"); ?>" alt="cfti logo" class=" w-28"> -->
                <img src="<?php echo base_url("assets/images/cfti_logo.jpg"); ?>" alt="cfti logo" class=" w-28">
            </a>

            <!-- <span></span> -->

            <a href="https://www.eximbankindia.in/">
                <img src="<?php echo base_url("assets/images/exim_bank_logo.png"); ?>" alt="cfti logo" class=" w-40">
            </a>
        </div>

        <!-- Main Background Image -->
        <!-- object-fit: cover ensures the valley image fills the screen without stretching, acting as the 'world' -->
        <!-- <img src='<?= base_url("assets/images/bg_webpage.jpg") ?>' alt="Valley View" -->
        <img src='<?= base_url("assets/images/bg.jpg") ?>' alt="Valley View"
            class="absolute top-0 left-0 w-full h-full object-cover object-bottom z-[1]">

        <!-- Text Overlay -->
        <!-- UPDATED SECTION STARTS HERE -->
        <div class="relative z-[2] mt-28 px-[30px] flex justify-center">
            <h1 class="bg-white/95 backdrop-blur-sm text-gray-800 text-[26px] p-6 rounded-2xl shadow-xl m-0 leading-[1.3] text-center w-full">
                Children supported with a Bicycle by <br>
                <!-- Changed text color to darker gold/orange (#ca8a04) so it is readable on white bg -->
                <!-- text-[#FFD700] -->
                <span class="font-extrabold text-[#F58D3D]  text-[32px] "><?php echo $supporter_name; ?></span>
            </h1>
        </div>
        <!-- UPDATED SECTION ENDS HERE -->

        <!-- Bicycles -->
        <!-- Using percentages (%) for bottom/left/right ensures they stay on the 'path' regardless of screen size -->
        <div>
            <?php
            $i = 0;
            $base = 15;
            foreach ($recipients as $key => $value) {
                if ($i > 4) {
                    return;
                }
                # code...
                // echo $key;
            ?>
                <!-- Cycle 0 (Left) -->
                <a href="<?php echo base_url('main/recipient/' . $supporter_id . '/' . $value['id']); ?>"
                    class='<?php echo $positions[$i]; ?>'>
                    <img src='<?= base_url("assets/images/cycle.png") ?>' alt="Bicycle"
                        class="w-full block drop-shadow-[0_5px_5px_rgba(0,0,0,0.4)]">
                    <h2 class=" mt-0  text-nowrap backdrop-blur-md bg-black/70 text-white px-3 py-1 rounded-md text-xs font-medium text-center shadow-sm border border-white/10 hover:bg-black/80 transition-all">
                        <?php echo $value['studentName']; ?>
                    </h2>
                </a>
            <?php
                $i++;
            }

            ?>
        </div>

        <!-- Share Button -->
        <div class="absolute bottom-4 right-4 z-20">

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
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="18" cy="5" r="3"></circle>
                    <circle cx="6" cy="12" r="3"></circle>
                    <circle cx="18" cy="19" r="3"></circle>
                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                </svg>
            </button>

        </div>


    </div>


    <script>
        function toggleShareMenu(e) {
            e.stopPropagation();
            const menu = document.getElementById('share-options');
            menu.classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {
            const menu = document.getElementById('share-options');
            const shareBtn = document.querySelector('button[onclick="toggleShareMenu(event)"]');

            if (!menu.classList.contains('hidden') && !menu.contains(event.target) && !shareBtn.contains(event
                    .target)) {
                menu.classList.add('hidden');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {

            const currentUrl = encodeURIComponent(window.location.href);
            const supporterName = "<?php echo addslashes($supporter_name); ?>";

            const shareText = encodeURIComponent(
                `See the children supported by ${supporterName} through the Bicycle Donation Program.`
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