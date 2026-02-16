<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; background: linear-gradient(to bottom, #87CEEB 0%, #e0f7fa 50%, #556B2F 100%);">

    <!-- Main Container -->
    <div style="background-color: #ffffff; width: 90%; max-width: 900px; margin-top: 50px; margin-bottom: 50px; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); border-top: 8px solid #FF8C00;">
        
        <!-- Header -->
        <div style="margin-bottom: 30px;">
            <h1 style="color: #2E8B57; margin: 0; font-size: 32px;">Dashboard - Admin</h1>
            <p style="color: #555; margin-top: 5px; font-size: 14px;">Manage supporters and donation records.</p>
        </div>

        <!-- Table -->
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
                <thead>
                    <tr style="background-color: #2E8B57; color: white; text-align: left;">
                        <th style="padding: 15px; border-bottom: 2px solid #ddd;">Sr.No</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd;">Supporter</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd;">Donations</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd; text-align: center;">Action</th>
                        <th style="padding: 15px; border-bottom: 2px solid #ddd; text-align: center;">View</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px 15px; color: #333;">1</td>
                        <td style="padding: 12px 15px; color: #333; font-weight: 500;">Sagar</td>
                        <td style="padding: 12px 15px; color: #333;">3 Bicycles</td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <input type="checkbox" style="transform: scale(1.5); cursor: pointer;">
                        </td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <button style="padding: 6px 15px; background-color: #87CEEB; color: #003366; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">View</button>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr style="background-color: #f9fdf9; border-bottom: 1px solid #eee;">
                        <td style="padding: 12px 15px; color: #333;">2</td>
                        <td style="padding: 12px 15px; color: #333; font-weight: 500;">Madhura</td>
                        <td style="padding: 12px 15px; color: #333;">2 Bicycles</td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <input type="checkbox" style="transform: scale(1.5); cursor: pointer;">
                        </td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <button style="padding: 6px 15px; background-color: #87CEEB; color: #003366; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">View</button>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px 15px; color: #333;">3</td>
                        <td style="padding: 12px 15px; color: #333; font-weight: 500;">Anjali</td>
                        <td style="padding: 12px 15px; color: #333;">5 Bicycles</td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <input type="checkbox" style="transform: scale(1.5); cursor: pointer;">
                        </td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <button style="padding: 6px 15px; background-color: #87CEEB; color: #003366; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">View</button>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr style="background-color: #f9fdf9; border-bottom: 1px solid #eee;">
                        <td style="padding: 12px 15px; color: #333;">4</td>
                        <td style="padding: 12px 15px; color: #333; font-weight: 500;">Rahul</td>
                        <td style="padding: 12px 15px; color: #333;">1 Bicycle</td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <input type="checkbox" style="transform: scale(1.5); cursor: pointer;">
                        </td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <button style="padding: 6px 15px; background-color: #87CEEB; color: #003366; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">View</button>
                        </td>
                    </tr>
                    <!-- Row 5 -->
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px 15px; color: #333;">5</td>
                        <td style="padding: 12px 15px; color: #333; font-weight: 500;">Priya</td>
                        <td style="padding: 12px 15px; color: #333;">4 Bicycles</td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <input type="checkbox" style="transform: scale(1.5); cursor: pointer;">
                        </td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <button style="padding: 6px 15px; background-color: #87CEEB; color: #003366; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">View</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer Actions (Buttons + Pagination) -->
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            
            <!-- Action Buttons -->
            <div style="display: flex; gap: 10px;">
                <button style="padding: 10px 20px; background-color: #FF8C00; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">Add</button>
                <button style="padding: 10px 20px; background-color: #4682B4; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">Edit</button>
                <button style="padding: 10px 20px; background-color: #696969; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">Delete</button>
            </div>

            <!-- Pagination -->
            <div style="font-weight: bold; color: #333;">
                <span style="cursor: pointer; padding: 5px 10px; color: #FF8C00;">1</span>
                <span style="cursor: pointer; padding: 5px 10px;">2</span>
                <span style="cursor: pointer; padding: 5px 10px;">3</span>
            </div>

        </div>

    </div>

</body>
</html>