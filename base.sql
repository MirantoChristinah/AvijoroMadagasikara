CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    mot_de_passe VARCHAR(255),
    role VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE projets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255),
    description TEXT,
    categorie VARCHAR(100),
    image VARCHAR(255),
    document_drive_link TEXT,
    statut ENUM('en cours', 'termine'),
    date_debut DATE,
    date_fin DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE actualites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255),
    contenu TEXT,
    categorie VARCHAR(100),
    image VARCHAR(255),
    video VARCHAR(255),
    date_publication DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE media (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('photo', 'video', 'document'),
    titre VARCHAR(255),
    fichier VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE benevoles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(150),
    telephone VARCHAR(30),
    motivation TEXT,
    disponibilite VARCHAR(100),
    statut ENUM('en attente', 'accepte', 'refuse') DEFAULT 'en attente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE temoignages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    role_personne VARCHAR(100),
    message TEXT,
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE partenaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150),
    logo VARCHAR(255),
    site_web VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE newsletter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE traductions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cle_traduction VARCHAR(255),
    langue ENUM('fr', 'mg', 'en'),
    contenu TEXT
);


ALTER TABLE media
ADD projet_id INT,
ADD FOREIGN KEY (projet_id) REFERENCES projets(id);

create table Langue(
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100)

);

Insert into table Langue(libelle) Values 
('MG') ,
('FR') ,
('ENG') ;