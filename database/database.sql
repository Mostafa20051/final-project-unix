CREATE DATABASE IF NOT EXISTS dictionary_app;
USE dictionary_app;

CREATE TABLE IF NOT EXISTS words (
  id INT AUTO_INCREMENT PRIMARY KEY,
  input_word VARCHAR(50),
  machine_word TEXT
);

INSERT INTO words (input_word, machine_word) VALUES
('git','Git is a version control system'),
('docker','Docker is a container platform'),
('linux','Linux is an open source operating system'),
('ci','Continuous Integration'),
('cd','Continuous Deployment'),
('jenkins','Jenkins is a CI/CD automation server');