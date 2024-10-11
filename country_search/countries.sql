-- Use the database
USE country_search;

-- Create the countries table
CREATE TABLE IF NOT EXISTS countries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Insert the countries
INSERT INTO countries (name) VALUES 
('Albania'), ('Andorra'), ('Australia'), ('Brazil'), ('Belgium'),
('Canada'), ('China'), ('France'), ('Germany'), ('India'),
('Indonesia'), ('Ireland'), ('Italy'), ('Japan'), ('Kenya'),
('Luxembourg'), ('Mexico'), ('New Zealand'), ('Nigeria'), ('Portugal'),
('Russia'), ('South Africa'), ('South Korea'), ('Spain'), ('Sweden'),
('Thailand'), ('Ukraine'), ('United Kingdom'), ('United States of America'), ('Vietnam'),
('Zambia');