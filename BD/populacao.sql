--população

---------------------------------------------------------tabelas básicas----------------------------------------------------------------------
--Criando os idiomas
--insert into idiomas values(id,'idioma');
insert into idiomas values(1,'Inglês');

--Criando cursos
--insert into cursos values								('tipo','tid',Nome','gratis','pago','adulto','crianca','portugues','ingles','movel','desktop','ComProfessor','SemProfessor','ComWebConf','SemWebConf','ComChatFor','SemChatFor','ComCertificado','SemCertificado','descricao','link','rate')
insert into cursos values(1,'id1','Duolingo',true,false,true,true,true,false,true,true,false,true,false,true,true,false,true,false,'preencher','https://www.duolingo.com/pt',50);
insert into cursos values(1,'id2','Memrise',true,false,true,false,false,true,true,true,false,true,false,true,false,true,false, true,'preencher','https://www.memrise.com/',50);

insert into cursos values(1,'id3','Live Mocha',true,false,true,false,false,true,false,true,true,true,false,true,true,false,false,true,'preencher','http://livemocha.com/',40);
insert into cursos values(1,'id4','IBEU',false,true,false,true,true,false,false,true,true,false,false,true,true,false,true,false,'preencher',' http://inglesonline.ibeu.org.br/web/',40);
insert into cursos values(1,'id5','Busuu',true,true,true,false,true,false,true,true,false,true,false,true,true,false,true,false,'preencher','https://www.busuu.com/dashboard#/splash',30);
insert into cursos values(1,'id6','English Town',false,true,true,false,true,false,false,true,true,false,true,false,true,false,true,false,'preencher','http://www.englishtown.com.br/',59);
insert into cursos values(1,'id7','English Up',false,true,true,false,true,false,true,true,true,false,true,false,true,false,true,false,'preencher','http://englishup.com.br/',39);
insert into cursos values(1,'id8','UOL Cursos',true,false,true,false,true,false,false,true,true,true,false,true,true,false,true,false,'preencher',' http://cursodeingles.uol.com.br/#rmcl',28);
insert into cursos values(1,'id9','Cursos 24 horas',false,true,true,false,true,false,false,true,true,true,true,false,true,false,true,false,'preencher','http://www.cursos24horas.com.br/cursos/curso-de-ingles-online/',23);
insert into cursos values(1,'id10','Prime Cursos',true,false,true,false,true,false,true,true,false,true,false,true,true,false,true,false,'preencher','https://www.primecursos.com.br/ingles-basico/',9);
insert into cursos values(1,'id11','Open English',false,true,true,false,true,false,true,true,true,false,true,false,true,false,true,false,'preencher','http://www.openenglish.com.br/curso/',28);
insert into cursos values(1,'id12','Inglês do Jerry',true,false,true,false,true,false,false,true,true,false,false,true,false,true,false,true,'preencher','http://inglesonlinedojerry.com.br/lead/?ref=S2700833P',10);
insert into cursos values(1,'id13','Babbel',false,true,true,false,true,false,true,true,false,true,false,true,false,true,false,true,'preencher','https://pt.babbel.com/',28);
insert into cursos values(1,'id14','Iped idiomas',false,true,true,false,true,false,false,true,true,false,false,true,false,true,false,true,'preencher','https://www.iped.com.br/idiomas',27);
insert into cursos values(1,'id15','Inglês curso',true,false,true,false,true,false,false,true,true,true,false,true,false,true,true,false,'preencher','http://www.inglescurso.net.br/',46);
insert into cursos values(1,'id16','Aba English',true,true,true,false,true,false,true,true,true,true,false,true,false,true,true,true,'preencher','http://www.abaenglish.com/pt/curso-ingles-online/',35);
insert into cursos values(1,'id17','Learn American English',true,false,true,false,false,true,false,true,true,true,false,true,true,false,false,true,'preencher','http://www.learnamericanenglishonline.com/index.html',36);
insert into cursos values(1,'id18','1-Language',true,false,true,false,false,true,false,true,false,true,false,true,false,true,false,true,'preencher','http://www.1-language.com/englishcourse/index.htm',21);
insert into cursos values(1,'id19','USA Learns',true,false,true,false,false,true,true,true,false,true,false,true,false,true,false,true,'preencher','http://www.usalearns.org/',55);
insert into cursos values(1,'id20','Petra Lingua',false,true,false,true,true,false,true,true,false,true,false,true,false,true,false,true,'preencher','http://www.petralingua.com/pt/cursos-de-lingua/ingles-para-criancas-online.php',33);
insert into cursos values(1,'id21','Iped Cursos - Criança',false,true,false,true,true,false,false,true,true,false,false,true,true,false,true,false,'preencher','https://www.iped.com.br/reforco-escolar/curso/ingles-infantil',32);

--Criando questionarios
--insert into questionario values(id_idioma,num_ques,perg,'item1','item2')
insert into questionario values(1,1,'Que tipo de curso você prefere?','Pago','Gratuito');
insert into questionario values(1,2,'O Curso é destinado para quem?','Adulto','Criança');
insert into questionario values(1,3,'Qual a sua preferência para o idioma da Pagina?','Português','Inglês');
insert into questionario values(1,4,'Qual a sua plataforma que deseja aprender o idioma?','Móvel','Desktop');
insert into questionario values(1,5,'Prefere cursos com acompanhando de Professor ou sem?','Com Professor','Sem Professor');
insert into questionario values(1,6,'Prefere curso com Web Conferência?','Com Web Conferência','Sem Web Conferência');
insert into questionario values(1,7,'Curso com chat ou forum?','Com chat/forum','Sem chat/forum');
insert into questionario values(1,8,'Deseja curso que emitem certificados?','Com Certificado','Sem Certificado');
----------------------------------------------------------------------------------------------------------------------------------------------
