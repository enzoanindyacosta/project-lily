DROP DATABASE IF EXISTS `project_lilly`;

CREATE DATABASE IF NOT EXISTS `project_lilly`;
USE `project_lilly`;

CREATE TABLE IF NOT EXISTS `users` (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(75) NOT NULL,
  email VARCHAR(75) NOT NULL,
  password VARCHAR(75) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  role INT DEFAULT 1,
  PRIMARY KEY (id)
);

INSERT INTO `users` (fullname, email, password, phone, role) 
VALUES ('Admin', 'admin@aida.com', 'admin', '1234567890', 0);

CREATE TABLE IF NOT EXISTS `story_category` (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(75) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `story` (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(75) NOT NULL,
  age INT NOT NULL,
  state_stay_in VARCHAR(75) NOT NULL,
  q1 TEXT NOT NULL,
  q2 TEXT NOT NULL,
  q3 TEXT NOT NULL,
  q4 TEXT NOT NULL,
  q5 TEXT NOT NULL,
  your_story TEXT NOT NULL,
  status VARCHAR(25) DEFAULT 'pending',
  category_id INT NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (category_id) REFERENCES story_category(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO `users` (fullname, email, password, phone, role) VALUES
('John Doe', 'john.doe@example.com', 'password123', '0123456789', 1),
('Jane Smith', 'jane.smith@example.com', 'password456', '9876543210', 1),
('Mohammad Rahman', 'mohammad.rahman@example.com', 'password789', '0111222333', 1),
('Siti Aminah', 'siti.aminah@example.com', 'passwordabc', '0198765432', 1),
('David Lee', 'david.lee@example.com', 'passworddef', '0187654321', 1),
('Nurul Azizah', 'nurul.azizah@example.com', 'passwordghi', '0133333333', 1),
('Ahmad Abdullah', 'ahmad.abdullah@example.com', 'passwordjkl', '0177777777', 1),
('Samantha Lim', 'samantha.lim@example.com', 'passwordmno', '0144444444', 1),
('Aisha Tan', 'aisha.tan@example.com', 'passwordpqr', '0166666666', 1),
('Jason Ng', 'jason.ng@example.com', 'passwordstu', '0199999999', 1),
('Sarah Wong', 'sarah.wong@example.com', 'passwordvwx', '0111111111', 1),
('Muhammad Hassan', 'muhammad.hassan@example.com', 'passwordyz1', '0122222222', 1),
('Fatimah Yusof', 'fatimah.yusof@example.com', 'password234', '0167777777', 1),
('Daniel Tan', 'daniel.tan@example.com', 'password567', '0188888888', 1),
('Aina Lee', 'aina.lee@example.com', 'password890', '0139999999', 1),
('Zulfiqar Ali', 'zulfiqar.ali@example.com', 'passwordabc1', '0148888888', 1),
('Karen Lim', 'karen.lim@example.com', 'passworddef1', '0169999999', 1),
('Ahmad Ibrahim', 'ahmad.ibrahim@example.com', 'passwordghi1', '0198888888', 1),
('Siti Aisyah', 'siti.aisyah@example.com', 'passwordjkl1', '0123333333', 1),
('Lee Wei', 'lee.wei@example.com', 'passwordmno1', '0176666666', 1),
('Elena Tan', 'elena.tan@example.com', 'passwordpqr1', '0112222222', 1),
('Kumar Shah', 'kumar.shah@example.com', 'passwordstu1', '0147777777', 1),
('Nora Abdullah', 'nora.abdullah@example.com', 'passwordvwx1', '0168888888', 1),
('Alex Wong', 'alex.wong@example.com', 'passwordyz2', '0192222222', 1),
('Lina Chen', 'lina.chen@example.com', 'password2342', '0189999999', 1);

INSERT INTO `story_category` (title) VALUES
('I am Autistic'),
('I think I am Autistic'),
('I work with Autistic'),
('I know Autisitc'),
('My Child is Autistic');