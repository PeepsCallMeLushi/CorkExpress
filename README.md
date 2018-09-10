# CorkExpress
Projecto do Farinha 2018

* Permissões
  * Admin
      * CRUD Fichas de utilizador
        * Alocar ao departamanto
        * Definir o Salario base
        * Definir a Categoria profissional
      * CRUD de Categorias profissionais
      * Faturação salarial (1 vez por mês)
        * Indicar o turno
      * Processamento de Férias (1 vez por ano)
        * Depende do vencimento base, sem bonus
      * Subsidio de natal
        * feito em novembro
      * Ver dinheiro gasto com SS e IRS

  * User
    * Categoria profissional
      * Escritório
      * Operacional
        * Turnos (Cada de 8 horas)
          * Manhã (08:00 - 16:00) Salario + 1%
          * Tarde (16:00 - 00:00) Salario + 1.5%
          * Noite (00:00 - 08:00) Salario + 3%
    * Ver os seus dados
      * Editar tudo excepto:
        * Nome
        * NIF
        * NISS
      * Para alterar o NIB deve de pedir ao Admin
    * Ver recibos de vencimento
