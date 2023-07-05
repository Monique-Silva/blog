SELECT
    articles.title, autors.pseudoname, articles.id
FROM
    articles
INNER JOIN
    autors ON articles.autors_id = autors.id
ORDER BY
    articles.publishdate DESC
LIMIT
    10;