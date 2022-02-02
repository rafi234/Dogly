
create table users
(
    id_user         integer default nextval('users_id_seq'::regclass) not null
        constraint users_pk
            primary key,
    id_user_details integer
        constraint users_user_details_id_fk
            references user_details
            on update cascade on delete cascade,
    email           varchar(100)                                      not null,
    password        varchar(255)                                      not null,
    enabled         boolean default false                             not null,
    salt            integer                                           not null,
    created_at      date                                              not null
);

alter table users
    owner to jgqasjiopdsode;

create unique index users_id_uindex
    on users (id_user);

create unique index users_id_user_details_uindex
    on users (id_user_details);



create table user_details
(
    id           serial
        constraint user_details_pk
            primary key,
    id_address   integer
        constraint user_details_address_id_fk
            references address (id)
            on update cascade on delete cascade,
    name         varchar(100) not null,
    surname      varchar(255) not null,
    phone_number integer      not null
);

alter table user_details
    owner to jgqasjiopdsode;

create unique index user_details_id_address_uindex
    on user_details (id_address);

create unique index user_details_id_uindex
    on user_details (id);



create table address
(
    id          serial,
    postal_code varchar(31)  not null,
    street      varchar(255) not null,
    country     varchar(100) not null
);

alter table address
    owner to jgqasjiopdsode;

create unique index address_id_uindex
    on address (id);



create table dog
(
    id      serial
        constraint dog_pk
            primary key,
    id_user integer      not null
        constraint dog_users_id_fk
            references users
            on update cascade on delete cascade,
    name    varchar(100) not null,
    breed   varchar(100) not null,
    age     varchar(31)
);

alter table dog
    owner to jgqasjiopdsode;

create unique index dog_id_uindex
    on dog (id);


create table "long-term_care"
(
    id              serial
        constraint "long-term_care_pk"
            primary key,
    id_user         integer                  not null
        constraint "long-term_care_users_id_fk"
            references users
            on update cascade on delete cascade,
    id_dog          integer                  not null
        constraint "long-term_care_dog_id_fk"
            references dog
            on update cascade on delete cascade,
    time_start      date                     not null,
    time_end        date,
    price           numeric(10, 2) default 0 not null,
    active          boolean                  not null,
    id_willing_user integer
        constraint "long-term_care_users_id_fk_2"
            references users
            on update cascade on delete cascade
);

alter table "long-term_care"
    owner to jgqasjiopdsode;

create unique index "long-term_care_id_uindex"
    on "long-term_care" (id);


create table meetings
(
    id             serial
        constraint meetings_pk
            primary key,
    place          varchar(255)      not null,
    date           date              not null,
    interested     integer default 0 not null,
    going          integer default 0 not null,
    description    varchar(3000)     not null,
    id_assigned_by integer           not null
        constraint meetings_users_id_fk
            references users
            on update cascade on delete cascade,
    file           varchar(255)      not null
);

alter table meetings
    owner to jgqasjiopdsode;

create unique index meetings_id_uindex
    on meetings (id);


create table user_walk
(
    id_user integer not null
        constraint user_walk_users_id_fk
            references users
            on update cascade on delete cascade,
    id_walk integer not null
        constraint user_walk_walk_id_fk
            references walk
            on update cascade on delete cascade
);

alter table user_walk
    owner to jgqasjiopdsode;


create table walk
(
    id             serial
        constraint walk_pk
            primary key,
    id_dog         integer        not null
        constraint walk_dog_id_fk
            references dog
            on update cascade on delete cascade,
    date           date           not null,
    price          numeric(10, 2) not null,
    dog_picture    varchar(255)   not null,
    created_at     date           not null,
    id_assigned_by integer        not null
        constraint walk_users_id_fk
            references users
            on update cascade on delete cascade
);

alter table walk
    owner to jgqasjiopdsode;

create unique index walk_id_uindex
    on walk (id);



create table user_meetings
(
    id_user     integer not null
        constraint user_meetings_users_id_fk
            references users
            on update cascade on delete cascade,
    id_meetings integer not null
        constraint user_meetings_meetings_id_fk
            references meetings
            on update cascade on delete cascade
);

alter table user_meetings
    owner to jgqasjiopdsode;



INSERT INTO public.address (id, postal_code, street, country) VALUES (36, '33-300', 'Polska', 'Lwowska 22');
INSERT INTO public.address (id, postal_code, street, country) VALUES (37, '33-300', 'Polska', 'Lwowska 22');
INSERT INTO public.address (id, postal_code, street, country) VALUES (38, '88-679', 'Polska', 'fg');
INSERT INTO public.address (id, postal_code, street, country) VALUES (39, '33-300', 'Polska', 'Lwowska');

INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (10, 15, 'Lexi', 'kundel', '2');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (11, 15, 'Teqila', 'kundel', '2');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (12, 15, 'deni', 'kundel', '4');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (13, 15, 'Azor', 'kundel', '9');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (14, 15, 'Wera', 'kundel', '11');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (15, 15, 'Deni', 'kundel', '4');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (16, 15, '', 'kundel', '');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (17, 15, 'Deni', 'kundel', '15');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (18, 15, 'Miro', 'kundel', '4');
INSERT INTO public.dog (id, id_user, name, breed, age) VALUES (19, 15, 'Miro', 'kundel', '18');

