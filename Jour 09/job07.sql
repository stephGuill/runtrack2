-- ============================================
-- 🎂 JOB 07 - ÉTUDIANTS DE PLUS DE 18 ANS
-- ============================================

-- Sélectionner toutes les informations des étudiants qui ont plus de 18 ans
SELECT * 
FROM etudiants 
WHERE YEAR(CURDATE()) - YEAR(naissance) > 18 
   OR (YEAR(CURDATE()) - YEAR(naissance) = 18 AND DAYOFYEAR(CURDATE()) > DAYOFYEAR(naissance));