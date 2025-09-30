-- ============================================
-- 🗂️ JOB 01 - CRÉATION DE LA BASE DE DONNÉES
-- ============================================

-- Création de la base de données jour09
CREATE DATABASE IF NOT EXISTS jour09 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE jour09;

-- ============================================
-- 👨‍🎓 Table etudiants
-- ============================================
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    naissance DATE NOT NULL,
    sexe VARCHAR(25) NOT NULL,
    email VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- ============================================
-- 🏢 Table etage
-- ============================================
CREATE TABLE etage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    numero INT NOT NULL,
    superficie INT NOT NULL
) ENGINE=InnoDB;

-- ============================================
-- 🚪 Table salles
-- ============================================
CREATE TABLE salles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    id_etage INT NOT NULL,
    capacite INT NOT NULL,
    FOREIGN KEY (id_etage) REFERENCES etage(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- 📊 INFORMATIONS STRUCTURE
-- ============================================

-- Affichage de la structure de la table etudiants
DESCRIBE etudiants;

-- Affichage de la structure de la table etage
DESCRIBE etage;

-- Affichage de la structure de la table salles
DESCRIBE salles;