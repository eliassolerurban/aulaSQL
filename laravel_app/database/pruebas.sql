insert into users values(null, 'profe1', 'profe1@email.com', null, '0000', 'profesor', null, null, null);
insert into users values(null, 'alu1', 'alu1@email.com', null, '0000', 'alumno', null, null, null);
insert into users values(null, 'alu2', 'alu2@email.com', null, '0000', 'alumno', null, null, null);
insert into classrooms values(null, 'test-classroom', 1, null, null);
insert into units values(null, 'unidad0: prueba', 'debes tener en cuenta que se trata de una prueba', null, null);
insert into exercises values(null, 'Chicos, ¿en qué año fue 1+1?', 'El fantástico Ralph', 1, null, null);
insert into exercise_user values(null, 2, 1, 'passed', 3, null, null);
insert into exams values(null, 'Examen de prueba', 1, null, null);
insert into exam_exercise values(null, 1, 1, null, null);
insert into exam_user values(null, 1, 2, 10, null, null);
insert into exam_exercise_exam_user values(null, 1, 1, 'passed', null, null);