-- ============================================
-- 🏆 JOB 16 - SALLE AVEC LA PLUS GRANDE CAPACITÉ
-- ============================================

-- Récupérer le nom de l'étage ayant la salle avec la plus grande capacité
-- Afficher aussi le nom de cette salle et sa capacité
SELECT etage.nom as nom_etage, 
       salles.nom as "Biggest Room", 
       salles.capacite
FROM salles
INNER JOIN etage ON salles.id_etage = etage.id
WHERE salles.capacite = (SELECT MAX(capacite) FROM salles);