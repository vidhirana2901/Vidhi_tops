<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Smart Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Cool animated blob backdrop generated via css gradient -->
</head>
<body class="auth-page">

    <div class="glass-card">
        <h2>Contact Us </h2>
        <form onsubmit="event.preventDefault(); window.location.href='dashboard.php';">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" placeholder="Vidhi Rana" required>
            </div>
			
			<div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <input type="textarea" id="message" class="form-control" placeholder="write here..." required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        
        
        <p class="text-center mt-2">
            <a href="index.php" style="color: var(--text-secondary); font-size: 0.9rem;">&larr; Back to Home</a>
        </p>
    </div>

</body>
</html>
