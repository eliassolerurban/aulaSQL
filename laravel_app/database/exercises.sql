
insert into units values(null, 'Unidad 1: Consultas simples', 'Recuerda que puedes especificar en el select los campos a mostrar, si quieres mostrarlos todos puedes indicarlo con el caracter *.', null, null);

insert into exercises values(null,
'Obtener los datos completos de los empleados.',
'select *  from empleados;',
1, null, null);

insert into exercises values(null,
'Obtener los datos completos de los departamentos.',
'select * from departamentos;',
1, null, null);

insert into exercises values(null,
'Obtener el nombre y salario de los empleados.',
"select nomemp, salemp from empleados;",
1, null, null);

insert into exercises values(null,
'Obtener los datos de los empleados con cargo "SECRETARIA".',
"select * from empleados where lower(cargoE)='secretaria';",
1, null, null);



insert into units values(null, 'Unidad 2: Ordenando consultas y campos calculados', 'Recuerda que puedas realizar la cuenta de resultados con count(), el máximo de los resultados con max() y el mínimo con min().', null, null);

insert into exercises values(null,
'Obtener el nombre y cargo de todos los empleados, ordenado por salario.',
"select nomEmp, cargoE, salemp from empleados order by salemp;",
2, null, null);

insert into exercises values(null,
'Listar los salarios y comisiones. Ordene los resultados por comisiones y, en caso de ser coincidentes, por salario.',
"select salemp, comisione from empleados order by comisionE, salemp;",
2, null, null);

insert into exercises values(null,
'Muestra los empleados cuyo nombre empiece entre las letras J y Z (rango). Liste estos empleados y su cargo por orden alfabético.',
"select nomemp, cargoe from empleados where lower(nomemp) > 'j' and lower(nomemp) < 'z' order by nomemp;",
2, null, null);

insert into exercises values(null,
'Hallar el salario más alto, el más bajo y la diferencia entre ellos.',
"select max(salemp), min(salemp), max(salemp) - min(salemp) from empleados;",
2, null, null);

insert into exercises values(null,
'Hallar la media de todos los salarios.',
"select avg(salemp) from empleados;",
2, null, null);


insert into units values(null, 'Unidad 3: Agrupando consultas', 'Recuerda que group by permite agrupar los resultados por campos.', null, null);

insert into exercises values(null,
'Mostrar cada una de las comisiones y el número de empleados que las reciben. Solo si tiene comisión.',
"select comisionE, count(*) from empleados group by comisionE having comisionE > 0;",
3, null, null);


insert into exercises values(null,
'Mostrar el número de empleados de sexo femenino y de sexo masculino, por cargo.',
"select cargoE, sexemp, count(*) from empleados group by cargoE, sexemp;",
3, null, null);


insert into exercises values(null,
'Hallar el salario promedio por cargo.',
"select cargoE, avg(salemp) from empleados group by cargoE;",
3, null, null);


insert into exercises values(null,
'Hallar los departamentos que tienen más de tres empleados. Mostrar el número de empleados de esos departamentos.',
"select d.codD, d.nombre, count(*) from departamentos d, empleados e where d.codD=e.cargoE group by d.codD having count(*) >= 3;",
3, null, null);

insert into exercises values(null,
'Hallar los departamentos que no tienen empleados',
"select d.codD, d.nombre from departamentos d, empleados e where d.codD=e.cargoE group by d.codD having count(*) = 0;",
3, null, null);


insert into exercises values(null,
'Mostrar el nombre del departamento cuya suma de salarios sea la más alta, indicando el valor de la suma.',
"select d.nombre, sum(e.salemp) from departamentos d, empleados e where d.codD=e.cargoE group by d.nombre order by sum(e.salemp) desc limit 1;",
3, null, null);
