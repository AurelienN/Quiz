--
-- Aurélien le 24/05/2016
-- Requête pour récupérer les solutions à une questions dans un ordre aléatoire.
-- Il faut ajouter une clause WHERE avec un q.quiz_id avec une variable utilisateur
-- Pour sélectionner les question en fonction du choix de l'utilisateur
-- 

SELECT 
q.quiz_id,
r.question_id,
r.id, 
r.intitule, 
r.bonne_reponse
FROM reponse r
INNER JOIN question q on q.id = r.question_id
WHERE r.question_id = $variable2
ORDER BY RAND();

--
-- Aurélien le 24/05/2016
-- Requête pour récupérer les informations sur la question en fonction du quiz séléctionné par l'utilisateur.
--

SELECT qn.id, qn.intitulé
FROM question qn
INNER JOIN quiz qz on qn.quiz_id = qz.id
WHERE qz.id = $variable1
ORDER BY RAND()
LIMIT 0,10;

-- 
-- Aurelien le 24/05/1981
-- Ajout requête pour afficher la liste des quizs disponible
--

SELECT q.id, q.titre
FROM quiz q

--
-- Aurelien le 08/06/2016
-- Requête pour récupérer le score aux quizs

SELECT q.titre as titre, (h.score_brut/h.nb_question)*100 AS Score
FROM historique h	
INNER JOIN quiz q on h.quiz_id = q.id
where h.user_id = 3
