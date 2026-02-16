<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Recipient</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; min-height: 100vh; display: flex; justify-content: center; align-items: center; background: linear-gradient(to bottom, #87CEEB 0%, #e0f7fa 50%, #556B2F 100%);">

    <!-- Main Container -->
    <div style="background-color: #ffffff; width: 90%; max-width: 800px; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); border-top: 8px solid #FF8C00;">
        
        <!-- Header -->
        <div style="margin-bottom: 30px; border-bottom: 2px solid #eee; padding-bottom: 15px;">
            <h2 style="color: #2E8B57; margin: 0; font-size: 24px;">Recipient >> Add / Edit</h2>
            <h3 style="color: #555; margin-top: 10px; font-weight: normal; font-size: 18px;">Supporter: <span style="color: #FF8C00; font-weight: bold;">Sagar Waghmare</span></h3>
        </div>

        <form action="#" method="POST">
            <!-- Content Wrapper (Flexbox for Side-by-Side layout) -->
            <div style="display: flex; flex-wrap: wrap; gap: 40px;">

                <!-- LEFT COLUMN: Form Inputs -->
                <div style="flex: 1; min-width: 300px;">
                    
                    <!-- Recipient Name -->
                    <div style="margin-bottom: 15px;">
                        <label for="recipientName" style="display: block; margin-bottom: 5px; color: #333; font-weight: 600;">Recipient Name</label>
                        <input type="text" id="recipientName" name="recipientName" placeholder="e.g. Priya Mahadik" style="width: 100%; padding: 10px; border: 1px solid #87CEEB; border-radius: 4px; box-sizing: border-box; font-size: 14px; outline: none;">
                    </div>

                    <!-- School -->
                    <div style="margin-bottom: 15px;">
                        <label for="school" style="display: block; margin-bottom: 5px; color: #333; font-weight: 600;">School</label>
                        <input type="text" id="school" name="school" placeholder="e.g. Saraswati School" style="width: 100%; padding: 10px; border: 1px solid #87CEEB; border-radius: 4px; box-sizing: border-box; font-size: 14px; outline: none;">
                    </div>

                    <!-- Standard -->
                    <div style="margin-bottom: 15px;">
                        <label for="standard" style="display: block; margin-bottom: 5px; color: #333; font-weight: 600;">Standard</label>
                        <input type="text" id="standard" name="standard" placeholder="e.g. 2nd" style="width: 100%; padding: 10px; border: 1px solid #87CEEB; border-radius: 4px; box-sizing: border-box; font-size: 14px; outline: none;">
                    </div>

                    <!-- Location -->
                    <div style="margin-bottom: 15px;">
                        <label for="location" style="display: block; margin-bottom: 5px; color: #333; font-weight: 600;">Location</label>
                        <input type="text" id="location" name="location" placeholder="Map coordinates or Address" style="width: 100%; padding: 10px; border: 1px solid #87CEEB; border-radius: 4px; box-sizing: border-box; font-size: 14px; outline: none;">
                    </div>

                    <!-- Buttons -->
                    <div style="display: flex; gap: 15px; margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                        <button type="submit" style="padding: 12px 30px; background-color: #FF8C00; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 15px;">Add</button>
                        <button type="button" style="padding: 12px 30px; background-color: #4682B4; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 15px;">Update</button>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Photo Upload & Preview -->
                <div style="flex: 0 0 220px; display: flex; flex-direction: column; align-items: center; justify-content: flex-start; border-left: 1px solid #eee; padding-left: 20px;">
                    
                    <label style="color: #333; font-weight: 600; font-size: 16px; margin-bottom: 15px;">Recipient Photo</label>
                    
                    <!-- Preview Box (150x150) -->
                    <div style="width: 150px; height: 150px; border: 3px dashed #87CEEB; display: flex; align-items: center; justify-content: center; background-color: #f0f8ff; border-radius: 8px; color: #5F9EA0; font-size: 14px; text-align: center; margin-bottom: 20px;">
                        Photo Preview
                    </div>

                    <!-- File Input -->
                    <input type="file" id="photo" name="photo" style="font-size: 14px; color: #333;">

                </div>

            </div>
        </form>
    </div>

</body>
</html>