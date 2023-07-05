SELECT
    comments.comment, autors.pseudoname
FROM
    comments
INNER JOIN
    autors ON comments.autors_id = autors.id
WHERE
    comments.articles_id = :id