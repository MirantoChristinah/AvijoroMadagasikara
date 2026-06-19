
CREATE TABLE langues (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(5) UNIQUE NOT NULL,  
    libelle VARCHAR(100) NOT NULL     
);

INSERT INTO langues (code, libelle) VALUES 
('mg', 'Malgache'), 
('fr', 'Français'), 
('en', 'English');




CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(50),
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

CREATE TABLE newsletter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE projets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(100),
    image VARCHAR(255),
    document_drive_link TEXT,
    statut ENUM('en cours', 'termine') DEFAULT 'en cours',
    date_debut DATE,
    date_fin DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE projets_traductions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    projet_id INT NOT NULL,
    langue_id INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    FOREIGN KEY (projet_id) REFERENCES projets(id) ON DELETE CASCADE,
    FOREIGN KEY (langue_id) REFERENCES langues(id) ON DELETE RESTRICT
);



CREATE TABLE actualites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(100),
    image VARCHAR(255),
    video VARCHAR(255),
    date_publication DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE actualites_traductions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    actualite_id INT NOT NULL,
    langue_id INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    FOREIGN KEY (actualite_id) REFERENCES actualites(id) ON DELETE CASCADE,
    FOREIGN KEY (langue_id) REFERENCES langues(id) ON DELETE RESTRICT
);



CREATE TABLE media (
    id INT AUTO_INCREMENT PRIMARY KEY,
    projet_id INT, 
    type ENUM('photo', 'video', 'document') NOT NULL,
    fichier VARCHAR(255) NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (projet_id) REFERENCES projets(id) ON DELETE CASCADE
);

CREATE TABLE media_traductions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    media_id INT NOT NULL,
    langue_id INT NOT NULL,
    titre VARCHAR(255) NOT NULL,      
    description TEXT,                 
    FOREIGN KEY (media_id) REFERENCES media(id) ON DELETE CASCADE,
    FOREIGN KEY (langue_id) REFERENCES langues(id) ON DELETE RESTRICT
);


CREATE TABLE temoignages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100), 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE temoignages_traductions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    temoignage_id INT NOT NULL,
    langue_id INT NOT NULL,
    role_personne VARCHAR(100), 
    message TEXT NOT NULL,       
    FOREIGN KEY (temoignage_id) REFERENCES temoignages(id) ON DELETE CASCADE,
    FOREIGN KEY (langue_id) REFERENCES langues(id) ON DELETE RESTRICT
);


CREATE TABLE partenaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150),
    logo VARCHAR(255),
    site_web VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE traductions_interface (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cle_traduction VARCHAR(255) NOT NULL, 
    langue_id INT NOT NULL,               
    contenu TEXT NOT NULL,
    FOREIGN KEY (langue_id) REFERENCES langues(id) ON DELETE RESTRICT
);
