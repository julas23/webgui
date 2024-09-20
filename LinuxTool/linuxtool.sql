CREATE DATABASE IF NOT EXISTS linuxtool;
USE linuxtool;

DROP TABLE IF EXISTS t_admin;

CREATE TABLE IF NOT EXISTS t_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username TEXT,
    passcode TEXT,
    email TEXT,
    UNIQUE(id)
) ENGINE=InnoDB;

INSERT INTO t_admin (username, passcode, email) VALUES
('juliano', 'jas2305X', 'julianoas@msn.com');