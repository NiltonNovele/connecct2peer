<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
 
        .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            height: 100vh; 
            width: 100vw; 
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
 
        .sidebar {
            background-color: #333;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            height: 100%;
        }
 
        .sidebar h2 {
            color: #007bff;
        }
 
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
 
        .sidebar ul li {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
 
        .sidebar ul li:hover, .sidebar ul li.active {
            background-color: #007bff;
        }
 
        .content {
            padding: 30px;
            overflow-y: auto;
        }
 
        .notification-container {
            background-color: #f4f4f4;
            border-radius: 8px;
            padding: 20px;
        }
 
        .notification {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
 
        .notification.unread .bullet {
            display: block;
            background-color: #007bff;
        }
 
        h2 {
            text-align: center;
            color: #333;
            margin: 0 0 20px;
            font-size: 24px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .notification {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            color: #555;
            position: relative;
        }
        .notification:last-child {
            border-bottom: none;
        }
        .bullet {
            width: 10px;
            height: 10px;
            background-color: #007bff;
            border-radius: 50%;
            position: absolute;
            left: -20px;
            display: none;
        }
        .notification.unread .bullet {
            display: block;
        }
        .message {
            margin-left: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Settings</h2>
            <ul>
                <li class="active">Notifications</li>
            </ul>
        </div>
 
        <div class="content">
            <div class="notification-container">
                <h2>Notifications</h2>
                <div class="notification unread">
                    <div class="bullet"></div>
                    <span class="message">Nilton viewed your profile.</span>
                </div>
                <div class="notification">
                    <div class="bullet"></div>
                    <span class="message">Eduvos endorsed your skills.</span>
                </div>
                <div class="notification unread">
                    <div class="bullet"></div>
                    <span class="message">You have a new follower: John Doe.</span>
                </div>
                <div class="notification">
                    <div class="bullet"></div>
                    <span class="message">Your profile was updated successfully.</span>
                </div>
                <div class="notification unread">
                    <div class="bullet"></div>
                    <span class="message">A new course has been added: Web Development 101.</span>
                </div>
            </div>
        </div>
    </div>
 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notifications = document.querySelectorAll('.notification');
            notifications.forEach(notification => {
                notification.addEventListener('click', function() {
                    notification.classList.remove('unread');
                });
            });
        });
    </script>
</body>
</html>
 