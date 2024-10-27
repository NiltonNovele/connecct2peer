CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL, 
    email VARCHAR(100) UNIQUE NOT NULL,
    phone_number VARCHAR(15), 
    user_type ENUM('mentor', 'mentee') NOT NULL,
    profile_picture VARCHAR(255), 
    average_rating FLOAT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mentor_id INT NOT NULL,
    mentee_id INT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (mentor_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (mentee_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS mentor_skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mentor_id INT NOT NULL,
    skill VARCHAR(100) NOT NULL,
    FOREIGN KEY (mentor_id) REFERENCES users(id) ON DELETE CASCADE
);
