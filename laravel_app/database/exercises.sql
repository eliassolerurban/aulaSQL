
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
'Obtener los datos de los empleados con cargo "Secretaria".',
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
'Mostrar el nombre del último empleado de la lista por orden alfabético.',
"select max(nomemp) from empleados;",
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
'Mostrar el número de empleados de sexo femenino y de sexo masculino, por departamento.',
"select codDepto, sexemp, count(*) from empleados group by codDepto, sexemp;",
3, null, null);


insert into exercises values(null,
'Hallar el salario promedio por departamento.',
"select codDepto, avg(salemp) from empleados group by codDepto;",
3, null, null);


insert into exercises values(null,
'Hallar los departamentos que tienen más de tres empleados. Mostrar el número de empleados de esos departamentos.',
"select d.codDepto, d.nombreDpto, count(*) from departamentos d, empleados e where d.codDepto=e.codDepto group by d.codDepto having count(*) >= 3;",
3, null, null);


insert into exercises values(null,
'Mostrar el código y nombre de cada jefe, junto al número de empleados que dirige. Solo los que tengan mas de dos empleados (2 incluido).',
"select j.nDIEmp, j.nomEmp, count(*) from empleados e, empleados j where e.jefeID=j.nDIEmp group by j.nomEmp having count(*)>=2 order by count(*) desc;",
3, null, null);


insert into exercises values(null,
'Hallar los departamentos que no tienen empleados',
"select d.codDepto, d.nombreDpto from departamentos d, empleados e where d.codDepto=e.codDepto group by d.codDepto having count(*) = 0;",
3, null, null);


insert into exercises values(null,
'Mostrar el nombre del departamento cuya suma de salarios sea la más alta, indicando el valor de la suma.',
"select d.nombreDpto, sum(e.salEmp) from departamentos d, empleados e where d.codDepto=e.codDepto group by d.nombreDpto order by sum(e.salEmp) desc limit 1;",
3, null, null);
