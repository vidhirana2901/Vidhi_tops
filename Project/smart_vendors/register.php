<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Smart Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

    <div class="glass-card">
        <h2>Create Account</h2>
        <form onsubmit="event.preventDefault(); window.location.href='dashboard.php';">
            
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" class="form-control" placeholder="Ritu Sharma" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Create a password" required>
            </div>

            <div class="form-group mb-4">
                <label for="account-type">I am a...</label>
                <select id="account-type" class="form-control">
                    <option value="user">Event Planner / User</option>
                    <option value="vendor">Service Vendor</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Sign Up Now</button>
        </form>
        
        <p class="text-center mt-4">
            <span style="color: var(--text-secondary);">Already have an account?</span> 
            <a href="login.php" style="color: var(--primary-color); font-weight: 600;">Log in</a>
        </p>
    </div>

</body>
</html>
