UPDATE
    articles
SET
    title = :title, content = :content, publishdate = :publishdate, lastdate = :lastdate, importdegree = :importdegree, autors_id = :autors_id
WHERE
    articles.id = :id