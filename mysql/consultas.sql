-- Consultar representantes de um cliente
SELECT r.nome 
FROM representantes r
INNER JOIN cidades c ON r.cidade_id = c.id
INNER JOIN clientes cli ON c.id = cli.cidade_id
WHERE cli.id = cliente_id;

-- Consultar representantes de uma cidade
SELECT r.nome 
FROM representantes r
INNER JOIN cidades c ON r.cidade_id = c.id
WHERE c.id = cidade_id;
