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
--

SELECT q.titre as titre, (h.score_brut/h.nb_question)*100 AS Score
FROM historique h	
INNER JOIN quiz q on h.quiz_id = q.id
where h.user_id = 3


-- Table historique à modifier avec un champs id et supprimer la clé primaire sur les 2 champs étrangers.


CREATE TABLE tt_2root(
  ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_question INT(10) UNSIGNED,
  intitule VARCHAR(255),
  id_reponse INT(10) UNSIGNED,
  intitule_reponse VARCHAR(255),
  bonne_reponse INT(10),
  reponse_user INT(10)
);

INSERT INTO tt_2root (id_question, intitule, id_reponse, intitule_reponse, bonne_reponse) VALUES(1, 'Quel est le nom du chien de mickey?', 1, 'Pluto', 1);

SELECT * FROM tt_2root;

INSERT INTO tt_2root (id_question, intitule, id_reponse, intitule_reponse, bonne_reponse) VALUES(1, 'Quel est le nom du chien de mickey?', 2, 'rantanplan', 0);

SELECT * FROM tt_2root;

--
-- Aurelien le 10/06/2016
-- Requete pour obtenir le nombre de réponse à une question.
-- Utile pour la boucle de récupération des réponses.
-- 

SELECT count(*) FROM reponse WHERE question_id = :id


--
-- Aurelien le 14/06/2016
-- requete pour récupérer la liste de question et de réponse.
--

INSERT INTO tt_2root(id_question, intitule, id_reponse, intitule_reponse, bonne_reponse)
SELECT QN.id, QN.intitule, r.id, r.intitule, r.bonne_reponse
FROM reponse r
INNER JOIN (SELECT q.id, q.intitule FROM question q WHERE q.quiz_id = 3 ORDER BY RAND() LIMIT 0, 10) AS QN
on r.question_id = QN.id
