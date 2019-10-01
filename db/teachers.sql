DROP TABLE IF EXISTS teachers;

CREATE TABLE teachers
(
    id       INTEGER primary key autoincrement,
    name     varchar(255) NOT NULL,
    username varchar(255) NOT NULL,
    ranking  INTEGER      NOT NULL,
    clan     varchar(255) NOT NULL
);

INSERT INTO teachers
VALUES (null, 'Henry Larsson', 'thegreath', 4, 'MaFy'),
       (null, 'Anna Ostgård', 'doomgirl', 1, 'KeBi'),
       (null, 'Jonna Gustavsson', 'godwoken', 5, 'KeBi'),
       (null, 'Elisabet Eriksson', 'izzy', 3, 'H'),
       (null, 'Frans Stål', 'lussifer', 6, 'Da'),
       (null, 'Tommy Svensson', 'quillboar', 2, 'H');