INSERT INTO public.meetings (id, place, date, interested, going, description, id_assigned_by, file) VALUES (37, 'Nowy Sacz, park strzelecki', '2022-02-19', 0, 0, 'Spotkanie dla miłośników czworonogów.', 15, 'park4.jpg');
INSERT INTO public.meetings (id, place, date, interested, going, description, id_assigned_by, file) VALUES (34, 'Nowy Sącz, park strzelecki', '2022-02-04', 0, 1, 'Spotkanie dla miłośników czworonogów.', 15, 'park.jpg');
INSERT INTO public.meetings (id, place, date, interested, going, description, id_assigned_by, file) VALUES (38, 'Kraków, Błonie', '2022-03-01', 0, 0, 'Spotkanie dla miłośników czworonogów.  ', 15, 'park7.jpg');
INSERT INTO public.meetings (id, place, date, interested, going, description, id_assigned_by, file) VALUES (36, 'Nowy Sącz, planty', '2022-02-18', 0, 1, 'Spotkanie dla miłośników czworonogów.', 15, 'park3.jpg');
INSERT INTO public.meetings (id, place, date, interested, going, description, id_assigned_by, file) VALUES (39, 'Nowy Sącz, planty', '2022-02-07', 0, 0, '', 15, 'park6.jpg');
INSERT INTO public.meetings (id, place, date, interested, going, description, id_assigned_by, file) VALUES (35, 'Kraków, Błonie', '2022-02-06', 1, 0, 'Spotkanie dla miłośników czworonogów.  ', 15, 'park2.jpg');

INSERT INTO public.user_details (id, id_address, name, surname, phone_number) VALUES (21, 36, 'Rafal', 'Falinski', 4534523);
INSERT INTO public.user_details (id, id_address, name, surname, phone_number) VALUES (23, 38, 'Przemysław', 'Zaklinacz', 3423455);
INSERT INTO public.user_details (id, id_address, name, surname, phone_number) VALUES (24, 39, 'Rafał ', 'Falinski', 500445836);

INSERT INTO public.user_meetings (id_user, id_meetings) VALUES (15, 34);
INSERT INTO public.user_meetings (id_user, id_meetings) VALUES (15, 35);
INSERT INTO public.user_meetings (id_user, id_meetings) VALUES (15, 36);
INSERT INTO public.user_meetings (id_user, id_meetings) VALUES (15, 37);
INSERT INTO public.user_meetings (id_user, id_meetings) VALUES (15, 38);
INSERT INTO public.user_meetings (id_user, id_meetings) VALUES (15, 39);

INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 37);
INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 38);
INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 39);
INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 40);
INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 41);
INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 43);
INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 46);
INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 47);
INSERT INTO public.user_walk (id_user, id_walk) VALUES (15, 48);

INSERT INTO public.users (id_user, id_user_details, email, password, enabled, salt, created_at) VALUES (12, 21, 'rafi@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$TEhxUE9aR3BsQmZuZk5EUQ$s2Nx6ILNuTL1uijXbsTqtABRA9HCDVb5SVCC0l/ywPI', false, 1234234, '2022-01-12');
INSERT INTO public.users (id_user, id_user_details, email, password, enabled, salt, created_at) VALUES (14, 23, 'POLL_@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$ellJMWRud21NU1ZZMkRTRg$mQaamyzkF6GGw/UteK8P9DaR+nIMPJfDqMQeUZa9JHw', false, 1234234, '2022-01-27');
INSERT INTO public.users (id_user, id_user_details, email, password, enabled, salt, created_at) VALUES (15, 24, 'rafi_22@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$cHhZMVJIWEFSdTVNeDRXNQ$nfRpeI0qHqTHvHgENIYP3FPbhmQ01iLzwfKTLIzM0xc', true, 1234234, '2022-01-31');

INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (37, 11, '2022-02-06', 45.00, 'pies8.jpg', '2022-02-02', 15);
INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (38, 12, '2022-02-13', 5.00, 'pies4.jpg', '2022-02-02', 15);
INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (39, 13, '2022-02-27', 8.00, 'pies7.jpg', '2022-02-02', 15);
INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (40, 14, '2022-03-13', 9.57, 'pies11.jpg', '2022-02-02', 15);
INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (41, 15, '2022-03-13', 4.58, 'pies12.jpg', '2022-02-02', 15);
INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (43, 17, '2022-02-25', 12.00, 'pies10.jpg', '2022-02-02', 15);
INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (46, 17, '2022-02-25', 12.00, 'pies10.jpg', '2022-02-02', 15);
INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (47, 18, '2022-02-19', 1.34, 'pies9.jpg', '2022-02-02', 15);
INSERT INTO public.walk (id, id_dog, date, price, dog_picture, created_at, id_assigned_by) VALUES (48, 19, '2022-02-12', 4.58, 'pies3.jpg', '2022-02-02', 15);
