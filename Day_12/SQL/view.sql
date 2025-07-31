CREATE VIEW view_course_students_count AS
SELECT 
    c.id AS course_id,
    c.name AS course_name,
    COUNT(e.student_id) AS student_count
FROM 
    courses c
LEFT JOIN 
    enrollments e ON c.id = e.course_id
GROUP BY 
    c.id, c.name;




----------------------------------------------------------------------


CREATE VIEW view_students_course_counts AS
SELECT 
    s.id AS student_id,
    s.name AS student_name,
    COUNT(e.course_id) AS course_count
FROM 
    students s
LEFT JOIN 
    enrollments e ON s.id = e.student_id
GROUP BY 
    s.id;

SELECT * FROM view_students_course_counts
ORDER BY course_count ASC
LIMIT 1;

----------------------------------------------------------------------

CREATE VIEW view_students_no_courses AS
SELECT 
    s.id AS student_id,
    s.name AS student_name
FROM 
    students s
LEFT JOIN 
    enrollments e ON s.id = e.student_id
WHERE 
    e.course_id IS NULL;

----------------------------------------------------------------------


CREATE VIEW view_students_with_courses AS
SELECT 
    s.id AS student_id,
    s.name AS student_name,
    COUNT(e.course_id) AS course_count
FROM 
    students s
INNER JOIN 
    enrollments e ON s.id = e.student_id
GROUP BY 
    s.id, s.name;
