# Sistema de Veículos

Aplicação web para cadastro e gerenciamento de veículos, desenvolvida em PHP com banco de dados PostgreSQL e arquitetura DAO.

---

## Stack

- **Backend:** PHP 8+
- **Banco de dados:** PostgreSQL
- **Frontend:** HTML, CSS, JavaScript puro
- **Padrão de acesso a dados:** DAO (Data Access Object) com factory

---

## Estrutura de arquivos

```
/
├── index.php           # Listagem de veículos
├── editar.php          # Formulário de criação e edição
├── actions.php         # Processamento de ações POST/GET (inserir, editar, deletar)
├── styles/
│   └── style.css       # Estilização global
├── model/
│   └── Veiculo.php     # Classe de modelo com getters e setters
└── dao/
    ├── PostgresDaoFactory.php   # Factory de DAOs
    ├── VeiculoDao.php           # Interface do DAO
    └── PostgresVeiculoDao.php   # Implementação PostgreSQL
```

---

## Fluxo da aplicação

1. `index.php` instancia a factory e chama `listaVeiculos()`, exibindo os resultados em tabela
2. Ações de criação e edição redirecionam para `editar.php`, que carrega o formulário preenchido ou vazio conforme o parâmetro `?id`
3. O formulário submete via POST para `actions.php`, que identifica a ação pelo campo oculto `acao` (valores: `adicionar` ou `editar`)
4. Deleção é disparada via GET em `actions.php?deletar={id}`
5. Mensagens de feedback são persistidas via `$_SESSION` e consumidas/limpas no próximo carregamento de `index.php`

---

## Modelo de dados

| Campo         | Tipo            | Descrição                        |
|---------------|-----------------|----------------------------------|
| id            | serial / int    | Identificador primario           |
| marca         | varchar         | Fabricante do veiculo            |
| modelo        | varchar         | Nome do modelo                   |
| ano           | int             | Ano de fabricacao                |
| potencia_cv   | int             | Potencia em cavalos              |
| torque_nm     | int             | Torque em Newton-metro           |
| zero_hundred  | decimal / text  | Tempo de 0 a 100 km/h em segundos|
| engine_code   | varchar         | Codigo interno do motor          |
| engine_size   | varchar         | Cilindrada ou descricao do motor |
| nationality   | varchar         | Nacionalidade do fabricante      |

---

## Configuracao

A conexao com o banco e definida em `PostgresDaoFactory.php`. Ajuste as credenciais de host, porta, nome do banco, usuario e senha conforme o ambiente.

---

## Requisitos

- PHP 8.0 ou superior com extensao `pdo_pgsql` habilitada
- PostgreSQL 13 ou superior
- Servidor web com suporte a PHP (Apache, Nginx ou PHP built-in server)
