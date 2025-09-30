-- ============================================
-- 📅 JOB 14 - ÉTUDIANTS NÉS ENTRE 1998 ET 2018
-- ============================================

-- Sélectionner prénom, nom et date de naissance des étudiants nés entre 1998 et 2018
SELECT prenom, nom, naissance 
FROM etudiants 
WHERE YEAR(naissance) BETWEEN 1998 AND 2018;