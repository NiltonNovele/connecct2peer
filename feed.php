<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect2peer</title>
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
            overflow: hidden;
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
            color: #ccc;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-size: 16px;
            transition: color 0.3s;
        }
        .nav ul li a:hover {
            color: #007bff;
        }
        .nav ul li a i {
            margin-right: 10px;
        }

        .container {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            gap: 20px;
            position: relative;
        }
        
        .carousel {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            max-width: 600px;
            width: 100%;
        }

        .tiles {
            display: flex;
            align-items: center;
            transition: transform 0.5s ease, opacity 0.5s ease;
            width: 100%;
            opacity: 0;
            justify-content: center; 
        }

        .tutor-tile {
            background-color: #2a2a2a;
            border: 2px solid #555;
            border-radius: 15px;
            width: 100%;
            max-width: 500px;
            height: 80vh;
            margin: 0 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
            transition: transform 0.3s;
        }
        .tutor-tile:hover {
            transform: scale(1.03);
        }
        .tutor-tile img {
            width: 100%;
            height: 70%;
            object-fit: cover;
            border-radius: 15px;
        }
        .tutor-info {
            text-align: center;
            width: 100%;
            margin-top: 10px;
        }
        .tutor-info h3 {
            margin: 10px 0;
            font-size: 24px;
            color: #007bff;
        }
        .tutor-info p {
            font-size: 18px;
            margin-bottom: 10px;
            color: #ccc;
        }
        .skills {
            font-size: 14px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .view-tile-btn, .save-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .view-tile-btn:hover, .save-btn:hover {
            background-color: #0056b3;
        }

        .arrow {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid #007bff;
            color: #007bff;
            padding: 15px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            transition: background-color 0.3s, transform 0.3s;
        }
        .arrow:hover {
            background-color: #007bff;
            color: #fff;
            transform: scale(1.1);
        }
        .arrow-left {
            left: 20px;
        }
        .arrow-right {
            right: 20px;
        }
        
        .infobox {
            width: 250px;
            background-color: #1e1e1e;
            border: 2px solid #007bff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.5);
        }
        .infobox h3 {
            color: #007bff;
            margin-bottom: 10px;
            font-size: 20px;
        }
        .infobox p, .infobox small {
            font-size: 16px;
            color: #ccc;
        }
        .stars {
            color: gold; 
            font-size: 18px;
        }

        .edit-form {
            display: none;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.5);
            margin-top: 20px;
        }
        .edit-form input, .edit-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #2a2a2a;
            color: #fff;
        }
        .edit-form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .edit-form button:hover {
            background-color: #0056b3;
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
                <li><a href="communities.php"><i class="fas fa-link"></i>Communities</a></li>
                <li><a href="profiles.html"><i class="fas fa-user"></i>Profiles</a></li>
                <li><a href="settings.html"><i class="fas fa-cog"></i>Settings & Privacy</a></li>
            </ul>
        </div>

        <div class="container">
            <div class="carousel">
                <button class="arrow arrow-left" onclick="prevTile()"><i class="fas fa-angle-left"></i></button>
                <div class="tiles" id="tutors"></div>
                <button class="arrow arrow-right" onclick="nextTile()"><i class="fas fa-angle-right"></i></button>
            </div>

            <div class="infobox" id="infobox">
                <h3 id="infoTitle">Mentor Info</h3>
                <p id="infoDescription">Discover insights and creator details about each tutor as you browse.</p>
                <small id="infoLocation">Location: </small><br>
                <small id="infoStars" class="stars">Rating: </small><br>
                <small id="infoJoined">Joined: </small>
                <button class="view-tile-btn" onclick="window.location.href='profiles.html'">View Full Profile</button>
            </div>

            <div class="edit-form" id="editForm">
                <h3>Edit Tutor Info</h3>
                <label for="tutorName">Name</label>
                <input type="text" id="tutorName" placeholder="Enter tutor name">
                
                <label for="tutorDescription">Description</label>
                <textarea id="tutorDescription" rows="4" placeholder="Enter description"></textarea>

                <label for="tutorSkills">Skills (comma separated)</label>
                <input type="text" id="tutorSkills" placeholder="e.g., Math, Science">

                <label for="tutorImage">Image URL</label>
                <input type="text" id="tutorImage" placeholder="Enter image URL">

                <button class="save-btn" onclick="saveTutorInfo()">Save</button>
                <button class="save-btn" onclick="toggleEditForm()">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        const tutorData = [
            {
                name: 'Nilton Novele',
                description: 'Expert in FrontEnd Development',
                skills: ['HTML', 'Css', 'Javascript', 'and PHP'],
                image: 'nilton.JPG',
                location: 'Cape Town',
                stars: 4,
                joined: 'January 2024',
            },
            {
                name: 'Tanatswanashe Mthembu',
                description: 'Specializes in sciences.',
                skills: ['Chemistry', 'Biology', 'physics', 'and mathematics'],
                image: 'tanas.jpeg',
                location: 'Johannesburg',
                stars: 5,
                joined: 'February 2024',
            },
            {
                name: 'Jean Labuschagne',
                description: 'Expert in BackEnd Development.',
                skills: ['MySQL and Databases', 'PHP', 'and Javascript'],
                image: 'jean.jpeg',
                location: 'Durban',
                stars: 5,
                joined: 'March 2024',
            },
            {
                name: 'Nyuleka Mashicolo',
                description: 'Experienced in Accounting & Finance',
                skills: ['Accounting', 'Math Literacy'],
                image: 'nyuleka.jpeg',
                location: 'Durban',
                stars: 4,
                joined: 'March 2024',
            },
            {
                name: 'Linus Trovalds',
                description: 'Expert in developing open source operating system (Linux)',
                skills: ['Operating System Development', 'C/C#/C++'],
                image: 'linus.webp',
                location: 'New York, USA',
                stars: 5,
                joined: 'March 2024',
            },
            {
                name: 'Please Sign Up or Log In to continue viewing Mentors.',
                description: '',
                skills: ['', ''],
                image: 'join.jpg',
            }
        ];

        let currentTileIndex = 0;

        function renderTiles() {
            const tilesContainer = document.getElementById('tutors');
            tilesContainer.innerHTML = '';

            const currentTutor = tutorData[currentTileIndex];
            const tileElement = document.createElement('div');
            tileElement.classList.add('tutor-tile');
            tileElement.innerHTML = `
                <img src="${currentTutor.image}" alt="${currentTutor.name}">
                <div class="tutor-info">
                    <h3>${currentTutor.name}</h3>
                    <p>${currentTutor.description}</p>
                    <div class="skills">${currentTutor.skills.join(', ')}</div>
                    <button class="view-tile-btn" onclick="toggleEditForm()">View Full profile</button>
                </div>
            `;
            tilesContainer.appendChild(tileElement);

            document.getElementById('infoTitle').innerText = currentTutor.name;
            document.getElementById('infoDescription').innerText = currentTutor.description;
            document.getElementById('infoLocation').innerText = `Location: ${currentTutor.location}`;
            document.getElementById('infoStars').innerText = `Rating: ${'★'.repeat(currentTutor.stars)}${'☆'.repeat(5 - currentTutor.stars)}`;
            document.getElementById('infoJoined').innerText = `Joined: ${currentTutor.joined}`;

            tilesContainer.style.opacity = '1';
        }

        function nextTile() {
            currentTileIndex = (currentTileIndex + 1) % tutorData.length;
            renderTiles();
        }

        function prevTile() {
            currentTileIndex = (currentTileIndex - 1 + tutorData.length) % tutorData.length;
            renderTiles();
        }

        function toggleEditForm() {
            const editForm = document.getElementById('editForm');
            const infoBox = document.getElementById('infobox');
            if (editForm.style.display === 'none' || editForm.style.display === '') {
                editForm.style.display = 'block';
                infoBox.style.display = 'none';

                document.getElementById('tutorName').value = tutorData[currentTileIndex].name;
                document.getElementById('tutorDescription').value = tutorData[currentTileIndex].description;
                document.getElementById('tutorSkills').value = tutorData[currentTileIndex].skills.join(', ');
                document.getElementById('tutorImage').value = tutorData[currentTileIndex].image;
            } else {
                editForm.style.display = 'none';
                infoBox.style.display = 'block';
            }
        }

        function saveTutorInfo() {
            const name = document.getElementById('tutorName').value;
            const description = document.getElementById('tutorDescription').value;
            const skills = document.getElementById('tutorSkills').value.split(',').map(skill => skill.trim());
            const image = document.getElementById('tutorImage').value;

            tutorData[currentTileIndex] = {
                ...tutorData[currentTileIndex],
                name,
                description,
                skills,
                image
            };

            renderTiles();
            toggleEditForm();
        }
        renderTiles();
    </script>
</body>
</html>
