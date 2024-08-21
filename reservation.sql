DROP TABLE RESERVATIONS;

DROP TABLE USERS;

-- Créer la table `users`
CREATE TABLE USERS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    USERNAME VARCHAR(50) NOT NULL UNIQUE,
    PASSWORD VARCHAR(255) NOT NULL,
    CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Créer la table `reservations`
CREATE TABLE RESERVATIONS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    USER_ID INT,
    RESERVATION_DATE DATE NOT NULL,
    RESERVATION_TIME TIME NOT NULL,
    SERVICE VARCHAR(100) NOT NULL,
    CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (USER_ID) REFERENCES USERS(ID) ON DELETE CASCADE
);

-- Insérer des utilisateurs dans la table `users`
INSERT INTO USERS (
    USERNAME,
    PASSWORD
) VALUES (
    'john_doe',
    'hashed_password_1'
),
(
    'jane_smith',
    'hashed_password_2'
),
(
    'didinho_admin',
    'hashed_password_3'
);

-- Insérer des réservations dans la table `reservations`
INSERT INTO RESERVATIONS (
    USER_ID,
    RESERVATION_DATE,
    RESERVATION_TIME,
    SERVICE
) VALUES (
    1,
    '2024-08-21',
    '10:00:00',
    'Coupe Classique'
),
(
    2,
    '2024-08-21',
    '11:00:00',
    'Taille de Barbe'
),
(
    1,
    '2024-08-22',
    '09:00:00',
    'Rasage à l\Ancienne'
),
(
    3,
    '2024-08-22',
    '14:00:00',
    'Coloration'
),
(
    2,
    '2024-08-23',
    '13:00:00',
    'Coupe Dégradée'
);