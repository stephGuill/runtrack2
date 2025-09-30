-- ============================================
-- 🗄️ SCRIPT COMPLET - JOUR 09 BASE DE DONNÉES
-- ============================================
-- Ce script crée complètement la base jour09 avec toutes les données

-- Suppression et recréation de la base pour reset complet
DROP DATABASE IF EXISTS jour09;
CREATE DATABASE jour09 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE jour09;

-- ============================================
-- 📋 CRÉATION DES TABLES
-- ============================================

-- Table etudiants
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    naissance DATE NOT NULL,
    sexe VARCHAR(25) NOT NULL,
    email VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Table etage
CREATE TABLE etage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    numero INT NOT NULL,
    superficie INT NOT NULL
) ENGINE=InnoDB;

-- Table salles (avec clé étrangère)
CREATE TABLE salles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    id_etage INT NOT NULL,
    capacite INT NOT NULL,
    FOREIGN KEY (id_etage) REFERENCES etage(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- 📝 INSERTION DES DONNÉES
-- ============================================

-- Étudiants
INSERT INTO etudiants (prenom, nom, naissance, sexe, email) VALUES
('Cyril', 'Zimmermann', '1989-01-02', 'Homme', 'cyril@laplateforme.io'),
('Jessica', 'Soriano', '1995-09-08', 'Femme', 'jessica@laplateforme.io'),
('Roxan', 'Roumégas', '2016-09-08', 'Homme', 'roxan@laplateforme.io'),
('Pascal', 'Assens', '1999-12-31', 'Homme', 'pascal@laplateforme.io'),
('Terry', 'Cristinelli', '2005-02-01', 'Homme', 'terry@laplateforme.io'),
('Ruben', 'Habib', '1993-05-26', 'Homme', 'ruben.habib@laplateforme.io'),
('Toto', 'Dupont', '2019-11-07', 'Homme', 'toto@laplateforme.io');

-- Étages
INSERT INTO etage (id, nom, numero, superficie) VALUES
(1, 'RDC', 0, 500),
(2, 'R+1', 1, 500);

-- Salles
INSERT INTO salles (id, nom, id_etage, capacite) VALUES
(1, 'Lounge', 1, 100),
(2, 'Studio Son', 1, 5),
(3, 'Broadcasting', 2, 50),
(4, 'Bocal Peda', 2, 4),
(5, 'Coworking', 2, 80),
(6, 'Studio Video', 2, 5);

-- ============================================
-- ✅ VÉRIFICATIONS FINALES
-- ============================================

SELECT '=== VÉRIFICATION DE LA BASE JOUR09 ===' as info;

SELECT 'ÉTUDIANTS:' as table_name;
SELECT * FROM etudiants;

SELECT 'ÉTAGES:' as table_name;
SELECT * FROM etage;

SELECT 'SALLES:' as table_name;  
SELECT * FROM salles;

SELECT 'STATISTIQUES:' as info;
SELECT 
    (SELECT COUNT(*) FROM etudiants) as nb_etudiants,
    (SELECT COUNT(*) FROM etage) as nb_etages,
    (SELECT COUNT(*) FROM salles) as nb_salles,
    (SELECT SUM(capacite) FROM salles) as capacite_totale;

-- ============================================
-- 🎯 BASE PRÊTE POUR LES JOBS 03-16 !
-- ============================================