<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Supporter</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; min-height: 100vh; display: flex; justify-content: center; align-items: center; background: linear-gradient(to bottom, #87CEEB 0%, #e0f7fa 50%, #556B2F 100%);">

    <!-- Main Card Container -->
    <div style="background-color: #ffffff; width: 90%; max-width: 800px; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); border-top: 8px solid #FF8C00;">
        
        <!-- Header -->
        <div style="margin-bottom: 30px; border-bottom: 2px solid #eee; padding-bottom: 15px;">
            <h2 style="color: #2E8B57; margin: 0; font-size: 28px;">Add / Edit Supporter</h2>
            <p style="color: #666; margin-top: 5px; font-size: 14px;">Enter details below to generate a QR code for the supporter.</p>
        </div>

        <!-- content Wrapper (Flexbox for Side-by-Side layout) -->
        <div style="display: flex; flex-wrap: wrap; gap: 40px;">

            <!-- LEFT COLUMN: Form Inputs -->
            <div style="flex: 1; min-width: 300px;">
                <form action="#" method="POST">
                    
                    <!-- Supporter Name -->
                    <div style="margin-bottom: 20px;">
                        <label for="supporterName" style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Supporter Name</label>
                        <input type="text" id="supporterName" name="supporterName" value="Alok Prakash Kharkar" placeholder="Enter full name" style="width: 100%; padding: 12px; border: 1px solid #87CEEB; border-radius: 4px; box-sizing: border-box; font-size: 14px; outline: none;">
                    </div>

                    <!-- Photo Upload -->
                    <div style="margin-bottom: 25px;">
                        <label for="photoUpload" style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Photo Upload</label>
                        <div style="border: 2px dashed #87CEEB; padding: 20px; text-align: center; border-radius: 4px; background-color: #f0f8ff;">
                            <input type="file" id="photoUpload" name="photoUpload" style="font-size: 14px; color: #555;">
                        </div>
                    </div>

                    <!-- Action Buttons for Form -->
                    <div style="display: flex; gap: 15px; margin-top: 30px;">
                        <button type="button" style="flex: 1; padding: 12px; background-color: #4682B4; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">Generate QR</button>
                        <button type="submit" style="flex: 1; padding: 12px; background-color: #FF8C00; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">Save Supporter</button>
                    </div>

                </form>
            </div>

            <!-- RIGHT COLUMN: QR Display -->
            <div style="flex: 0 0 250px; display: flex; flex-direction: column; align-items: center; justify-content: flex-start; border-left: 1px solid #eee; padding-left: 20px;">
                
                <h3 style="color: #333; margin-top: 0; font-size: 18px;">QR Preview</h3>
                
                <!-- QR Box Placeholder -->
                <div style="width: 200px; height: 200px; background-color: #fff; border: 2px solid #2E8B57; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    <!-- This image is a placeholder for the generated QR -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example" alt="QR Code" style="width: 150px; height: 150px; opacity: 0.9;">
                </div>

                <!-- Download Button -->
                <button style="width: 200px; padding: 10px; background-color: #fff; color: #333; border: 2px solid #555; border-radius: 4px; font-weight: bold; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;">
                    <!-- Simple SVG Icon for download -->
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

</body>
</html>