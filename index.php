<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeerConnect - Connect & Collaborate</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="icon.jpeg" type="image/jpeg">
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,pt',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script> 
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><img src="header.png" height="120" width="500"></div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="documentation.php">Documentation</a></li>
                <li><a href="#contact">Contact us</a></li>
                <li><a href="login.html" class="btn-primary">Login</a></li>
            </ul>
        </div>
        <div id="google_translate_element"></div>
    </header>

    <div class="main-content">
        <div class="content-container">
            <section id="home" class="hero">
                <div class="hero-content">
                    <h1>Connect with Mentors & Peers Effortlessly</h1>
                    <p>Peer Connect allows you to connect with your mentors and peers to improve your skills.</p>
                    <a href="login.html" class="btn-primary">Get Started</a>
                </div>
            </section>

            <aside class="sidebar">
                <h2>Communities</h2>
                <div id="feed">
                </div>
                <button onclick="document.location='feed.php'" class="btn-primary">View Profiles</button>
            </aside>
        </div>

        <section id="about" class="about">
            <h2>About PeerConnect</h2>
            <div class="about-container">
                <div class="about-box" onclick="focusBox(this)">
                    <h3>The Problem We Solve</h3>
                    <p>In today’s fast-paced world, learners often struggle to find the right educational support and communities that align with their specific needs and interests. Many face barriers such as a lack of access to quality tutoring, difficulty in locating like-minded peers, and a sense of isolation in their learning journeys. At Connect2Peer, we bridge these gaps by providing a platform that simplifies the matchmaking process. We connect individuals with experienced tutors and supportive communities, ensuring that everyone has the resources and connections they need to thrive academically and personally.</p>
                </div>
                <div class="about-box" onclick="focusBox(this)">
                    <h3>What We Do</h3>
                    <p>At <b>Connect2Peer</b>, we specialize in connecting learners with the right tutors and communities tailored to their interests and needs. Our mission is to foster collaboration and knowledge-sharing by pairing individuals with experienced educators and like-minded peers. Whether you're seeking academic assistance, personal development, or guidance on specific topics, we facilitate meaningful connections that empower growth and learning. Join us in building a supportive network where everyone can thrive!</p>
                </div>
                <div class="about-box" onclick="focusBox(this)">
                    <h3>Our Mission</h3>
                    <p>At <b>Connect2Peer</b>, our mission is to create a vibrant ecosystem where learners can easily find the right tutors and communities that cater to their unique interests and goals. We aim to empower individuals through tailored educational support and collaborative learning experiences, fostering personal and academic growth in a nurturing and inclusive environment. Together, we strive to build connections that inspire and uplift every member of our community.</p>
                </div>
            </div>
        </section>

        <section id="features" class="features">
            <h2>Features</h2>
            <div class="feature-card">
                <h3>Multiple communities to connect with your peers or mentors.</h3>
                <p>At Connect2Peer, we understand that learning is not a one-size-fits-all journey. Our platform offers access to multiple communities tailored to a wide range of interests, subjects, and professional fields. Whether you’re seeking academic support, career guidance, or personal development, you can easily find and join groups that resonate with your goals. Engage in meaningful discussions, share insights, and collaborate with peers and mentors who share your passions. This feature empowers you to build lasting relationships, gain diverse perspectives, and enhance your learning experience in a supportive environment.</p>
            </div>
            <div class="feature-card">
                <h3>Secure Message</h3>
                <p>At Connect2Peer, we prioritize your privacy and safety. Our Secure Messaging feature allows you to communicate confidently with tutors, peers, and mentors without worrying about your personal information being compromised. With end-to-end encryption and robust security protocols, you can engage in open discussions, ask questions, and share resources while knowing that your conversations remain confidential. This feature fosters a safe and supportive environment for collaboration, ensuring that you can focus on what truly matters—your learning and growth.</p>
            </div>
            <div class="feature-card">
                <div class="feature-text">
                    <h3><b>Personalized Profiles</b></h3>
                    <p>At Connect2Peer, we believe that every learner and educator has unique strengths, interests, and goals. Our Personalized Profiles feature allows both tutors/mentors and learners to showcase their skills, backgrounds, and areas of expertise. Tutors and mentors can highlight their qualifications, teaching styles, and availability, while learners can share their learning objectives, preferences, and topics of interest. This tailored approach not only facilitates better matchmaking but also fosters meaningful connections, ensuring that every interaction is relevant and impactful. By empowering users to express their individuality, we enhance the overall learning experience, making it more engaging and effective</p>
                </div>
            </div>
        </section>

        <footer id="contact">
            <h2>Contact Us</h2>
            <p>Have questions or need support? Reach out to our team at <a href="mailto:support@connect2peer.com">support@connect2peer.com</a></p>
            <p><a href="tel:+2761915804">(+27) 76 191-5804</a></p>
            <p>&copy; PeerConnectConnect. All rights reserved.</p>
        </footer>
    </div>

    <script src="scripts.js"></script>
    <script>
        async function fetchSidebarPosts() {
            const response = await fetch('fetch_posts.php');
            const posts = await response.json();
            const feedDiv = document.getElementById('feed');
            feedDiv.innerHTML = '';

            posts.forEach(post => {
                feedDiv.innerHTML += `
                    <div class="post">
                        <div class="post-header">
                            <img src="${post.profile_pic}" alt="${post.username}" class="profile-pic">
                            <span>${post.username}</span>
                            <span>${new Date(post.created_at).toLocaleString()}</span>
                        </div>
                        <p>${post.content}</p>
                    </div>
                `;
            });
        }

        fetchSidebarPosts(); 
    </script>
</body>
</html>
