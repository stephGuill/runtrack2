-- ============================================
-- 👩 JOB 05 - ÉTUDIANTES DE SEXE FÉMININ
-- ============================================

-- Sélectionner prénom, nom et date de naissance des étudiants de sexe féminin
SELECT prenom, nom, naissance 
FROM etudiants 
WHERE sexe = 'Femme';