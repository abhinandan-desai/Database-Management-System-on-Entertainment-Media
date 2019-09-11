/*tvSeries.php*/
Select season_number, count(episode_number) from episodes where episode_id in 
            (Select distinct(episode_id) from has_episode where title_id = 
            (Select title_id from title where title_name like '$tvseries' and type = 'tvSeries' group by type)) 
            group by season_number order by season_number, episode_number;
            
            
/*movie.php*/            
Select T.title_name, M.releaseYear, G.genre, T.average_rating from title as T, Movie as M, Genre as G where 
            T.title_name = '$movie' and M.title_id = T.title_id and 
            G.title_id = T.title_id group by T.title_name;
            
            
/*details.php*/
/*Directors*/
Select P.primary_name from person as P where P.person_id in (Select distinct(director) from
            directors where title_id in (Select T.title_id from Title as T where 
            T.title_name = '$data2' and T.title_id in (Select title_id from movie where releaseYear = $data1)));
            
/*Writer */
Select P.primary_name from person as P where P.person_id in (Select distinct(writer) from
            writer where title_id in (Select T.title_id from Title as T where 
            T.title_name = '$data2' and T.title_id in (Select title_id from movie where releaseYear = $data1)));
            
/*Cast*/

/* $r=  */Select title_id from title where title_id in (Select title_id 
            from movie where releaseYear = $data1) and title_name = '$data2';
            
Select primary_name from person where person_id in (Select person_id
             from isPartOf where title_id = '$r' and job like '%act%');



/*workByPerson.php*/
/* $r=  */Select person_id from person where primary_name = '$name' group by primary_name;

Select T.title_name, M.releaseYear from title as T, movie as M where T.title_id in 
            (Select F.title_id from isPartOf as F where F.person_id = '$r') and T.title_id = M.title_id;
            
            
/*person.php*/
/*Name of Artist	BirthYear*/
Select primary_name, birthYear from person where primary_name = '$person' group by primary_name;

/*Primary Profession*/
Select P.profession from primaryprofession as P where P.person_id = 
            (Select T.person_id from person as T where 
            T.primary_name = '$person' group by T.primary_name);

/*Known For Titles*/
Select T.title_name, M.releaseYear from movie as M, title as T where M.title_id in 
            (Select title_id from knownForTitles where person_id = 
            (Select person_id from person where primary_name = '$person' group by primary_name)) 
            and T.title_id = M.title_id;
            
            
/*ratings.php*/
Select T.title_name, T.average_rating from title as T where T.title_id in (Select M.title_id from movie as M where releaseYear = '$year' and 
            M.title_id in (Select G.title_id from genre as G where genre = '$genre')) and $avg_rating limit 1000;
             
