<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; height: 100vh; display: flex; justify-content: center; align-items: center; background: linear-gradient(to bottom, #87CEEB 0%, #e0f7fa 50%, #556B2F 100%);">

    <!-- Main Card Container -->
    <div style="background-color: #ffffff; width: 100%; max-width: 400px; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); border-top: 8px solid #FF8C00;">
        
        <!-- Title -->
        <h2 style="text-align: center; color: #2E8B57; margin-top: 0; margin-bottom: 30px; font-size: 28px;">Admin Login</h2>

        <!-- Login Form -->
        <form action="#" method="POST">
            
            <!-- Username Field -->
            <div style="margin-bottom: 20px;">
                <label for="username" style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" style="width: 100%; padding: 12px; border: 1px solid #87CEEB; border-radius: 4px; box-sizing: border-box; font-size: 14px; outline: none;">
            </div>

            <!-- Password Field -->
            <div style="margin-bottom: 30px;">
                <label for="password" style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" style="width: 100%; padding: 12px; border: 1px solid #87CEEB; border-radius: 4px; box-sizing: border-box; font-size: 14px; outline: none;">
            </div>

            <!-- Buttons Area -->
            <div style="display: flex; justify-content: space-between; gap: 15px;">
                
                <!-- Reset Button -->
                <button type="reset" style="flex: 1; padding: 12px; background-color: #5F9EA0; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; transition: opacity 0.3s;">
                    Reset
                </button>

                <!-- Login Button -->
                <button type="submit" style="flex: 1; padding: 12px; background-color: #FF8C00; color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer;">
                    Login
                </button>
            </div>

        </form>
    </div>

</body>
</html>