# Database-Management-System-on-Entertainment-Media- #
This project is an end to end system which allows us to browse relevant data for movies and tv shows provided in the IMDB dataset. We have utilized Python, MySQL, PHP, Bootstrap, HTML and CSS to implement this web-based system.

The raw dataset provided contains redundant and null value information that needs to be removed. Furthermore the dataset attributes need to segregated according to the relationship scheme constructed in the previous step. Each TSV file containing the raw dataset is first converted into a CSV file using a python script. Once converted into a CSV file, it is further modified to only keep the required attributes. Finally each CSV file is then used to load the dataset onto the MySQL server.

The tables and the primary keys are generated. The data is then uploaded using MySQL query.This ensures that the dataset is populated and ready for querying.

System was developed and unit testing was conducted while developing each of the components required.


This is how the implementation architecture looks like for Front-End:

![Architecture Image](FrontEndImpl.PNG "Front Page")

And, these are some screenshots of how the implementation looks like:

>The Home Page

![Home Image](Home.PNG "Home")

>A Director Search

![A Director Search](director.PNG "Director Search")

>A Search for Action Movies List with Rating > 7

![Movie List Search](search.PNG "Movie List Search")

>Screenshot of some of the Resulting Movie List

![Search Results](searchResults2.PNG "Search Results")

>A Similar Search for TV Series

![TV Series Search](tvSeries.PNG "TV Series Search")

>The resulting Seasons and count of Episodes

![TV Search Results](tvSeriesResults.PNG "TV Search Results")
