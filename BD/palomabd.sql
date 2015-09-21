--Script para gerar as tabelas

--tabela usuario
CREATE TABLE usuario
(
	nome			varchar(40) NOT NULL,
	email			varchar(40) NOT NULL UNIQUE,
	senha			varchar(40) NOT NULL,	
	
	PRIMARY KEY (email)
);

--Tabela para os idiomas
CREATE TABLE idiomas
(
	id		int NOT NULL UNIQUE,
	idioma		varchar(20),

	PRIMARY KEY (id)
	
);

--tabela cursos
CREATE TABLE cursos
(
	tipo			int NOT NULL,
	tid			varchar(5) NOT NULL UNIQUE,
	nome            	varchar(40) NOT NULL UNIQUE,
	gratis			boolean,
	pago			boolean,
	adulto			boolean,
	crianca			boolean,
	portugues		boolean,
	ingles			boolean,
	movel			boolean,
	desktop			boolean,
	ComProfessor		boolean,
	SemProfessor		boolean,
	ComWebConf		boolean,
	SemWebConf		boolean,
	ComChatFor		boolean,	
	SemChatFor		boolean,
	ComCertificado		boolean,
	SemCertificado		boolean,
	descricao		varchar(300),	
	link			varchar(300),
	rate			int,
	
	PRIMARY KEY (nome),
	FOREIGN KEY (tipo) REFERENCES idiomas(id)

);

--Tabela para os cursos dos usuários
CREATE TABLE user_cursos
(
	UserEmail		varchar(40) NOT NULL,
	CursoNome		varchar(40) NOT NULL,
	
	PRIMARY KEY (UserEmail,CursoNome),
	FOREIGN KEY (UserEmail) REFERENCES usuario(email),
	FOREIGN KEY (CursoNome) REFERENCES cursos(nome)
);

--Tabela de questionarios
CREATE TABLE questionario
(
	id_idioma	int NOT NULL,
	num_ques	int NOT NULL,
	pergunta	varchar(60),
	item1		varchar(20) DEFAULT '-',
	item2		varchar(20) DEFAULT '-',
	
	PRIMARY KEY (id_idioma, num_ques),
	FOREIGN KEY (id_idioma) REFERENCES idiomas(id)	
);



