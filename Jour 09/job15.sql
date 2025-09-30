-- ============================================
-- 🔗 JOB 15 - JOINTURE SALLES ET ÉTAGES
-- ============================================

-- Récupérer le nom des salles et le nom de leur étage
SELECT salles.nom as nom_salle, etage.nom as nom_etage
FROM salles
INNER JOIN etage ON salles.id_etage = etage.id;