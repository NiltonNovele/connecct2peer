<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeerConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            display: flex; 
            flex-direction: column;
            height: 100vh; 
        }
        .wrapper {
            display: flex; 
            flex-grow: 1; 
        }
        .nav {
            width: 200px; 
            background-color: #1e1e1e;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
        }
        .nav h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .nav ul {
            list-style-type: none;
            padding: 0;
        }
        .nav ul li {
            margin: 10px 0;
        }
        .nav ul li a {
            color: #fff;
            text-decoration: none;
            display: flex; 
            align-items: center; 
        }
        .nav ul li a i {
            margin-right: 10px; 
        }
        .nav ul li a:hover {
            text-decoration: underline;
        }
        .container {
            flex-grow: 1; 
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center; 
        }
        .search-container {
            display: flex;
            justify-content: flex-end; 
            margin-bottom: 20px;
            width: 100%; 
        }
        .search-container input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555;
            width: 200px; 
            background-color: #222;
            color: #fff;
        }
        .communities {
            display: grid;
            grid-template-columns: repeat(4, 1fr); 
            gap: 20px;
            width: 100%; 
            max-width: 1200px; 
            margin-top: 20px; 
            padding: 0 20px; 
        }
        .community-tile {
            background-color: #1e1e1e;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            width: calc(100% - 40px); 
            transition: transform 0.2s; 
        }
        .community-tile:hover {
            transform: scale(1.05);
        }
        .community-tile img {
            width: 100%; 
            height: 150px; 
            object-fit: cover; 
        }
        .community-info {
            padding: 15px;
        }
        .community-info h3 {
            margin: 0 0 10px;
            cursor: text; 
        }
        .community-info p {
            margin: 0 0 10px;
            font-size: 14px;
        }
        .join-button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }
        .join-button:hover {
            background-color: #0056b3;
        }
        .post-form {
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%; 
            max-width: 600px; 
        }
        .post-form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #222;
            color: #fff;
            resize: none; /
        }
        .post-form button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
        .post {
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: background-color 0.3s;
            width: 100%; 
            max-width: 600px; 
        }
        .post:hover {
            background-color: #2c2c2c;
        }
        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .post-content {
            margin-top: 10px;
            font-size: 16px;
        }
        .post-actions {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }
        .post-actions button {
            background: none;
            color: #007bff;
            border: none;
            cursor: pointer;
        }
        .post-actions button:hover {
            text-decoration: underline;
        }
        .comment-section {
            margin-top: 10px;
            padding-left: 15px;
        }
        .comment {
            background-color: #222;
            padding: 5px;
            border-radius: 3px;
            margin-top: 5px;
        }
        .comment textarea {
            width: calc(100% - 22px);
            padding: 5px;
            margin-top: 5px;
            border-radius: 3px;
            border: 1px solid #555;
            background-color: #333;
            color: #fff;
            resize: none; 
        }
        .comment button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 5px;
            cursor: pointer;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="nav">
            <h2>Menu</h2>
            <ul>
                <li><a href="feed.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="#"><i class="fas fa-search"></i>Search</a></li>
                <li><a href="notifications.php"><i class="fas fa-bell"></i>Notifications</a></li>
                <li><a href="messages.php"><i class="fas fa-envelope"></i>Messages</a></li>
                <li><a href="profiles.html"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="settings.html"><i class="fas fa-cog"></i>Settings & Privacy</a></li>
            </ul>
        </div>

        <div class="container">
            <div class="search-container">
                <input type="text" placeholder="Search...">
            </div>

            <div class="post-form">
                <textarea id="postContent" rows="4" placeholder="Write Something in the general chat..." maxlength="200"></textarea> 
                <button id="postButton">Post</button>
            </div>

            <div class="communities" id="communities">
            </div>
        </div>
    </div>

    <script>
        const postContent = document.getElementById('postContent');
        const postButton = document.getElementById('postButton');
        const communitiesContainer = document.getElementById('communities');

        const communities = [
            { image: 'thcm.jpg', title: 'Technology Community', description: 'Discuss the latest in technology and innovations.', creator: 'TechGuru' },
            { image: 'psych.jpg', title: 'Psychology Hub', description: 'Explore the mind and human behavior.', creator: 'MindSeeker' },
            { image: 'fincm.jpeg', title: 'Finance Forum', description: 'Share tips and strategies for financial growth.', creator: 'FinanceExpert' },
            { image: 'artcm.jpg', title: 'Art Collective', description: 'A space for artists to showcase their work.', creator: 'ArtLover' },
            { image: 'backcm.jpg', title: 'Backend Development', description: 'Discuss backend frameworks and best practices.', creator: 'CodeMaster' },
            { image: 'frntcm.jpeg', title: 'Frontend Enthusiasts', description: 'Connect with frontend developers and designers.', creator: 'DesignPro' },
            { image: 'mbdev.png', title: 'Mobile Development', description: 'Share insights on mobile app creation.', creator: 'AppDev' },
            { image: 'hackcm.jpeg', title: 'Ethical Hacking', description: 'Learn and share ethical hacking techniques.', creator: 'Hacker101' },
            { image: 'sciencecm.jpg', title: 'Science Explorers', description: 'Dive into the wonders of science and research.', creator: 'SciFiFan' },
            { image: 'cookcm.png', title: 'Culinary Creatives', description: 'Share recipes and cooking tips.', creator: 'ChefExtraordinaire' },
            { image: 'fitnccmm.jpg', title: 'Fitness & Wellness', description: 'Discuss fitness routines and healthy living.', creator: 'FitLife' },
            { image: 'bookcm.webp', title: 'Book Club', description: 'Share and discuss your favorite reads.', creator: 'Bookworm' },
            { image: 'logo.png', title: 'Travel Enthusiasts', description: 'Share travel tips and experiences.', creator: 'Traveler' },
            { image: 'logo.png', title: 'Photography Lovers', description: 'Showcase your photography skills.', creator: 'Shutterbug' },
            { image: 'logo.png', title: 'Music Lovers', description: 'Discuss and share your favorite music.', creator: 'MusicFanatic' },
            { image: 'logo.png', title: 'Gaming Community', description: 'Connect with gamers and discuss your favorite games.', creator: 'GameMaster' },
            { image: 'logo.png', title: 'Pet Owners', description: 'Share tips and stories about your pets.', creator: 'PetLover' },
            { image: 'logo.png', title: 'Environmental Activists', description: 'Discuss and promote eco-friendly practices.', creator: 'EcoWarrior' },
            { image: 'logo.png', title: 'Entrepreneurs', description: 'Connect with fellow entrepreneurs and share ideas.', creator: 'BizWhiz' },
            { image: 'logo.png', title: 'Education Innovators', description: 'Discuss innovative teaching and learning methods.', creator: 'Educator' },
            { image: 'logo.png', title: 'Spiritual Seekers', description: 'Share your spiritual journey and insights.', creator: 'SoulSearcher' }
        ];

        function displayCommunities() {
            communities.forEach(community => {
                const communityTile = document.createElement('div');
                communityTile.classList.add('community-tile');

                communityTile.innerHTML = `
                    <img src="${community.image}" alt="${community.title}">
                    <div class="community-info">
                        <h3>${community.title}</h3>
                        <p>${community.description}</p>
                        <p><strong>Creator:</strong> ${community.creator}</p>
                        <button class="join-button">Join Community</button>
                    </div>
                `;

                communitiesContainer.appendChild(communityTile);
            });
        }

        postButton.addEventListener('click', () => {
            const content = postContent.value.trim();
            if (content) {
                const postElement = document.createElement('div');
                postElement.classList.add('post');
                postElement.innerHTML = `
                    <div class="post-header">
                        <strong>You</strong>
                        <span>${new Date().toLocaleString()}</span>
                    </div>
                    <div class="post-content">${content}</div>
                `;
                communitiesContainer.prepend(postElement);
                postContent.value = '';
            }
        });

        displayCommunities();
    </script>
</body>
</html>
