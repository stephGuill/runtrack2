-- ============================================
-- 👶 JOB 09 - ÉTUDIANTS DE MOINS DE 18 ANS
-- ============================================

-- Sélectionner toutes les informations des étudiants qui ont moins de 18 ans
SELECT * 
FROM etudiants 
WHERE YEAR(CURDATE()) - YEAR(naissance) < 18 
   OR (YEAR(CURDATE()) - YEAR(naissance) = 18 AND DAYOFYEAR(CURDATE()) < DAYOFYEAR(naissance));