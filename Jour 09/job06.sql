-- ============================================
-- 🎯 JOB 06 - PRÉNOMS COMMENÇANT PAR "T"
-- ============================================

-- Sélectionner toutes les informations des étudiants dont le prénom commence par "T"
SELECT * 
FROM etudiants 
WHERE prenom LIKE 'T%';