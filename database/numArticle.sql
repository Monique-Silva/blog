SELECT
    articles.title,
    articles.content,
    autors.pseudoname
FROM
    articles
INNER JOIN
    autors ON articles.autors_id = autors.id
WHERE
    articles.id = :id