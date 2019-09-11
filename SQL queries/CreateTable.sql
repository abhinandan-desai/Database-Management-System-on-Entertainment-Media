Create database imdb;

Create table person(
person_id varchar(20) not null,
primary_name varchar(300),
birthyear int(4),
deathYear int(4),
primary key(person_id));


Create table title(
title_id varchar(20) not null,
title_name varchar(300),
runtime int(11),
type varchar(50),
average_rating float(3, 1),
numVotes int(11),
primary key(title_id));


Create table tv_show(
title_id varchar(20) not null,
startYear int(4),
endYear int(4),
primary key(title_id));

Create table Movie(
title_id varchar(20) not null,
releaseYear varchar(20),
primary key(title_id),
foreign key (title_id) references Title(title_id)
);

Create table episodes(
episode_id varchar(20) not null,
episode_number int,
season_number int,
primary key (episode_id));

Create table isPartOf(
person_id varchar(20) not null,
title_id varchar(20) not null,
job varchar(200),
constraint Pk_isPartOf primary key(person_id, title_id),
foreign key (person_id) references Person(person_id),
foreign key (title_id) references Title(title_id)
);

Create table has_episode(
episode_id varchar(20) not null,
title_id varchar(20) not null,
constraint Pk_has_episode primary key(episode_id, title_id),
foreign key (episode_id) references episodes(episode_id),
foreign key (title_id) references title(title_id));

Create table PrimaryProfession(
person_id varchar(20) not null,
profession varchar(20) not null,
constraint Pk_primaryProfession primary key(person_id, profession),
foreign key (person_id) references person(person_id));

Create table knownForTitles(
person_id varchar(20) not null,
title_id varchar(20) not null,
constraint Pk_knownForTitles primary key(person_id, title_id),
foreign key (person_id) references person(person_id),
foreign key (title_id) references title(title_id)
);

Create table Directors(
title_id varchar(20) not null,
director varchar(200) not null,
constraint Pk_Directors primary key(title_id, director),
foreign key (director) references person(person_id),
foreign key (title_id) references title(title_id)
);

Create table Writer(
title_id varchar(20) not null,
writer varchar(200) not null,
constraint Pk_Directors primary key(title_id, director),
foreign key (writer) references person(person_id),
foreign key (title_id) references title(title_id)
);

Create table Genre(
title_id varchar(20) not null,
genre varchar(200) not null,
constraint Pk_Directors primary key(title_id, genre),
foreign key (title_id) references title(title_id)
);






