<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipient Details</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #222; min-height: 100vh; display: flex; justify-content: center; align-items: center;">

    <!-- 
      Responsive Container:
      - Mobile: Full width, min-height 100vh.
      - Desktop: Centered card, max-width 500px.
    -->
    <div style="width: 100%; max-width: 500px; background-color: #ffffff; min-height: 100vh; display: flex; flex-direction: column; position: relative;">
        
        <!-- Header Strip -->
        <div style="background-color: #FF8C00; padding: 15px; text-align: center;">
             <h2 style="color: white; margin: 0; font-size: 18px;">Recipient Details</h2>
        </div>

        <!-- Scrollable Content -->
        <div style="padding: 20px; flex: 1; display: flex; flex-direction: column; overflow-y: auto;">

            <!-- Title -->
            <div style="text-align: center; margin-bottom: 20px;">
                <p style="color: #666; font-size: 14px; margin: 0;">Bicycle supported by</p>
                <h2 style="color: #2E8B57; margin: 5px 0 0 0; font-size: 24px;">Sagar Waghmare</h2>
            </div>

            <!-- Event Photo (Rectangular & Large) -->
            <div style="margin-bottom: 25px;">
                <div style="width: 100%; height: 250px; background-color: #f0f0f0; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <!-- Placeholder image representing the event photo -->
                    <img src="https://placehold.co/600x400/87CEEB/ffffff?text=Event+Photo\n(Student+with+Cycle)" alt="Event Photo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>

            <!-- Recipient Info Card -->
            <div style="background-color: #f9fdf9; padding: 15px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 20px;">
                <h3 style="margin: 0 0 10px 0; color: #333; font-size: 20px;">Priya Mahadik</h3>
                <p style="margin: 5px 0; color: #555;"><strong>School:</strong> Saraswati School, Raigad</p>
                <p style="margin: 5px 0; color: #555;"><strong>Standard:</strong> 3rd Standard</p>
            </div>

            <!-- Map Location -->
            <div style="flex: 1; min-height: 180px; margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555; font-size: 14px;">Location</label>
                <div style="width: 100%; height: 200px; border: 1px solid #ccc; border-radius: 8px; overflow: hidden;">
                    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Raigad,Maharashtra&t=&z=12&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
            </div>

            <!-- Download Button -->
            <button style="width: 100%; padding: 15px; background-color: #2E8B57; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: auto; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
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

</body>
</html>