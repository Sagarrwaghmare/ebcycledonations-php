<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sagar's Support - Home</title>
</head>
<?php

// print_r($supporter);
$supporter_id = 0;
$supporter_name = "John Pagar";


if (isset($supporter) && !empty($supporter[0])) {

    $supporter_id =  $supporter[0]['id'];
    $supporter_name =  $supporter[0]['name'];
    // echo "all good";
}

?>

<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #222; min-height: 100vh; display: flex; justify-content: center; align-items: center;">

    <!-- 
      Responsive Container: 
      - On Mobile: Fills 100% width.
      - On Desktop: Caps at 480px wide and centers itself, acting like a mobile app window.
    -->
    <div style="width: 100%; max-width: 480px; background-color: #87CEEB; height: 100vh; position: relative; display: flex; flex-direction: column; overflow: hidden; box-shadow: 0 0 20px rgba(0,0,0,0.5);">

        <!-- App Header -->
        <div style="position: absolute; top: 0; left: 0; right: 0; z-index: 10; padding: 20px; display: flex; justify-content: space-between; align-items: center; color: white; font-weight: bold; font-size: 16px; text-shadow: 0 1px 3px rgba(0,0,0,0.3);">
            <span>CFTI</span>
            <span>Exim Bank</span>
        </div>

        <!-- Main Background Image -->
        <!-- object-fit: cover ensures the valley image fills the screen without stretching, acting as the 'world' -->
        <img src='<?= base_url("assets/images/bg.png") ?>' alt="Valley View" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center bottom; z-index: 1;">

        <!-- Text Overlay -->
        <div style="position: relative; z-index: 2; margin-top: 80px; padding: 0 30px;">
            <h1 style="color: #fff; font-size: 26px; text-shadow: 0 2px 5px rgba(0,0,0,0.4); margin: 0; line-height: 1.3;">
                Children supported with a Bicycle by <br>
                <span style="font-weight: 800; color: #FFD700; font-size: 32px;"><?php echo $supporter_name; ?></span>
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
                $position = $i * $base;
                echo $position;
                // echo $key;
            ?>
                <!-- Cycle 0 (Left) -->
                <!-- style="position: absolute; bottom: 0%; left: <?php echo $position; ?>%; z-index: 5; width: 35%;" -->

                <a 
                href="<?php echo base_url('main/recipient/'.$supporter_id.'/'.$value['id']);?>"
                style="position: absolute; bottom: 16%; left: 63%; z-index: 5; width: 25%;"
                class=" cursor-pointer text-white hover:text-gray-300"
                >
                    <img src='<?= base_url("assets/images/cycle.png") ?>' alt="Bicycle" style="width: 100%; display: block; filter: drop-shadow(0 5px 5px rgba(0,0,0,0.4));">
                    <h2 class=" text-xs  text-center "><?php echo $value['studentName'];?> 1</h2>
                </a>

                
                <a 
                href="<?php echo base_url('main/recipient/'.$supporter_id.'/'.$value['id']);?>"
                style="position: absolute; bottom: 16%; left: 30%; z-index: 5; width: 25%;"
                class=" cursor-pointer text-white hover:text-gray-300"
                >
                    <img src='<?= base_url("assets/images/cycle.png") ?>' alt="Bicycle" style="width: 100%; display: block; filter: drop-shadow(0 5px 5px rgba(0,0,0,0.4));">
                    <h2 class=" text-xs  text-center "><?php echo $value['studentName'];?> 2</h2>
                </a>

                
                <a 
                href="<?php echo base_url('main/recipient/'.$supporter_id.'/'.$value['id']);?>"
                style="position: absolute; bottom: 2%; left: 47%; z-index: 5; width: 30%;"
                class=" cursor-pointer text-white hover:text-gray-300"
                >
                    <img src='<?= base_url("assets/images/cycle.png") ?>' alt="Bicycle" style="width: 100%; display: block; filter: drop-shadow(0 5px 5px rgba(0,0,0,0.4));">
                    <h2 class=" text-xs  text-center "><?php echo $value['studentName'];?> 3</h2>
                </a>

                
                <a 
                href="<?php echo base_url('main/recipient/'.$supporter_id.'/'.$value['id']);?>"
                style="position: absolute; bottom: 30%; left: 58%; z-index: 5; width: 18%;"
                class=" cursor-pointer text-white hover:text-gray-300"
                >
                    <img src='<?= base_url("assets/images/cycle.png") ?>' alt="Bicycle" style="width: 100%; display: block; filter: drop-shadow(0 5px 5px rgba(0,0,0,0.4));">
                    <h2 class=" text-xs  text-center "><?php echo $value['studentName'];?> 4</h2>
                </a>

                
                <a 
                href="<?php echo base_url('main/recipient/'.$supporter_id.'/'.$value['id']);?>"
                style="position: absolute; bottom: 25%; left: 5%; z-index: 5; width: 18%;"
                class=" cursor-pointer text-white hover:text-gray-300"
                >
                    <img src='<?= base_url("assets/images/cycle.png") ?>' alt="Bicycle" style="width: 100%; display: block; filter: drop-shadow(0 5px 5px rgba(0,0,0,0.4));">
                    <h2 class=" text-xs  text-center "><?php echo $value['studentName'];?> 5</h2>
                </a>
                
            <?php
            return;
            $i++;
            }

            ?>
        </div>

    </div>

</body>

</html>