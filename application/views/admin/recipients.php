<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Recipient</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; background: linear-gradient(to bottom, #87CEEB 0%, #e0f7fa 50%, #556B2F 100%);">

    <!-- Main Container (Wider for the table) -->
    <div style="background-color: #ffffff; width: 95%; max-width: 1100px; margin-top: 50px; margin-bottom: 50px; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); border-top: 8px solid #FF8C00;">
        
        <!-- Header -->
        <div style="margin-bottom: 30px; border-bottom: 2px solid #eee; padding-bottom: 15px;">
            <h1 style="color: #2E8B57; margin: 0; font-size: 32px;">View Recipient</h1>
            <h3 style="color: #555; margin-top: 10px; font-weight: normal;">Supporter: <span style="color: #FF8C00; font-weight: bold;">Sagar Waghmare</span></h3>
        </div>

        <!-- Table -->
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px; min-width: 900px;">
                <thead>
                    <tr style="background-color: #2E8B57; color: white; text-align: left;">
                        <th style="padding: 15px; border-bottom: 2px solid #ddd; width: 50px;">Sr.No</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd;">Recipient</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd;">School</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd;">Standard</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd; width: 150px;">Location</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd; text-align: center;">Photo</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd; text-align: center; width: 160px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px 15px; color: #333;">1</td>
                        <td style="padding: 12px 15px; color: #333; font-weight: 600;">Priya Mahadik</td>
                        <td style="padding: 12px 15px; color: #555;">Prathamik School</td>
                        <td style="padding: 12px 15px; color: #555;">4th</td>
                        
                        <!-- Map Location (Using Iframe) -->
                        <td style="padding: 10px;">
                            <div style="border: 2px solid #87CEEB; border-radius: 4px; overflow: hidden; height: 80px;">
                                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Pune,Maharashtra&t=&z=10&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                        </td>

                        <!-- Photo -->
                        <td style="padding: 12px 15px; text-align: center;">
                            <img src="https://ui-avatars.com/api/?name=Priya+Mahadik&background=FF8C00&color=fff&rounded=true" alt="Priya" style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid #eee; object-fit: cover;">
                        </td>

                        <!-- Actions (Side by Side) -->
                        <td style="padding: 12px 15px;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <button style="padding: 8px 15px; background-color: #4682B4; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;">Edit</button>
                                <button style="padding: 8px 15px; background-color: #CD5C5C; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;">Delete</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr style="background-color: #f9fdf9; border-bottom: 1px solid #eee;">
                        <td style="padding: 12px 15px; color: #333;">2</td>
                        <td style="padding: 12px 15px; color: #333; font-weight: 600;">Vidhi Bhanushali</td>
                        <td style="padding: 12px 15px; color: #555;">Shree Vidyalaya</td>
                        <td style="padding: 12px 15px; color: #555;">6th</td>
                        
                        <!-- Map Location -->
                        <td style="padding: 10px;">
                            <div style="border: 2px solid #87CEEB; border-radius: 4px; overflow: hidden; height: 80px;">
                                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Mumbai,Maharashtra&t=&z=10&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                        </td>

                        <!-- Photo -->
                        <td style="padding: 12px 15px; text-align: center;">
                            <img src="https://ui-avatars.com/api/?name=Vidhi+Bhanushali&background=2E8B57&color=fff&rounded=true" alt="Vidhi" style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid #eee; object-fit: cover;">
                        </td>

                        <!-- Actions -->
                        <td style="padding: 12px 15px;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <button style="padding: 8px 15px; background-color: #4682B4; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;">Edit</button>
                                <button style="padding: 8px 15px; background-color: #CD5C5C; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;">Delete</button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Add Button Area -->
        <div style="display: flex; justify-content: flex-start; margin-top: 10px;">
            <button style="padding: 12px 30px; background-color: #FF8C00; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-size: 16px;">
                + Add Recipient
            </button>
        </div>

    </div>

</body>
</html>