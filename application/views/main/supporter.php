<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sagar's Support - Home</title>
    <!-- Added Tailwind CSS CDN -->
</head>
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

    $supporter_id =  $supporter[0]['id'];
    $supporter_name =  $supporter[0]['name'];
    // echo "all good";
}

?>

<body class="m-0 p-0 font-sans bg-[#222] min-h-screen flex justify-center items-center">

    <!-- 
      Responsive Container: 
      - On Mobile: Fills 100% width.
      - On Desktop: Caps at 480px wide and centers itself, acting like a mobile app window.
    -->
    <div class="w-full max-w-[480px] bg-[#87CEEB] h-screen relative flex flex-col overflow-hidden shadow-[0_0_20px_rgba(0,0,0,0.5)]">

        <!-- App Header -->
        <div class="absolute top-0 left-0 right-0 z-10 p-5 flex justify-between items-center text-white font-bold text-base [text-shadow:_0_1px_3px_rgba(0,0,0,0.3)]">
            <!-- <span>CFTI</span> -->
            <img src="<?php echo base_url("assets/images/cfti_logo_inverse.png");?>" alt="cfti logo"
            class=" w-28">
            <span>Exim Bank</span>
        </div>

        <!-- Main Background Image -->
        <!-- object-fit: cover ensures the valley image fills the screen without stretching, acting as the 'world' -->
        <img src='<?= base_url("assets/images/bg.jpg") ?>' alt="Valley View" class="absolute top-0 left-0 w-full h-full object-cover object-bottom z-[1]">

        <!-- Text Overlay -->
        <div class="relative z-[2] mt-20 px-[30px]">
            <h1 class="text-white text-[26px] [text-shadow:_0_2px_5px_rgba(0,0,0,0.4)] m-0 leading-[1.3]">
                Children supported with a Bicycle by <br>
                <span class="font-extrabold text-[#FFD700] text-[32px]"><?php echo $supporter_name; ?></span>
            </h1>
        </div>

        <!-- Bicycles -->
        <!-- Using percentages (%) for bottom/left/right ensures they stay on the 'path' regardless of screen size -->
        <div>
            <?php

            $i = 0;
            $base = 15;
            foreach ($recipients as $key => $value) {
                # code...
                // echo $key;
            ?>
                <!-- Cycle 0 (Left) -->
                <a
                    href="<?php echo base_url('main/recipient/' . $supporter_id . '/' . $value['id']); ?>"
                    class='<?php echo $positions[$i];?>'>
                    <img src='<?= base_url("assets/images/cycle.png") ?>' alt="Bicycle" class="w-full block drop-shadow-[0_5px_5px_rgba(0,0,0,0.4)]">
                    <h2 class=" text-xs  text-center "><?php echo $value['studentName'];?> </h2>
                </a>
            <?php
                $i++;
            }

            ?>
        </div>

    </div>

</body>

</html>