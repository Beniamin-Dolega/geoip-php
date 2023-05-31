CREATE DATABASE IF NOT EXISTS ip_query;
USE ip_query;
CREATE TABLE IF NOT EXISTS ip_query_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Date DATE,
    User_ip VARCHAR(15),
    Request_ip VARCHAR(15),
    Country VARCHAR(56)
);